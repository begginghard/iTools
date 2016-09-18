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
                <div class="form-group">
                    <label for="exampleInputEmail1">请输入url</label>
                    <textarea class="form-control" rows="5" id="src_txt"></textarea>
                </div>
            </form>

            <form class="form-inline" role="form">
                <select class="form-control" id="select_input">
                  <option value=1>utf-8</option>
                  <option value=2>gb2312</option>
                </select>
                <button type="button" class="btn btn-warning" onclick="urlCode(1);">urlEncode</button>
                <button type="button" class="btn btn-warning" onclick="urlCode(2);">urlDecode</button>
                <button type="button" class="btn btn-default" onclick="clearInput();">清空结果</button>
            </form>
        </div>
            <?php include('footer.php');?>
        </div>

        <script>
        function clearInput(){
            $('#src_txt').val('');
        }


        function urlCode(type){
            var code = $('#select_input').val();
            var src = $('#src_txt').val();
            postData = {"code":code, "type":type, "val": src};
            console.log(postData);

            $.ajax({
                     type:'post',
                     data: postData,
                     url:'/ajax/urlCode',
                     cache:false,
                     success:function(data){
                        console.log(data);
                        $('#src_txt').val('');
                        $('#src_txt').val(data);
                     }
                 });
        }


        </script>
    </body>
</html>


