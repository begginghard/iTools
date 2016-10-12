<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedisCommand extends CI_Controller {
    public function index(){
        $type = 2;
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
        #获取命令内容
        $m = trim($this->input->get('m'));
        $m = !empty($m) ? $m : 'SET';
        $commandArr = $this->Command->searchCommand($m,$type);
        $content = '';
        if(!empty($commandArr)){
            $content = $commandArr['content'];
        }
        $data['content'] = $content;
        #当前位置部分处理
        $nowClassify = isset($classify[$commandArr['classify']]) ? $classify[$commandArr['classify']] : 'default';
        $typeName = 'Redis命令大全';
        $data['position'] = $this->Command->position($typeName,$nowClassify,$m);
        $data['data'] = $arr;
        $data['classify'] = $classify;
    	$this->load->view('html/tools/redis',$data);
    }
}
?>