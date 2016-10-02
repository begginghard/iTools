<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />
        <title>js php URL编码解码,UrlEncode编码,UrlDecode解码,URL解码,解码的URL字符串,URL解码器,URL编码,在线URL解码</title>
        <meta name="keywords" content="js php URL编码解码,UrlEncode编码,UrlDecode解码,URL解码,解码的URL字符串,URL解码器,URL编码,在线URL解码"/>
        <meta name="description" content="js php URL解码。在线工具URL编码字符串。文本转换成使用这个免费的在线URL解码器程序的URL字符串解码,您可以使用本工具对中文进行UrlEncode编码,UrlDecode解码,URL解码,解码的URL字符串,URL解码器,URL编码,在线URL解码,转换成字符串URL"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
        <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url();?>style/js/jquery.zclip.min.js"></script>

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

        #ZeroClipboardMovie_1{
            position: relative;
            top: 0px;
        }
    </style>

    <body id="editor">
        <div id="wrapper">
            <?php include('nav.php');?>
            <div class="containter">
            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">请输入url</label>
                    <textarea class="form-control" rows="5" id="src_txt"></textarea>
                </div>
            </form>

            <form class="form-inline" role="form">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="utf8" value="1" checked>
                        UTF-8
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="gb2312" value="2">
                        GB2312
                    </label>
                </div>
            </form>
            <form class="form-inline" role="form" style="margin-top:10px">
                <button type="button" class="btn btn-warning" onclick="encode();">Encode</button>
                <button type="button" class="btn btn-warning" onclick="decode();">Decode</button>
                <button type="button" class="btn btn-default" onclick="clearInput();">清空</button>
                <button type="button" class="btn btn-default" id="copy">复制</button>
            </form>
        </div>
            <?php include('footer.php');?>
        </div>

        <script>
        $(function () {
            $('#copy').zclip({
                path:'<?php echo base_url();?>style/js/ZeroClipboard.swf',
                copy: function() {
                    return $("#src_txt").val();
                }
            });
        });

        function clearInput(){
            $('#src_txt').val('');
        }

        function encode() {
            sendRequest("/url/encode");
        }

        function decode() {
            sendRequest("/url/decode");
        }

        function sendRequest(url){
            var code = $('input[name="optionsRadios"]:checked').val()
            var src = $('#src_txt').val();
            postData = {"code":code, "val": src};
            $.ajax({
                 type:'post',
                 data: postData,
                 url: url,
                 cache:false,
                 success:function(data){
                    if (data) {
                        $('#src_txt').val(data);
                    } else {
                        $('#src_txt').val('');
                    }
                 }
            });
        }


        </script>
    </body>
</html>


