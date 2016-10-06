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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/command.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/command2.css" />
        <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url();?>style/js/index.js"></script>
    </head>

    <body id="editor">
        <div id="wrapper">
        <?php include('nav.php');?>
            <div class="containter">
            <div class="main">
                <iframe name="right" style="text-align:center;padding:20px;" title="<?php echo  isset($_GET['m']) ? trim($_GET['m']) : '';;?>命令" src="<?php echo base_url();?>linux/<?php echo isset($_GET['m']) ? trim($_GET['m']) : 'cd';?>.htm" width="100%" height="100%"></iframe>
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
                        <ul id="accordion" class="accordion">
                            <?php

                                $m = isset($_GET['m']) ? trim($_GET['m']): 'cd';

                                if(!empty($data)){

                                    foreach($data as $key=>$val){
                                    $type = isset($val[$m]['classify']) ? $val[$m]['classify'] : null;

                            ?>
                            <li class="<?php if($type!==null && $key == $type ){echo "open";}else{echo "";}?>">
                                <div class="link"><i class="fa fa-paint-brush"></i><?php echo isset($classify[$key]) ? $classify[$key] : 'default'?><i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu" style="display:<?php if($type!==null && $key == $type ){echo "block";}else{echo "none";}?>">
                                <?php

                                    if(!empty($val)){
                                        foreach($val as $k=>$v){
                                ?>
                                    <li class="<?php if($v['name']== $m ){echo "now_command";}else{echo "";}?>"><a href="<?php echo base_url();?>LinuxCommand/index.html?m=<?php echo $v['name'];?>" title="cd"><?php echo $v['name'];?></a></li>

                                <?php }}?>
                                </ul>
                            </li>
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
                            var type = 1;
                            $.ajax({
                                type:'get',
                                url: '/admin/searchCommand?name='+name+'&type'+type,
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

