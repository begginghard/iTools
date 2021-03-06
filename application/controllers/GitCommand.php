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
        #获取命令内容
        $m = trim($this->input->get('m'));
        $m = !empty($m) ? $m : 'init';

        $commandArr = $this->Command->searchCommand($m,$type);
        $content = '';
        if(!empty($commandArr)){
            $content = $commandArr['content'];
        }
        $data['content'] = $content;
        #当前位置部分处理
        $nowClassify = isset($classify[$commandArr['classify']]) ? $classify[$commandArr['classify']] : '初始化';
        $typeName = 'Git命令大全';
        $dirName = $this->getDirName($type);
        $data['command_url_pre'] = $this->Command->getCommandUrl($dirName);
        $data['position'] = $this->Command->position($data['command_url_pre'],$typeName,$nowClassify,$m);
        $data['data'] = $arr;
        $data['classify'] = $classify;
    	$this->load->view('html/tools/git',$data);
    }
    private function getDirName($type){
        $this->config->load('config', true);
        $commandType = $this->config->item('command_type');#1一级命令分类
        $dirName = isset($commandType[$type]) ? $commandType[$type] : 'linux';
        return $dirName;
    }
}
?>