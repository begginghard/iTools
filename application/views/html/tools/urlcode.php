<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="gb2312" />
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />
        <?php include('meta.php');?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
        <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
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
            <?php include('nav.php');?>
            <div class="containter">
            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">请输入url</label>
                    <textarea class="form-control" rows="5" id="src_txt"></textarea>
                </div>
            </form>

            <form class="form-inline" role="form">
                <select class="form-control" id="select_input">
                  <option value=1>utf-8</option>
                  <option value=2>gbk</option>
                </select>
                <button type="button" class="btn btn-warning" onclick="urlCode(1);">urlEncode</button>
                <button type="button" class="btn btn-warning" onclick="urlCode(2);">urlDecode</button>
                <button type="button" class="btn btn-default" onclick="clearInput();">清空结果</button>
            </form>



        </div>
            <?php include('footer.php');?>
        </div>

        <script>
        var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
        function clearInput(){
            $('#src_txt').val('');
        }
        function base64encode(str){
            var out, i, len;
            var c1, c2, c3;
            len = str.length;
            i = 0;
            out = "";
            while (i < len) {
                c1 = str.charCodeAt(i++) & 0xff;
                if (i == len) {
                    out += base64EncodeChars.charAt(c1 >> 2);
                    out += base64EncodeChars.charAt((c1 & 0x3) << 4);
                    out += "==";
                    break;
                }
                c2 = str.charCodeAt(i++);
                if (i == len) {
                    out += base64EncodeChars.charAt(c1 >> 2);
                    out += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
                    out += base64EncodeChars.charAt((c2 & 0xF) << 2);
                    out += "=";
                    break;
                }
                c3 = str.charCodeAt(i++);
                out += base64EncodeChars.charAt(c1 >> 2);
                out += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
                out += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
                out += base64EncodeChars.charAt(c3 & 0x3F);
            }
            return out;
        }
        function urlCode(type){
            var code = $('#select_input').val();
            var val = $('#src_txt').val();

            $.ajax({
                     type:'post',
                     data:'code='+code+'&type='+type+'&val='+base64encode(val),
                     url:'/ajax/urlCode',
                     cache:false,
                     success:function(data){
                       $('#src_txt').val('');
                      $('#src_txt').val(data);
                     }
                 });
        }


        </script>
    </body>
</html>


