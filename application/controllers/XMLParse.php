<?php
/**
 * Created by PhpStorm.
 * User: zhangguanghui
 * Date: 17/2/19
 * Time: 上午12:28
 */

include_once "ErrorCode.php";

/**
 * XMLParse class
 *
 * 提供提取消息格式中的密文及生成回复消息格式的接口.
 */
class XMLParse
{

    /**
     * 提取出xml数据包中的加密消息
     * @param string $xmltext 待提取的xml字符串
     * @return string 提取出的加密消息字符串
     */
    public function extract($xmltext)
    {
        try {
            $xml = new DOMDocument();
            $xml->loadXML($xmltext);

            $toUserNameArray = $xml->getElementsByTagName('ToUserName');
            $toUserName = $toUserNameArray->item(0)->nodeValue;

            $fromUserNameArray =$xml->getElementsByTagName('FromUserName');
            $fromUserName = $fromUserNameArray->item(0)->nodeValue;

            $msgTypeArray = $xml->getElementsByTagName('MsgType');
            $msgType = $msgTypeArray->item(0)->nodeValue;

            if ($msgType == "text") {
                $ContentArray = $xml->getElementsByTagName('Content');
                $content = $ContentArray->item(0)->nodeValue;
                return array(0, $msgType, $toUserName, $fromUserName, $content);
            } elseif ($msgType == "image") {
                $mediaIdArray = $xml->getElementsByTagName('MediaId');
                $mediaId = $mediaIdArray->item(0)->nodeValue;
                return array(0, $msgType, $toUserName, $fromUserName, $mediaId);
            } else {
                return array(ErrorCode::$ValidateMsgTypeError);
            }
        } catch (Exception $e) {
            //print $e . "\n";
            return array(ErrorCode::$ParseXmlError);
        }
    }


    public function extractText($xmltext) {

    }

    /**
     * 生成xml消息
     * @param string $msg 消息
     * @param string $signature 安全签名
     * @param string $timestamp 时间戳
     * @param string $nonce 随机字符串
     */
    public function generateText($toUserName, $fromUserName,  $content)
    {
        $format = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        return sprintf($format, $toUserName, $fromUserName, time(), $content);
    }

    public function generateImage($toUserName, $fromUserName, $mediaId) {
        $format = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>";
        return sprintf($format, $toUserName, $fromUserName, time(), $mediaId);
    }

}


?>
