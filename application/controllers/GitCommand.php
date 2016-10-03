<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GitCommand extends CI_Controller {
    public function index(){
        $this->load->helper('url');
        $this->load->model('manager/Command');
    	$re = $this->Command->getCommandByDisplaySort($num = 30,$type = 3);
    	$data['data'] = $re;
    	$this->load->view('html/tools/git',$data);
    }
}
?>