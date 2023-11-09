<?php

require APPPATH . 'libraries/REST_Controller.php';

class Reporte extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
        // Permitir solicitudes desde http://localhost:5173
        header("Access-Control-Allow-Origin: http://localhost:5173");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Allow-Credentials: true");
    }

    public function index_get($id=0){
        
        if (!empty($id)) {
            $data = $this->db->get_where("reporte", ['accidenteID'=>$id])->row_array();
        }
      
        else{
            $data = $this->db->get("reporte")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("reporte", $input);
        $this->response(['Reporte agregado'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("reporte", $input, array("accidenteID" => $id));
        $this->response(['Reporte actualizado'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("reporte", array("reporte" => $id));
        $this->response(['Reporte eliminado'], REST_Controller::HTTP_OK);
    }

}