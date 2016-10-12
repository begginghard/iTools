<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LinuxCommand extends CI_Controller {
    public function index(){
        $type = 1;
        $this->load->helper('url');
        $this->load->model('manager/Command');
    	$re = $this->Command->getCommandByDisplaySort($type);
    	$arr = array();
    	if(!empty($re)){
    	    foreach($re as $key=>$val){
    	        $arr[$val['classify']][$val['name']] = $val;
    	    }
    	}
    	ksort($arr,1);
        #加载分类配置
        $this->config->load('config', true);
        $classify    = $this->config->item('classify');#二级分类
        $classify = isset($classify[$type]) ? $classify[$type] : array();
    	$data['data'] = $arr;
    	$data['classify'] = $classify;
    	#获取命令内容
    	$m = trim($this->input->get('m'));
    	$m = !empty($m) ? $m : 'cd';
    	$commandArr = $this->Command->searchCommand($m,$type);

    	$content = '';
    	if(!empty($commandArr)){
    	    $content = $commandArr['content'];
    	}
    	$data['content'] = $content;
    	#当前位置部分处理

    	$nowClassify = isset($classify[$commandArr['classify']]) ? $classify[$commandArr['classify']] : 'default';
    	$typeName = 'Linux命令大全';
    	$data['position'] = $this->Command->position($typeName,$nowClassify,$m);
       	$this->load->view('html/tools/linux',$data);
    }

    public function test(){
        $type = 1;
        $this->load->helper('url');
        $this->load->model('manager/Command');
        $re = $this->Command->getCommandByDisplaySort($type);
        $arr = array();
        if(!empty($re)){
            foreach($re as $key=>$val){
                $arr[$val['classify']][$val['name']] = $val;
            }
        }
        ksort($arr,1);
        #加载分类配置
        $this->config->load('config', true);
        $classify    = $this->config->item('classify');#二级分类
        $classify = isset($classify[$type]) ? $classify[$type] : array();
        $data['data'] = $arr;
        $data['classify'] = $classify;
        $this->load->helper('url');
        $m = trim($this->input->get('m'));
        $m = !empty($m) ? $m : 'cd';
        $commandArr = $this->Command->searchCommand($m,$type=1);
        $content = '';
        if(!empty($commandArr)){
            $content = $commandArr['content'];
        }
        $data['content'] = $content;
        $this->load->view('html/tools/test2',$data);
    }
}
?>