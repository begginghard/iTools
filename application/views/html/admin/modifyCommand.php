<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />

        <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>style/admin/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>style/admin/ueditor.all.min.js"> </script>
        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>style/admin/zh-cn.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.3.3.5.min.css" />
        <title>命令添加</title>
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

    <body id="">
        <div id="wrapper">
            <?php include('nav.php');?>
            <div class="containter">
                <div id="fixedBox">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" value="命令搜索" onfocus="if (value =='命令搜索'){value =''}" onblur="if (value ==''){value='命令搜索'}">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button" onclick="searchLinux();">Go</button>
                            </span>
                    </div>
                </div>
                <div style="margin-top:10px; display:none;">
                    <ul class="list-group" id="searchList">

                    </ul>
                </div>
            </div>
            <div style="height:100px;"></div>

        </div>
        <script type="text/javascript">
            function searchLinux(){
                var name = $('input[name="name"]').val();
                $.ajax({
                    type:'get',
                    url: '/admin/searchCommand?name='+name,
                    cache:false,
                    success:function(data){
                        alert(data);
                        if(data){
                            var dataObj = eval('(' + data + ')');
                            var html = '';
                            for( var i in dataObj){
                               html = html+'<li class="list-group-item"><a href="/admin/editor?flag=zgh1988&id='+dataObj[i].id+'">'+dataObj[i].name+'</a></li>';
                            }
                            alert(html);
                            if(html){
                                $('#searchList').html('');

                                $('#searchList').html(html);
                                $('#searchList').parent().show();
                            }
                        }
                    }
                });
            }
        </script>

    </body>
</html>


