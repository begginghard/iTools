<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
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
                        <input type="radio" name="optionsRadios" id="32" value="1" checked>
                        32位
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="16" value="2">
                        16位
                    </label>
                </div>
            </form>
            <form class="form-inline" role="form" style="margin-top:10px">
                <button type="button" class="btn btn-warning" onclick="encode();">Encode</button>
                <button type="button" class="btn btn-default" onclick="clearInput();">清空输入</button>
            </form>
        </div>
            <?php include('footer.php');?>
        </div>

        <script>
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
                     url:'/mdcode/encode',
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


