<?php
/**
 * Created by PhpStorm.
 * User: zhangguanghui
 * Date: 17/2/18
 * Time: 下午9:01
 */

include_once "SHA1.php";
include_once "ErrorCode.php";
include_once "XMLParse.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin extends CI_Controller {
    private function verifyService() {
        $echostr = isset($_GET['echostr']) ? $_GET['echostr'] : "";
        echo $echostr;
    }

    public function index()
    {
        $data = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!isset($data)) {
            log_message("error", "no data");
            echo "";
        }

        $xmlParse = new XMLParse();
        $dataArray = $xmlParse->extract($data);
        if ($dataArray[0] != 0) {
            log_message("error", "failed to format xml");
            echo "";
        }

        $msgType = $dataArray[1];
        $toUserName = $dataArray[2];
        $fromUserName = $dataArray[3];

        if ($msgType == "text") {
            $content = $dataArray[4];
            log_message("info", "toUserName = " . $toUserName
                . " fromUserName = " . $fromUserName
                . " msgType = " . $msgType
                . " content = " . $content);
            $msg = $xmlParse->generateText($fromUserName, $toUserName, $content);
            log_message("info", $msg);
            echo $msg;
        } elseif ($msgType == "image") {
            $mediaId = $dataArray[4];
            log_message("info", "toUserName = " . $toUserName
                . " fromUserName = " . $fromUserName
                . " msgType = " . $msgType
                . " mediaId = " . $mediaId);
            $msg = $xmlParse->generateImage($fromUserName, $toUserName, $mediaId);
            log_message("info", $msg);
            echo $msg;
        } else {
            echo "";
        }
    }
}
