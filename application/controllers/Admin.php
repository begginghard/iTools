<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function checkAuth() {
		if (empty($this->input->get('flag')) || $this->input->get('flag') != 'zgh1988') {
			echo "http 403";
			exit;
		}
	}

	/**
	 * Index Page for this controller
	 */
	public function index() {
		$this->load->helper('url');
		$this->load->view('html/tools/index');
	}

	/**
	 * 命令添加页面
	 */
	public function editor() {
		$this->checkAuth();
		$this->load->helper('url');
		if($this->input->get('id')){
            #编辑命令
            $id = intval($this->input->get('id',true));
            $this->load->model('manager/Command');
            $re  = $this->Command->getCommandById($id);
            $data = $re;
            $data['id'] = $id;

		}
        #加载分类配置
        $this->config->load('config', true);
        $commandType = $this->config->item('command_type');#1一级命令分类
        $classify    = $this->config->item('classify');#二级分类
        #全部一起传入后台 做select切换效果
        $data['classify_type']     = json_encode($classify);
        $data['command_type'] = $commandType;

		#加载模板
		$this->load->view('html/admin/editor', $data);
	}

	//命令修改搜索页面
	public function modifyCommand(){
		$this->load->helper('url');
		#加载模板
		$this->load->view('html/admin/modifyCommand');
	}

    //命令修改处理逻辑
	public function submitEdit(){
		$this->load->helper('url');
	    $this->load->model('manager/Command');
        $arr = $this->input->post();
        $re = $this->Command->editCommand($arr);
        if($re['errno'] == 0) {
            #生成静态
            $name = isset($arr['name']) ? htmlspecialchars(trim($arr['name'])) : '';
            $content = isset($arr['content']) ? addslashes($arr['content']) : '';
            $ret = $this->Command->makeHtml($name,$content);
            if($ret){
                $url = base_url();
                $url .= "linux/" . $name . ".html";
                header("Location: {$url}");
                exit();
            }

        }else{
            echo $re['errno'];exit;
        }
	}

	/**
	 * 命令添加逻辑处理
	 */
	public function submitEditor() {
		$this->load->helper('url');
		#插入数据库
		$this->load->model('manager/Command');
		$arr = $this->input->post();
		$re = $this->Command->addCommand($arr);
		if($re['errno'] == 0) {
			#生成静态
			$name = isset($arr['name']) ? htmlspecialchars(trim($arr['name'])) : '';
			$content = isset($arr['content']) ? addslashes($arr['content']) : '';
			$ret = $this->Command->makeHtml($name,$content);
			if($ret){
				$url = base_url();
				$url .= "linux/" . $name . ".html";
				header("Location: {$url}");
				exit();
			}

		}else{
			echo $re['errno'];exit;
		}
	}

	public function searchCommand(){
		$name = $this->input->get('name');
		$this->load->model('manager/Command');
		$re = $this->Command->blurredSearch($name);
		echo json_encode($re);
	}

}
