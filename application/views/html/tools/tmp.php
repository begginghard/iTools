<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />
        <title><?php echo $title;?></title>
        <meta name="keywords" content="<?php echo $key_words;?>"/>
        <meta name="description" content="<?php echo $content_words;?>"/>
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
             <?php include('position.php');?>
            <div class="main" id="main">
                <?php echo $content;?>
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
                                if(!empty($data)){

                                    foreach($data as $key=>$val){
                                        $type = isset($val[$name]['classify']) ? $val[$name]['classify'] : null;

                            ?>
                            <li class="<?php if($type!==null && $key == $type ){echo "open";}else{echo "";}?>">
                                <div class="link"><i class="fa fa-paint-brush"></i><?php echo isset($classify[$key]) ? $classify[$key] : 'default'?><i class="fa fa-chevron-down"></i></div>
                                <ul class="submenu" style="display:<?php if($type!==null && $key == $type ){echo "block";}else{echo "none";}?>">
                                <?php

                                    if(!empty($val)){
                                        foreach($val as $k=>$v){
                                ?>
                                    <li class="<?php if($v['name']== $name ){echo "now_command";}else{echo "";}?>"><a href="<?php echo $command_url_pre.$v['name'].'.htm';?>" title="cd"><?php echo $v['name'];?></a></li>

                                <?php }}?>
                                </ul>
                            </li>
                             <?php }}?>

                        	</ul>

                    </div>
                </div>

            </div>
            </div>
        <?php include('bottom_map.php');?>
        <?php include('footer.php');?>
        </div>
        <input type="hidden" value="<?php echo $type_flag;?>">
        <script>
            function searchLinux(){
             window.event.returnValue = false;
                            var name = $('input[name="name"]').val();
                            var pre_url = '<?php echo $command_url_pre;?>';
                            var type = '<?php echo $type_flag;?>';
                            $.ajax({
                                type:'get',
                                url: '/admin/searchCommand?name='+name+'&type='+type,
                                cache:false,
                                success:function(data){

                                    if(data){
                                        var dataObj = eval('(' + data + ')');
                                        var html = '';
                                        for( var i in dataObj){
                                            html = html+'<li role="presentation"><a role="menuitem" tabindex="-1" href="'+pre_url+dataObj[i].name+'.htm">'+dataObj[i].name+'</a></li>';
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

