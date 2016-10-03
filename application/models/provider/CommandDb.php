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

    public function editCommand($id,$name,$content,$type,$classify,$display_sort){
        $re = false;
        $t = time();
        try {
            $sql = "UPDATE  {$this->_db_name} SET `name`='{$name}', `content`='{$content}',`type`={$type},`classify`={$classify},`display_sort`={$display_sort},`ctime`={$t} WHERE id={$id}";
            $re = $this->db->query($sql);

        } catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $re;
    }
    public function blurredSearch($name,$type=1){
        $arr = array();;
        try{
            $sql = "SELECT `id`,`name` FROM {$this->_db_name} where type={$type} and name like '%{$name}%'";
            $query = $this->db->query($sql);
            $arr = $query->result_array();#多条
        }catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;
    }

    public function getCommandById($id){
        $arr = array();;
        try{
            $sql = "SELECT * FROM {$this->_db_name} where id={$id}";
            $query = $this->db->query($sql);
            $arr = $query->row_array();#单条
        }catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;
    }

    public function getCommandByDisplaySort($num,$type=1){
        $arr = array();
        try{
            $sql = "SELECT id,name FROM {$this->_db_name} where type={$type} order by display_sort desc limit {$num}";
            $query = $this->db->query($sql);
            $arr = $query->result_array();#多条
        }catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;
    }

}