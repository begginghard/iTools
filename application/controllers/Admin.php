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

	//更新缓存
	public function upCache(){
	    $this->load->helper('url');
        #加载分类配置
        $this->config->load('config', true);
        $commandType = $this->config->item('command_type');#1一级命令分类
        $classify    = $this->config->item('classify');#二级分类
        #全部一起传入后台 做select切换效果
        $data['classify_type']     = json_encode($classify);
        $data['command_type'] = $commandType;
       #加载模板
       $this->load->view('html/admin/upcache',$data);
	}

    //命令修改处理逻辑
	public function submitEdit(){
	    ob_start();
		$this->load->helper('url');
	    $this->load->model('manager/Command');
        $arr = $this->input->post();
        $re = $this->Command->editCommand($arr);
        if($re['errno'] == 0) {
            #生成静态
            $name = isset($arr['name']) ? htmlspecialchars(trim($arr['name'])) : '';
            $content = isset($arr['content']) ? addslashes($arr['content']) : '';
            $type = isset($arr['type']) ? intval($arr['type']) : 0;
            $intClassify = isset($arr['classify']) ? addslashes($arr['classify']) : 0;
            $dirName = $this->getDirName($type);
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
            $data['content'] = $content;
            $data['name'] = $name;
            #当前位置部分处理
            $nowClassify = isset($classify[$intClassify]) ? $classify[$intClassify] : 'default';
            $typeName = $this->Command->getPositionName($type);
            #url前缀
            $data['command_url_pre'] = $this->Command->getCommandUrl($dirName);
            $data['position'] = $this->Command->position($data['command_url_pre'],$typeName,$nowClassify,$name);
            #title keywords description
            $data['key_words'] = $this->Command->getKeyWords($type,$name,$nowClassify);
            $data['content_words'] = $this->Command->getContentWords($type,$name,$nowClassify);
            $data['title'] = $this->Command->getTitle($type,$nowClassify,$name);
            #加载模板
            $this->load->view('html/tools/tmp',$data);
            #获取全部输出内容以备生成静态化
            $allContent = ob_get_contents();
            #清空 防止输出到页面
            ob_end_clean();
            $ret = $this->Command->makeHtml($name,$allContent,$dirName);
            if($ret){
                $url = $data['command_url_pre'].$name.'.htm';
                header("Location: {$url}");
                exit();
            }

        }else{
            echo $re['errno'];exit;
        }
	}
    private function getDirName($type){
        $this->config->load('config', true);
        $commandType = $this->config->item('command_type');#1一级命令分类
        $dirName = isset($commandType[$type]) ? $commandType[$type] : 'linux';
        return $dirName;
    }
	/**
	 * 命令添加逻辑处理
	 */
	public function submitEditor() {
		ob_start();
		$this->load->helper('url');
		#插入数据库
		$this->load->model('manager/Command');
		$arr = $this->input->post();
		$re = $this->Command->addCommand($arr);
		if($re['errno'] == 0) {
            #生成静态
            $name = isset($arr['name']) ? htmlspecialchars(trim($arr['name'])) : '';
            $content = isset($arr['content']) ? addslashes($arr['content']) : '';
            $type = isset($arr['type']) ? intval($arr['type']) : 0;
            $intClassify = isset($arr['classify']) ? addslashes($arr['classify']) : 0;
            $dirName = $this->getDirName($type);
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
            $data['content'] = $content;
            $data['name'] = $name;
            #当前位置部分处理
            $nowClassify = isset($classify[$intClassify]) ? $classify[$intClassify] : 'default';
            $typeName = $this->Command->getPositionName($type);
            #url前缀
            $data['command_url_pre'] = $this->Command->getCommandUrl($dirName);
            $data['position'] = $this->Command->position($data['command_url_pre'],$typeName,$nowClassify,$name);
            #title keywords description
            $data['key_words'] = $this->Command->getKeyWords($type,$name,$nowClassify);
            $data['content_words'] = $this->Command->getContentWords($type,$name,$nowClassify);
            $data['title'] = $this->Command->getTitle($type,$nowClassify,$name);
            #加载模板
            $this->load->view('html/tools/tmp',$data);
            #获取全部输出内容以备生成静态化
            $allContent = ob_get_contents();
            #清空 防止输出到页面
            ob_end_clean();
            $ret = $this->Command->makeHtml($name,$allContent,$dirName);
            if($ret){
                $url = $data['command_url_pre'].$name.'.htm';
                header("Location: {$url}");
                exit();
            }

		}else{
			echo $re['errno'];exit;
		}
	}
	
	public function submitEditor2() {
		ob_start();
		ob_implicit_flush(0);
		
		$this->load->view('html/admin/test');

		$test = ob_get_contents();
		ob_end_clean();
		var_dump($test);
	}


	public function searchCommand(){
		$name = trim($this->input->get('name'));
		$type = intval($this->input->get('type'));
		$type = !empty($type) ? $type : 1;
		$this->load->model('manager/Command');
		$re = $this->Command->blurredSearch($name, $type);
		echo json_encode($re);
	}
	//编辑页面的搜索
	public function searchCommand2(){
        $name = trim($this->input->get('name'));
        $this->load->model('manager/Command');
        $re = $this->Command->blurredSearch2($name);
        echo json_encode($re);
    }

    #更新全部
    public function doCache(){

        $this->load->helper('url');
        $type = intval($this->input->get('type'));
        $intClassify = intval($this->input->get('classify'));
        $name = $this->input->get('name');
        $this->load->model('manager/Command');
        $re = $this->Command->seachCommand($type,$intClassify,$name);
        if(!empty($re)){
            foreach($re as $key=>$val){
                ob_start();
                #生成静态
                $name = $val['name'];
                $content = $val['content'];
                $type = $val['type'];
                $intClassify = $val['classify'];
                $dirName = $this->getDirName($type);
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
                $data['content'] = $content;
                $data['name'] = $name;
                #当前位置部分处理
                $nowClassify = isset($classify[$intClassify]) ? $classify[$intClassify] : 'default';
                $typeName = $this->Command->getPositionName($type);
                #url前缀
                $data['command_url_pre'] = $this->Command->getCommandUrl($dirName);
                $data['position'] = $this->Command->position($data['command_url_pre'],$typeName,$nowClassify,$name);
                #title keywords description
                $data['key_words'] = $this->Command->getKeyWords($type,$name,$nowClassify);
                $data['content_words'] = $this->Command->getContentWords($type,$name,$nowClassify);
                $data['title'] = $this->Command->getTitle($type,$nowClassify,$name);
                #加载模板
                $this->load->view('html/tools/tmp',$data);
                #获取全部输出内容以备生成静态化
                $allContent = ob_get_contents();
                #清空 防止输出到页面
                if(!empty($allContent)){
                    ob_end_clean();
                }
                $ret = $this->Command->makeHtml($name,$allContent,$dirName);
                if(!$ret){
                    echo "更新失败{$name}\n";
                    continue;
                }
                echo "更新成功{$name}\n";
                unset($data);
            }
        }

    }


}
