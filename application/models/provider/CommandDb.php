<?php
/**
 * Created by PhpStorm.
 * User: MOMO
 * Date: 16/9/28
 * Time: 下午4:36
 */
class CommandDb extends  CI_Model{
    private  $_db_name;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->_db_name = 'command';

    }
    public function addCommand($name,$content,$type,$classify,$display_sort){
        $re = false;
        $t = time();
        try {
            $sql = "INSERT INTO {$this->_db_name} (`name`,`content`,`type`,`classify`,`display_sort`,`ctime`) VALUES('{$name}','{$content}',$type,$classify,$display_sort,$t)";
            $re = $this->db->query($sql);

        } catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $re;
    }
    public function blurredSearch($name){
        $arr = array();;
        $t = time();
        try {
            $sql = "SELECT `id`,`name` FROM {$this->_db_name} where name like '%{$name}%'";
            $query = $this->db->query($sql);
            $arr = $query->result_array();
        } catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;
    }

}