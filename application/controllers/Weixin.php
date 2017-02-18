<?php
/**
 * Created by PhpStorm.
 * User: zhangguanghui
 * Date: 17/2/18
 * Time: 下午9:01
 */

include_once "SHA1.php";
include_once "ErrorCode.php";

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Shanghai');

class Weixin extends CI_Controller {
    public function index() {
	log_message("error", "------test------");
	var_dump($_REQUEST);
	var_dump($_GET);
        $timestamp = $_REQUEST['timestamp'];
        $nonce = $_REQUEST['nonce'];
        $msgSignature = $REQUEST['signature'];
        $echostr = $_REQUEST['echostr'];
        $token = "zgh1988";
	log_message("info", $timestamp . $nonce . $msgSignature);
        //验证安全签名
        $sha1 = new SHA1;
        $array = $sha1->getSHA1($token, $timestamp, $nonce);
        $ret = $array[0];

        if ($ret != 0) {
            return $ret;
        }

        $signature = $array[1];
        if ($signature != $msgSignature) {
            return ErrorCode::$ValidateSignatureError;
        }

        return $echostr;
    }
}
