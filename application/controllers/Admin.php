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

	public function editor() {
		$this->checkAuth();
		$this->load->helper('url');
		#加载分类配置
		$this->config->load('config', true);
		$commandType = $this->config->item('command_type');
		$classify    = $this->config->item('classify');
		#传入后台
		$data['classify']     = json_encode($classify);
		$data['command_type'] = $commandType;
		#加载模板
		$this->load->view('html/admin/editor', $data);
	}

	/**
	 * 命令添加
	 */
	public function submitEditor() {
		$this->load->helper('url');
		#查入数据库
		$this->load->model('manager/Command');
		$arr = $this->input->post();
		$re = $this->Command->addCommand($arr);
		if($re['errno'] == 0) {
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

}
