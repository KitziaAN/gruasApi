<?php

require APPPATH . 'libraries/REST_Controller.php';

class Propietario extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        
        if (!empty($id)) {
            $data = $this->db->get_where("propietario", ['propietarioID'=>$id])->row_array();
        }
      
        else{
            $data = $this->db->get("propietario")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("propietario", $input);
        $this->response(['Propietario agregado'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("propietario", $input, array("propietarioID" => $id));
        $this->response(['Propietario actualizado'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("propietario", array("propietario" => $id));
        $this->response(['Propietario eliminado'], REST_Controller::HTTP_OK);
    }

}