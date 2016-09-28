<?php
/**
 * Created by PhpStorm.
 * User: MOMO
 * Date: 16/9/28
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

    /**
     * 生成静态
     * @param $name 生成的文件名称
     * @param $content 内容
     * @return bool
     */
    public function makeHtml($name,$content){
        ob_start();
        echo $content;
        $out1 = ob_get_contents();
        ob_end_clean();
        $fp = fopen("/private/var/www/iTools/linux/{$name}.html", "w");
        if (!$fp) {
            return false;
        } else {
            fwrite($fp, $out1);
            fclose($fp);
            return true;
           
        }
    }
    
    public function blurredSearch($name){
        if(empty($name)){
            return arrray();
        }
        return $this->CommandDb->blurredSearch($name);
    }
    

}