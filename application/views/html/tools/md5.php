<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />
        <title>MD5在线加密 - MD5加密 - MD5加密工具 - MD5在线转换</title>
        <meta name="keywords" content="MD5在线加密,MD5加密,MD5加密工具" />
        <meta name="description" content="MD5在线加密,MD5加密工具,MD5加密" />
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
                <div class="form-group" >
                    <label for="exampleInputEmail1">请输入原文</label>
                    <textarea class="form-control" rows="5" id="src_txt"></textarea>
                </div>

                <div class="form-group" >
                    <label for="exampleInputEmail1">结果</label>
                    <textarea class="form-control" rows="3" id="target_txt" disabled="disabled"></textarea>
                </div>
            </form>

            <form class="form-inline" role="form">
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="32" value="1" onclick="encode();" checked>
                        32位
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="16" value="2" onclick="encode();">
                        16位
                    </label>
                </div>
            </form>
            <form class="form-inline" role="form" style="margin-top:10px">
                <button type="button" class="btn btn-warning" onclick="encode();">Encode</button>
                <button type="button" class="btn btn-default" onclick="clearInput();">清空</button>
                <button type="button" class="btn btn-default" id="copy">复制</button>
            </form>
        </div>
            <?php include('bottom_map.php');?>
            <?php include('footer.php');?>
        </div>

        <script>
        $(function () {
            $('#copy').zclip({
                path:'<?php echo base_url();?>style/js/ZeroClipboard.swf',
                copy: function() {
                    return $("#target_txt").val();
                }
            });
        });

        $('#src_txt').keyup(function(){
            encode();
        });

        function clearInput(){
            $('#src_txt').val('');
            $('#target_txt').val('');
        }

        function encode(){
            var encryption = $('input[name="optionsRadios"]:checked').val();
            var src = $('#src_txt').val();
            postData = {"encryption": encryption, "val": src};
            console.log(postData);

            $.ajax({
                     type:'post',
                     data: postData,
                     url:'/md5/encode',
                     cache:false,
                     success:function(data){
                        console.log(data);
                        if(data) {
                            $('#target_txt').val(data);
                        } else {
                            $('#target_txt').val("");
                        }
                     }
                 });
        }
        </script>
    </body>
</html>


