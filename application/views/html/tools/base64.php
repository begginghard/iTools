<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />
        <meta name="keywords" content="Base64加密,Base64解密,Base64加密解密"/>
        <meta name="description" content="Base64在线加密解密"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
        <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url();?>style/js/jquery.zclip.min.js"></script>
        <title>php js Base64编码/解码工具</title>
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
                    <label for="exampleInputEmail1">请输入原文</label>
                    <textarea class="form-control" rows="5" id="src_txt"></textarea>
                </div>
            </form>

            <form class="form-inline" role="form">
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

            function sendRequest(url) {
                var srcText = $('#src_txt').val();
                if(srcText) {
                    postData = {"val": srcText};
                    $.ajax({
                        type:'post',
                        data: postData,
                        url: url,
                        success:function(data){
                           $('#src_txt').val('');
                           $('#src_txt').val(data);
                        }
                   })
                }
            }

            function encode() {
                sendRequest("/base64/encode");
            }

            function decode() {
                sendRequest("/base64/decode");
            }




        </script>
    </body>
</html>


