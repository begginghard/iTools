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
        $arr = array();
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
    public function blurredSearch2($name){
        $arr = array();
        try{
            $sql = "SELECT `id`,`name` FROM {$this->_db_name} where name like '%{$name}%'";
            $query = $this->db->query($sql);
            $arr = $query->result_array();#多条
        }catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;
    }
    public function searchCommand($name,$type){
        $arr = array();
        try{
            $sql = "SELECT * FROM {$this->_db_name} where name='{$name}'";
            $query = $this->db->query($sql);
            $arr = $query->row_array();#多条
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

    public function getCommandByDisplaySort($type=1){
        $arr = array();
        try{
            $sql = "SELECT id,name,classify FROM {$this->_db_name} where type={$type} order by display_sort asc";
            $query = $this->db->query($sql);
            $arr = $query->result_array();#多条
        }catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;
    }

    #条件查询
    public function getSeachCommand($type = 0,$intClassify = 0,$name = ''){
        $arr = array();
        $where = ' where 1=1';
        if(!empty($type)){
            $where.=" and type={$type}";
        }
        if(!empty($intClassify)){
            $where.=" and classify={$intClassify}";
        }
        if(!empty($name)){
            $where.=" and name={$name}";
        }
        try{
            $sql = "SELECT * FROM {$this->_db_name} {$where}";
            $query = $this->db->query($sql);
            $arr = $query->result_array();#多条
        }catch (Exception $e) {
            print $e->getMessage();
            exit();
        }
        return $arr;

    }

}