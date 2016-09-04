<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="w3school.com.cn" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/numberedtextarea.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/font-awesome.min.css" />
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
            <textarea id="json-src" ></textarea>
        </div>

        <div  class="jiantou" style="float:left;">
            <div class="botton-div">
                <div class="bt"><a href="#">提交结果</a></div>
                <div class="bt"><a href="#">复制结果</a></div>
            </div>
        </div>
	
	<div id="right-box"  style="height:510px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;border-radius:0;resize: none;overflow-y:scroll; outline:black solid 1px;position:relative;">
            <div id="line-num" style="background-color:#fafafa;padding:0px 8px;float:left;border-right:dashed 1px #eee;display:none;z-index:-1;color:#999;position:absolute;text-align:center;over-flow:hidden;">
                <div>0</div>
            </div>
            <div id="json-target" class="ro" style="padding:0px 25px;over">
            </div>
        </div>
    </div>

    <div id="footer">
        <br>
        <p>如有问题,可email到492060267@qq.com</p>
        <p>联系电话:15101193015</p>
        <p>京ICP备13051813号-5  京公网安备11010802014000</p>
    </div>
</div>

<script type="text/javascript">
    $('textarea').numberedtextarea();
    var current_json = '';
    var current_json_str = '';
    var xml_flag = false;
    var zip_flag = false;
    var shown_flag = false;
    function init(){
        xml_flag = false;
        zip_flag = false;
        shown_flag = false;
        renderLine();

    }
    $('#json-src').keyup(function(){
        init();
        var content = $.trim($(this).val());
        var result = '';
        if (content!='') {
            try{
                current_json = jsonlint.parse(content);
                current_json_str = JSON.stringify(current_json);
                //current_json = JSON.parse(content);
                result = new JSONFormat(content,4).toString();
            }catch(e){
                result = '<span style="color: #f1592a;font-weight:bold;">' + e + '</span>';
                current_json_str = result;
            }
            $('#json-target').html(result);
        }else{
            $('#json-target').html('');
        }
    });
    function renderLine(){
        var line_num = $('#json-target').height()/20;
        $('#line-num').html("");
        var line_num_html = "";
        for (var i = 1; i < line_num+1; i++) {
            line_num_html += "<div>"+i+"<div>";
        }
        $('#line-num').html(line_num_html);
    }
</script>

</body>
</html>


