<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    private $_convertType = array('2'=>'utf-8','1'=>'gb2312');

	public function urlCode()
	{
		$type = !empty(intval($_POST['type'])) ? intval($_POST['type']) : 1;
		$val = $_POST['val'];
		$code = empty(intval($_POST['code'])) ? intval($_POST['code']) : 1;
		$tmp =  $code == 1 ? 'gb2312' : 'utf-8';
		$to = $code == 1 ? 'utf-8' : 'gb2312';
		if($type == 1){
            echo urlencode(base64_decode($val));
		    #echo urlencode(mb_convert_encoding(base64_decode($val), $tmp,$to));
		}else{
		    #echo urldecode(mb_convert_encoding(base64_decode($val), $tmp,$to));
		     echo urldecode(base64_decode($val));
		}
	}
	public 

}
