<?php

require APPPATH . 'libraries/REST_Controller.php';

class Acdireccion extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();

        header("Access-Control-Allow-Origin: http://localhost:5173");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Allow-Credentials: true");
    }
    }

    public function index_get($id=0){
        // En caso de recuperar un entrada_salida especifica
        if (!empty($id)) {
            $data = $this->db->get_where("acdireccion", ['acDireccionID'=>$id])->row_array();
        }
        // recuperar todas las entrada_salida
        else{
            $data = $this->db->get("acdireccion")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("acdireccion", $input);
        $this->response(['Direccion del accidente agregada'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("acdireccion", $input, array("acDireccionID" => $id));
        $this->response(['Direccion del accidente actualizada'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("acdireccion", array("acDireccionID" => $id));
        $this->response(['Direccion del accidente eliminada'], REST_Controller::HTTP_OK);
    }

}