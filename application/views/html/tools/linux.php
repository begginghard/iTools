<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />
        <title>Linux 命令大全</title>
        <meta name="keywords" content="Linux 命令大全, Linux 命令"/>
        <meta name="description" content="Linux 命令大全, Linux 命令"/>
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
            width:75%;
            color:#2D374B;


        }
        .main {
            width: 80%;
            float: right;
            margin-bottom: 25px;
            border: 1px solid gray;
            height:1000px;
        }
        .sidebar {
            width: 17%;
            float: left;
            margin-right: 3%;

        }
        .sidebar .related {
            background-color: #E6E9ED;
        }

        .sidebar .widget {
            margin-bottom: 30px;
        }

        #fixedBox {
            position: relative;
        }

.sidebar .widget .hd {
    background: #f0ad4e;
    height: 40px;
    line-height: 40px;
    padding: 0 15px;
    font-size: 16px;
    font-weight: 300;
}


.sidebar .widget .bd {
    padding: 10px 20px;
}


li {
    display: list-item;
    text-align: -webkit-match-parent;
}
.sidebar .widget li {
    padding-bottom: 10px;
    font-size: 14px;
    list-style: none outside none;
}
.sidebar .widget li a{
    text-decoration:none;
    cursor: pointer;
}
.sidebar_search_box {
    margin-bottom: 30px;
    overflow: hidden;
}
.sidebar .widget {
    margin-bottom: 30px;
}
form{
display:block;
}

.dropdown-menu{
    filter:alpha(opacity=95); /*IE滤镜，透明度50%*/
    -moz-opacity:0.95; /*Firefox私有，透明度50%*/
    opacity:0.95;/*其他，透明度50%*/
    width:100%;
}
.dropdown-menu a{
     text-decoration:none;
}

    </style>

    <body id="editor">
        <div id="wrapper">
        <?php include('nav.php');?>
            <div class="containter">
            <div class="main">
<<<<<<< HEAD
                <iframe name="right" title="<?php echo $_GET['m']?>命令" src="<?php echo base_url();?>linux/<?php echo isset($_GET['m']) ? trim($_GET['m']) : 'cd';?>.htm" width="100%" height="100%"></iframe>
=======
                <iframe name="right" src="<?php echo base_url();?>linux/<?php echo isset($_GET['m']) ? trim($_GET['m']) : 'ls';?>.html" width="100%" height="100%"></iframe>
>>>>>>> 628f892faf5275d869c729e1859337f5fd00f038
            </div>
            <div class="sidebar">


            <div class="dropdown">
                <div class="input-group">
                    <input type="text" class="form-control" autocomplete="off" name="name" onkeyup="searchLinux();" value="命令搜索" onfocus="if (value =='命令搜索'){value =''}" onblur="if (value ==''){value='命令搜索'}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="searchLinux();">Go</button>
                    </span>
                </div>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" id="searchList">

                </ul>
            </div>
                <br>
                <div class="widget related">

                    <div class="hd">
                            <span>常用命令</span>
                    </div>

                    <div class="bd">
                        <ul>
                            <?php

                                if(!empty($data)){
                                    foreach($data as $key=>$val){
                            ?>
                            <li><a href="<?php echo base_url();?>LinuxCommand/index?m=<?php echo $val['name'];?>" title="cd"><?php echo $val['name'];?></a></li>
                            <?php }}?>
                         </ul>
                    </div>
                </div>

            </div>
            </div>
            <script>
                function searchLinux(){
                    
                }
            </script>
        <?php include('footer.php');?>
        </div>

        <script>
            function searchLinux(){
             window.event.returnValue = false;
                            var name = $('input[name="name"]').val();
                            $.ajax({
                                type:'get',
                                url: '/admin/searchCommand?name='+name,
                                cache:false,
                                success:function(data){

                                    if(data){
                                        var dataObj = eval('(' + data + ')');
                                        var html = '';
                                        for( var i in dataObj){
                                            html = html+'<li role="presentation"><a role="menuitem" tabindex="-1" href="/LinuxCommand/index?m='+dataObj[i].name+'">'+dataObj[i].name+'</a></li>';
                                        }

                                        if(html){
                                            $('#searchList').html('');

                                            $('#searchList').html(html);
                                            $('#searchList').show();
                                        }else{
                                            $('#searchList').hide();
                                        }
                                    }else{
                                       $('#searchList').hide();
                                    }
                                }
                            });
                        }

        </script>
    </body>
</html>

