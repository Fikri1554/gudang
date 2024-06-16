<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lantai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lantai_model');    
    }

    public function getAllLantai()
    {
        $data = $this->Lantai_model->get_all_lantai();
        $this->load->view('lantai');
        echo json_encode($data);
    }

   function createLantai()
   {
    
        $data = $this->input->post();
        $result = $this->
   }

}