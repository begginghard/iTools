<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinuxCommand extends CI_Controller {
    public function index(){
        $this->load->database();
        var_dump($this->db);
    	$this->load->helper('url');
    	$this->load->view('html/tools/linux');
    }
}
?>