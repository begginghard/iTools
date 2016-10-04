<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedisCommand extends CI_Controller {
    public function index(){
        $this->load->helper('url');
        $this->load->model('manager/Command');
    	$re = $this->Command->getCommandByDisplaySort($num = 30,$type = 2);
    	$data['data'] = $re;
    	$this->load->view('html/tools/redis',$data);
    }
}
?>