<?php
/**
 * Created by PhpStorm.
 * User: MOMO
 * Date: 16/10.18
 * Time: 下午4:27
 */
class Command extends  CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->errno = 0;
        $this->ret = array();
        $this->load->model('provider/CommandDb');
    }

    /**
     * 添加命令 插入数据库
     */
    public function addCommand($arr = array()){
        if(empty($arr)){
            $this->errno = 400;
        }
        $name = isset($arr['name']) ? htmlspecialchars(trim($arr['name'])) : '';
        $content = isset($arr['content']) ? addslashes($arr['content']) : '';
        $type = isset($arr['type']) ? intval($arr['type']) : 0;
        #必填数据检测
        if(empty($name) || empty($content) || empty($type)){
            $this->errno = 400;
        }
        $classify = isset($arr['classify']) ? addslashes($arr['classify']) : 0;
        $display_sort = isset($arr['display_sort']) ? addslashes($arr['display_sort']) : 0;
        $re = $this->CommandDb->addCommand($name,$content,$type,$classify,$display_sort);
        if(!$re){
            $this->errno = 401;
        }
        return array('errno'=>$this->errno);

    }

    public function getPositionName($type){
        $arr = array(
            1=>'Linux命令大全',
            2=>'Redis命令大全',
            3=>'Git命令大全',
            4=>'Vim快捷键',
            5=>'Bash快捷键',
        );
        return $arr[$type];
    }

    public function getCommandUrl($dirName){
       
            return base_url()."{$dirName}/";
        
    }

    public function getKeyWords($type,$name,$nowClassify){
        $arr = array(
            1=>"Linux命令大全 Linux命令 Linux教程 常用 命令 大全 目录 文件 系统 权限 参数 用法  选项 {$nowClassify} {$name} {$name}命令 {$name}语法",
            3=>"Git命令大全 常用 命令 大全 git使用教程 教程 参数 用法 git {$nowClassify} {$name} {$name}命令 {$name}语法",
            2=>"Redis命令大全 php 常用 命令 大全 redis教程 使用教程 redis学习 参数 选项 {$nowClassify} {$name} {$name}命令 {$name}语法",
            4=>"Vim快捷键，vim 常用 快捷键 vim移动光标 vim删除字符 vim 替换字符 {$nowClassify} {$name} {$name} 命令 {$name}语法",
            5=>"Bash快捷键，bash 常用 快捷键 bash移动光标 bash删除字符 bash 替换字符 {$nowClassify} {$name} {$name} 命令 {$name}语法",
        );
        return $arr[$type];
    }

    public function getContentWords($type,$name,$nowClassify){
        $arr = array(
            1=>"Linux命令大全 Linux命令 Linux教程 常用 命令 大全 目录 文件 系统 权限 参数 用法  选项 {$nowClassify} {$name} {$name}命令 {$name}语法",
            3=>"Git命令大全 常用 命令 大全 git使用教程 教程 参数 用法 git {$nowClassify} {$name} {$name}命令 {$name}语法",
            2=>"Redis命令大全 php 常用 命令 大全 redis教程 使用教程 redis学习 参数 选项 {$nowClassify} {$name} {$name}命令 {$name}语法",
            4=>"Vim快捷键，vim 常用 快捷键 vim移动光标 vim删除字符 vim 替换字符 {$nowClassify} {$name} {$name} 命令 {$name}语法",
            5=>"Bash快捷键，bash 常用 快捷键 bash移动光标 bash删除字符 bash 替换字符 {$nowClassify} {$name} {$name} 命令 {$name}语法",
        );
        return $arr[$type];
    }
    public function getTitle($type,$nowClassify,$name){
        $arr = array(
            1=>"Linux命令大全 {$nowClassify} {$name}",
            3=>"Git命令大全 {$nowClassify} {$name}",
            2=>"Redis命令大全 {$nowClassify} {$name}",
            4=>"VIM快捷键 {$nowClassify} {$name}",
            5=>"Bash快捷键 {$nowClassify} {$name}",
        );
        return $arr[$type];

    }

    /**
     * 修改命令 插入数据库
     */
    public function editCommand($arr = array()){
        if(empty($arr)){
            $this->errno = 400;
        }
        $name = isset($arr['name']) ? htmlspecialchars(trim($arr['name'])) : '';
        $content = isset($arr['content']) ? addslashes($arr['content']) : '';
        $type = isset($arr['type']) ? intval($arr['type']) : 0;
        $id = isset($arr['id']) ? intval($arr['id']) : 0;
        #必填数据检测
        if(empty($name) || empty($content) || empty($type) || empty($id)){
            $this->errno = 400;
        }
        $classify = isset($arr['classify']) ? addslashes($arr['classify']) : 0;
        $display_sort = isset($arr['display_sort']) ? addslashes($arr['display_sort']) : 0;
        $re = $this->CommandDb->editCommand($id,$name,$content,$type,$classify,$display_sort);
        if(!$re){
            $this->errno = 401;
        }
        return array('errno'=>$this->errno);

    }

    /**
     * 生成静态
     * @param $name 生成的文件名称
     * @param $content 内容
     * @return bool
     */
    public function makeHtml($name,$content,$dirName){
        ob_start();
        echo $content;
        $out1 = ob_get_contents();
        ob_end_clean();
        $fp = fopen("/var/www/iTools/{$dirName}/{$name}.htm", "w");
        if (!$fp) {
            return false;
        } else {
            fwrite($fp, $out1);
            fclose($fp);
            return true;
           
        }
    }

    /**
    * 模糊查询
    */
    public function blurredSearch($name,$type=1){
        if(empty($name)){
            return array();
        }
        return $this->CommandDb->blurredSearch($name,$type);
    }

    public function searchCommand($name,$type=1){
        if(empty($name)){
            return array();
        }
        return $this->CommandDb->searchCommand($name,$type);
    }
    /**
    * 模糊查询
    */
    public function blurredSearch2($name){
        if(empty($name)){
            return array();
        }
        return $this->CommandDb->blurredSearch2($name);
    }

    public function getCommandById($id){
        if(empty($id)){
            return array();
        }
        $re = $this->CommandDb->getCommandById($id);
        return empty($re) ? array() : $re;
    }

    public function getCommandByDisplaySort($type=1){
         $re = $this->CommandDb->getCommandByDisplaySort($type);
         return empty($re) ? array() : $re;
    }

    public function position($urlPre,$typeName,$classityName,$name){
        $url = $urlPre.$name.'.htm';
        $html = '<div id="position"><span>当前位置></span><span><a href="'.$url.'">'.$typeName.'</a>><a href="'.$url.'">'.$classityName.'</a>><a href="'.$url.'">'.$name.'</a></span></div>';
        return $html;
    }

    public function seachCommand($type = false,$intClassify = false,$name = false){
        $re = $this->CommandDb->getSeachCommand($type,$intClassify,$name);
        return empty($re) ? array() : $re;
    }

}
