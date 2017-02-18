<?php
/**
 * Created by PhpStorm.
 * User: zhangguanghui
 * Date: 17/2/18
 * Time: 下午9:01
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin extends CI_Controller {
    public function index() {
        $timestamp = $_POST['timestamp'];
        $nonce = $_POST['nonce'];
        $encrypt = $_POST['encrypt'];
        $msgSignature = $_POST['signature'];
        $echostr = $_POST['echostr'];
        $token = "zgh1988";
        //验证安全签名
        $sha1 = new SHA1;
        $array = $sha1->getSHA1($token, $timestamp, $nonce, $encrypt);
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