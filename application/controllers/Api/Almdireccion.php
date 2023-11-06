<?php

require APPPATH . 'libraries/REST_Controller.php';

class Almdireccion extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        
        if (!empty($id)) {
            $data = $this->db->get_where("almdireccion", ['almDireccionID'=>$id])->row_array();
        }
      
        else{
            $data = $this->db->get("almdireccion")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("almdireccion", $input);
        $this->response(['Direccion del almacen agregado'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("almdireccion", $input, array("almDireccionID" => $id));
        $this->response(['Direccion del almacen actualizado'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("almdireccion", array("almdireccion" => $id));
        $this->response(['Direccion del almacen eliminado'], REST_Controller::HTTP_OK);
    }

}