<!DOCTYPE html>
<html lang="zh-Cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="w3school.com.cn" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.json.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.numberedtextarea.js"></script>
    <script src="<?php echo base_url();?>style/js/json2.js"></script>
    <script src="<?php echo base_url();?>style/js/jsoninit.js"></script>
    <title>开发者工具箱</title>
</head>

<body id="editor">
<div id="wrapper">
    <div id="header">
        <div class="nav">
            <div class="logo">开发者工具箱logo
            </div>
            <div class="nav_list">
                <ul class="ul_div">
                    <li class="li_list"><a href="#">json格式转换</a></li>
                    <li class="li_list"><a href="#">时间格式转换</a></li>
                    <li class="li_list"><a href="#">序列化数组</a></li>
                    <li class="li_list"><a href="#">json格式转换</a></li>
                    <li class="li_list"><a href="#">时间格式转换</a></li>
                    <li class="li_list"><a href="#">序列化数组</a></li>
                </ul>
            </div>
        </div>
        <div id="ab">
            广告
        </div>
    </div>
    <div>
        <div id="CodeArea" >
            <textarea id="json-src" wrap="logical">
	    </textarea>
        </div>

        <div  class="jiantou" style="float:left;">
            <div class="botton-div">
                <div class="bt"><a href="#">提交结果</a></div>
                <div class="bt"><a href="#">复制结果</a></div>
            </div>
        </div>

        <div id="json-target">
        </div>
    </div>

    <div id="footer">
        <br>
        <p>如有问题,可email到492060267@qq.com</p>
        <p>联系电话:15101193015</p>
        <p>京ICP备13051813号-5  京公网安备11010802014000</p>
    </div>
</div>

<script>
</script>

</body>
</html>

