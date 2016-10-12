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
                 <?php include('position.php');?>
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
        <div class="bottom_map">
            <div class="bottom_map_main">
            <div class="bottom_map_nav">
            <a href="javascript:" class="ToCurt" ref="tools1">站长工具</a>
            <a href="javascript:" ref="tools2">学习工具</a>
            </div>
            <div class="bottom_map_content">
                <div id="tools1" style="display:block">
                 <dl>
                  <dt>
                   在线实例
                  </dt>
                  <dd>
                   ·<a href="#">HTML 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">CSS 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">JavaScript 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">Ajax 实例</a>
                  </dd>
                   <dd>
                   ·<a href="#">jQuery 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">XML 实例</a>
                  </dd>


                 </dl>
                 <dl>
                  <dt>
                  字符集&amp;工具
                  </dt>
                  <dd>
                   · <a href="#">HTML 字符集设置</a>
                  </dd>
                  <dd>
                   · <a href="#">HTML ASCII 字符集</a>
                  </dd>
                 <dd>
                   · <a href="#">HTML ISO-8859-1</a>
                  </dd>
                  <dd>
                   · <a href="#">HTML 实体符号</a>
                  </dd>
                  <dd>
                   · <a href="#">HTML 拾色器</a>
                  </dd>
                  <dd>
                   · <a href="#l">JSON 格式化工具</a>
                  </dd>
                 </dl>
                 <dl>
                  <dt>
                   最新更新
                  </dt>
                   <dd>
                   ·
                  <a href="#" title="AngularJS2 表单">AngularJS2 表单</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="AngularJS2 用户输入">AngularJS2 用户...</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="jQuery Message">jQuery Message</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="AngularJS2 数据显示">AngularJS2 数据...</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="AngularJS2 架构">AngularJS2 架构</a>
                  </dd>
                    <dd>
                   ·
                  <a href="#" title="jQuery  jQuery.readyException() 方法">jQuery  jQuery....</a>
                  </dd>

                         </dl>
                 <dl>
                  <dt>
                   站点信息
                  </dt>
                  <dd>
                   ·
                   <a target="_blank" href="#" rel="external nofollow">意见反馈</a>
                  </dd>
                  <dd>
                   ·
                  <a href="/disclaimer">免责声明</a>
                   </dd>
                  <dd>
                   ·
                   <a href="/aboutus">关于我们</a>
                   </dd>
                  <dd>
                   ·
                  <a href="/archives">文章归档</a>
                  </dd>

                 </dl>
                </div>


                <div id="tools2" style="display:none">
                 <dl>
                  <dt>
                   在线实例
                  </dt>
                  <dd>
                   ·<a href="#">HTML 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">CSS 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">JavaScript 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">Ajax 实例</a>
                  </dd>
                   <dd>
                   ·<a href="#">jQuery 实例</a>
                  </dd>
                  <dd>
                   ·<a href="#">XML 实例</a>
                  </dd>


                 </dl>
                 <dl>
                  <dt>
                  字符集&amp;工具
                  </dt>
                  <dd>
                   · <a href="#">HTML 字符集设置</a>
                  </dd>
                  <dd>
                   · <a href="#">HTML ASCII 字符集</a>
                  </dd>
                 <dd>
                   · <a href="#">HTML ISO-8859-1</a>
                  </dd>
                  <dd>
                   · <a href="#">HTML 实体符号</a>
                  </dd>
                  <dd>
                   · <a href="#">HTML 拾色器</a>
                  </dd>
                  <dd>
                   · <a href="#l">JSON 格式化工具</a>
                  </dd>
                 </dl>
                 <dl>
                  <dt>
                   最新更新
                  </dt>
                   <dd>
                   ·
                  <a href="#" title="AngularJS2 表单">AngularJS2 表单</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="AngularJS2 用户输入">AngularJS2 用户...</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="jQuery Message">jQuery Message</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="AngularJS2 数据显示">AngularJS2 数据...</a>
                  </dd>
                          <dd>
                   ·
                  <a href="#" title="AngularJS2 架构">AngularJS2 架构</a>
                  </dd>
                    <dd>
                   ·
                  <a href="#" title="jQuery  jQuery.readyException() 方法">jQuery  jQuery....</a>
                  </dd>

                         </dl>
                 <dl>
                  <dt>
                   站点信息
                  </dt>
                  <dd>
                   ·
                   <a target="_blank" href="#" rel="external nofollow">意见反馈</a>
                  </dd>
                  <dd>
                   ·
                  <a href="/disclaimer">免责声明</a>
                   </dd>
                  <dd>
                   ·
                   <a href="/aboutus">关于我们</a>
                   </dd>
                  <dd>
                   ·
                  <a href="/archives">文章归档</a>
                  </dd>

                 </dl>
                </div>



                     <div class="search-share">
                      <div class="app-download">
                        <div>
                         <strong>交流微信</strong>
                        </div>
                      </div>
                      <div class="share">
                      <img width="150" height="150" src="<?php echo base_url();?>style/img/wx.jpeg">
                       </div>
                     </div>

            </div>
            </div>

        </div>
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
                        $('.bottom_map_nav a').hover(function(){
                           $(this).addClass('ToCurt');

                        },
                        function(){
                            $(this).removeClass('ToCurt');
                        }
                        );

        </script>
    </body>
</html>

