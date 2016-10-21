<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
    <meta name="360-site-verification" content="4d7c97467fc2d215cd2bae44e63ec76e" />
    <meta name="google-site-verification" content="wJHmpaG5IpZT-QrPKHh6ugEQWmu8jCePnavT_xHchMM" />
    <title>json格式化,json压缩,json在线解析,json格式化工具</title>
    <?php include('meta.php');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/numberedtextarea.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/font-awesome.min.css" />
    <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.json.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.numberedtextarea.js"></script>
    <script src="<?php echo base_url();?>style/js/json2.js"></script>
    <script src="<?php echo base_url();?>style/js/jsoninit.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.zclip.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jsoninit.js"></script>
</head>

<body id="editor">
    <div id="wrapper">
        <?php include('nav.php');?>
        <div>
            <div id="CodeArea" >
                <textarea id="json-src" style="line-height:15px"></textarea>
            </div>

            <div class="jiantou" style="float:left;">
                <div class="botton-div">
                    <div class="bt zip" id="compress">压缩结果</div>
                    <div class="bt hover" style="cursor:pointer" id="copy">复制结果</div>
                    <div class="bt zip" id="escape" onclick="escape()">转义</div>
                    <div class="bt zip" id="invertEscape" onclick="invertEscape()">反转义</div>
                </div>
            </div>

            <div id="right-box"  style="height:510px;border-left:solid 1px #ddd;box-shadow: 1px 1px 50px #ECECEC;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;border-radius:0;resize: none;overflow-y:scroll;position:relative;">
                <div id="json-target" class="ro" style="padding:0px 5px;over">
                </div>
            </div>
        </div>
        <?php include('bottom_map.php');?>
        <?php include('footer.php');?>
    </div>

    <script>
        $(function () {
            $('#copy').zclip({
                path:'<?php echo base_url();?>style/js/ZeroClipboard.swf',
                copy: function() {
                    if(!zip_flag) {
                        return current_zip_json_str;
                    } else {
                        return $("#json-target").text();
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('textarea').numberedtextarea();
        var current_json = '';
        var current_json_str = '';
        var current_zip_json_str = '';
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
            keyup();
            zip_flag=false;
            $("#compress").html('');
            $("#compress").html('压缩结果');
        });

        function keyup(){
            init();
            var content = $.trim($('#json-src').val());
            var result = '';
            if (content!='') {
                try{
                    current_json = jsonlint.parse(content);
                    current_json_str = JSON.stringify(current_json);
                    current_zip_json_str = JSON.stringify(current_json, null, 4);
                    result = new JSONFormat(content,4).toString();
                }catch(e){
                    result = '<span style="color: #f1592a;font-weight:bold;">' + e + '</span>';
                    current_json_str = result;
                    current_zip_json_str = result;
                }

                $('#json-target').html(result);
//                alert(current_zip_json_str);
//                $('#json-target').html(current_zip_json_str);
            }else{
                $('#json-target').html('');
            }
        }

        keyup();
        function renderLine(){
            $('#json-src').attr("style","height:510px;padding:0 10px 10px 40px;border:0;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;border-radius:0;resize: none; outline:none; line-height:15px");
                $('#json-target').attr("style","padding:0px 5px;");
                $('.numberedtextarea-line-numbers').show();
        }

        $('#compress').click(function(){
            if (zip_flag) {
                $('#json-src').keyup();
                $(this).html('');
                $(this).html('压缩结果');
            }else{
                $('#json-target').html(current_json_str);
                $(this).html('');
                $(this).html('解压结果');
                zip_flag = true;
            }
        });

        function escape() {
            if(zip_flag) {
                var json_target = $('#json-target').text();
                $('#json-target').text(json_target.replace(/\//g, "\/\/").replace(/\"/g, "\/\""));
            } else {
                var json_target = current_json_str;
                zip_flag = true;
                $('#json-target').text(json_target.replace(/\//g, "\/\/").replace(/\"/g, "\/\""));
            }
        }

        function invertEscape() {
            if(zip_flag) {
                var json_target = $('#json-target').text();
                $("#json-target").text(json_target.replace(/\/\"/g, "\"").replace(/\/\//g, "\/"));
            }
        }
    </script>
</body>
</html>


