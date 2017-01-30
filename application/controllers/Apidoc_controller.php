<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apidoc_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('provider/Apidoc_model');
    }

    public function index(){
        $this->load->helper('url');
        $this->load->view('html/tools/apidoc');
    }

    public function search() {
        $searchText = $_POST['searchText'];
        $arr = $this->Apidoc_model->searchTitle($searchText);
        echo json_encode($arr);
    }

    public function getAllTitle() {
        $type = $_POST['type'];
        $arr = $this->Apidoc_model->getAllTitle($type);
        log_message("info", json_encode($arr));
        echo json_encode($arr);
    }
}
?>