<?php

require APPPATH . 'libraries/REST_Controller.php';

class Almacen extends REST_Controller{

    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    public function index_get($id=0){
        if (!empty($id)) {
            $data = $this->db->get_where("almacen", ['almacenID'=>$id])->row_array();
        }
        else{
            $data = $this->db->get("almacen")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $input = $this->input->post();
        $this->db->insert("almacen", $input);
        $this->response(['Datos del almacen agregados'], REST_Controller::HTTP_OK);
    }

    public function index_put($id){
        $input = $this->put();
        $this->db->update("almacen", $input, array("almacenID" => $id));
        $this->response(['Datos del almacen actualizados'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id){
        $this->db->delete("almacen", array("almacenID" => $id));
        $this->response(['Datos del almacen eliminados'], REST_Controller::HTTP_OK);
    }

}