<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinuxCommand extends CI_Controller {
    public function index(){
        $this->load->helper('url');
        $this->load->model('manager/Command');
    	$re = $this->Command->getCommandByDisplaySort(20);
    	$data['data'] = $re;
    	$this->load->view('html/tools/linux',$data);
    }
}
?>