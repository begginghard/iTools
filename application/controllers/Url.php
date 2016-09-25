<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url extends CI_Controller {

    private $_convertType = array('2'=>'utf-8','1'=>'gb2312');

    public function index(){
         $this->load->helper('url');
         $this->load->view('html/tools/url');
    }

	public function encode()
	{
		$code = !empty(intval($_POST['code'])) ? intval($_POST['code']) : 1;
		$val = $_POST['val'];
		if ($code == 1) {
		    echo urlencode($val);
		} else if($code == 2) {
		    echo urlencode(mb_convert_encoding($val, "gb2312", "utf-8"));
		} else {
		    echo "";
		}
	}

	public function decode() {
	    $code = !empty(intval($_POST['code'])) ? intval($_POST['code']) : 1;
        $val = $_POST['val'];
        if ($code == 1) {
            echo urldecode($val);
        } else if($code == 2) {
            echo mb_convert_encoding(urldecode($val), "utf-8", "gb2312");
        } else {
            echo "";
        }
	}
}
