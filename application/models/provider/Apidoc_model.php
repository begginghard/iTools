<?php

/**
 * Created by PhpStorm.
 * User: zhangguanghui
 * Date: 17/1/25
 * Time: 下午5:26
 */
class Apidoc_model extends CI_Model {
    public $title;
    public $url;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllTitle($type) {
        $arr = array();
        $sql = "SELECT `title`, `url` FROM apidoc where type='{$type}'";
        log_message("info", $sql);
        try {
            $query = $this->db->query($sql);
            $arr = $query->result_array();
        } catch (Exception $e) {
            log_message("error", $e->getMessage());
        }

        return $arr;
    }
}