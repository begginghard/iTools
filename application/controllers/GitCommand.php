<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GitCommand extends CI_Controller {
    public function index(){
        $type = 3;
        $this->load->helper('url');
        $this->load->model('manager/Command');
    	$re = $this->Command->getCommandByDisplaySort($type);
        $arr = array();
        if(!empty($re)){
            foreach($re as $key=>$val){
                $arr[$val['classify']][] = $val;
            }
        }
        ksort($arr,1);
        #加载分类配置
        $this->config->load('config', true);
        $classify    = $this->config->item('classify');#二级分类
        $classify = isset($classify[$type]) ? $classify[$type] : array();
        $data['data'] = $arr;
        $data['classify'] = $classify;
    	$this->load->view('html/tools/git',$data);
    }
}
?>