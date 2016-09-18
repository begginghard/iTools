<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    private $_convertType = array('2'=>'utf-8','1'=>'gb2312');

	public function urlCode()
	{
		$type = !empty(intval($_POST['type'])) ? intval($_POST['type']) : 1;
		$code = !empty(intval($_POST['code'])) ? intval($_POST['code']) : 1;
		$val = $_POST['val'];
		if($code == 1) {
		    $to = "utf-8";
		} else if($code == 2) {
		    $to = "gb2312";
		} else {
		    $to = "utf-8";
		}

		log_message("debug", "val = " . $val);
		log_message("debug", "type = " . $type);
		log_message("debug", "code = " . $code);
		log_message("debug", "to=" . $to);

		if($type == 1){
		    if($to == "utf-8") {
		        echo urlencode($val);
		    } else {
		        echo urlencode(mb_convert_encoding($val, "gb2312", "utf-8"));
		    }
		}else{
		    if($to == "utf-8") {
		        echo urldecode($val);
		    } else {
		        log_message("debug", mb_convert_encoding($val, "utf-8", "gb2312"));
		        echo mb_convert_encoding($val, "gb2312", "gb2312");
//		        echo urldecode(mb_convert_encoding($val, "utf-8", "gb2312"));
//                echo urldecode($val);
		    }
		}
	}
}
