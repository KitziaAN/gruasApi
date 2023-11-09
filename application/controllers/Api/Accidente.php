<?php

require APPPATH . 'libraries/REST_Controller.php';

class Accidente extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();

        header("Access-Control-Allow-Origin: http://localhost:5173");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Allow-Credentials: true");
    }

    public function index_get($id=0){
        // En caso de recuperar un categoria especifica
        if (!empty($id)) {
            $data = $this->db->get_where("accidente", ['accidenteID'=>$id])->row_array();
        }
        // recuperar todas las categorias
        else{
            $data = $this->db->get("accidente")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("accidente", $input);
        $this->response(['Accidente agregado'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("accidente", $input, array("accidenteID" => $id));
        $this->response(['Accidente actualizado'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("accidente", array("accidenteID" => $id));
        $this->response(['Accidente eliminado'], REST_Controller::HTTP_OK);
    }

}