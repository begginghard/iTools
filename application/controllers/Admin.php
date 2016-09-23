<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('html/tools/index');
	}
	public function editor(){
		$this->load->helper('url');
        $this->load->view('html/admin/editor');
	}
	public function submitEditor(){
        $this->load->helper('url');
        ob_start();
	    $content =  $_POST['content'];
	    $name = $_POST['name'];
	    $this->head();
	    echo $content;
	    $this->foot();
	    $out1 = ob_get_contents();
        ob_end_clean();
        $fp = fopen("/private/var/www/iTools/linux/{$name}.html","w");
        if(!$fp)
        {
            echo "System Error";
            exit();
        }
        else
        {
            fwrite($fp,$out1);
            fclose($fp);
            $url = base_url();
            $url.="linux/".$name.".html";
            header("Location: {$url}");
        }
	}
    public function head(){
        $this->load->helper('url');
        $baseUrl = base_url();

echo <<<EOF
    <!DOCTYPE html>
    <html lang="zh-cn">
    <head>
    <meta charset="utf-8" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
EOF;
echo <<<EOF
    <meta name="keywords" content="在线,json在线,json教程,格式化JSON,JSON,JSON 校验,格式化,json 工具,在线工具,json视图,可视化,程序,正则表达式,测试,在线json格式化工具,json 格式化,json格式化工具,json字符串格式化,json解析,json在线解析，时间格式转换，json 在线查看器,json在线,json 在线验证,json tools online itools,工具">
    <meta name="description" content="在线,json在线,json教程,格式化JSON,JSON,JSON 校验,格式化,json 工具,在线工具,json视图,可视化,程序,正则表达式,测试,在线json格式化工具,json 格式化,json格式化工具,json字符串格式化,json解析,json在线解析，时间格式转换，json 在线查看器,json在线,json 在线验证,json tools online">
EOF;
echo <<<EOF
    <link rel="stylesheet" type="text/css" href="{$baseUrl}style/css/index.css" />
        <link rel="stylesheet" type="text/css" href="{$baseUrl}style/css/bootstrap.min.css" />
        <script src="{$baseUrl}style/js/jquery-3.1.0.min.js"></script>
        <title>json格式化,json压缩,json在线解析,json格式化工具,正则表达式测试,时间戳转换</title>
    </head>
    <style>
        .containter{
            margin:0 auto;
            margin-top: 50px;
            margin-bottom: 350px;
            width:70%;

        }
        .tag{
            margin:0 auto;
            height:50px;
            line-height:50px;
        }
        .tag span{
            cursor: pointer;
        }
        #pattern {
            width:%50;
        }
    </style>

    <body id="editor">
        <div id="wrapper">
EOF;
echo <<<EOF
    <div id="header">
        <div class="nav">
            <div class="logo">开发者工具箱logo
            </div>
            <div class="nav_list">
                <ul class="ul_div">
                    <li class='li_list'><a href="">json格式转换</a></li>
                    <li class='li_list'><a href="{$baseUrl}tools/ct?p=2">时间格式转换</a></li>
                    <li class='li_list'><a href="{$baseUrl}tools/regex?p=3">正则表达式</a></li>
                    <li class='li_list'><a href="{$baseUrl}tools/urlcode?p=4">URL编码</a></li>
                    <li class='li_list'><a href="{$baseUrl}tools/basecode?p=5">Base64编码</a></li>
                    <li class='li_list'><a href="{$baseUrl}tools/mdcode?p=6">md5加密</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https'){
       bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
      }
      else{
      bp.src = 'http://push.zhanzhang.baidu.com/push.js';
      }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    </script>
EOF;
echo <<<EOF
     <div class="containter">
EOF;

}

    public function foot(){
echo <<<EOF
     </div>
        <div id="footer">
           <br>
           <p>如有问题,可email到492060267@qq.com</p>
           <p>联系电话:15101193015</p>
           <p>京ICP备13051813号-5  京公网安备11010802014000</p>
        </div>
     </div>

   </body>
 </html>
EOF;

}

}
