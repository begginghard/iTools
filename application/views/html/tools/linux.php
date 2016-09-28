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



    </style>

    <body id="editor">
        <div id="wrapper">
        <?php include('nav.php');?>
            <div class="containter">
            <div class="main">
                <iframe name="right" src="<?php echo base_url();?>linux/<?php echo isset($GET['m']) ? trim($GET['m']) : 'cd';?>.html" width="100%" height="100%"></iframe>
            </div>
            <div class="sidebar">
                <div class="widget related">
                    <div class="hd">
                            <span>常用命令</span>
                    </div>
                    <div class="bd">
                        <ul>
                            <li><a href="<?php echo base_url();?>LinuxCommand?m=cd" title="cd">cd</a></li>
                            <li><a href="<?php echo base_url();?>LinuxCommand?m=pwd" title="pwd">pwd</a></li>
                            <li><a href="http://man.linuxde.net/mv" title="mv">mv</a></li>
                            <li><a href="http://man.linuxde.net/tree" title="tree">tree</a></li>
                            <li><a href="http://man.linuxde.net/mkdir" title="mkdir">mkdir</a></li>
                            <li><a href="http://man.linuxde.net/popd" title="popd">popd</a></li>
                            <li><a href="http://man.linuxde.net/cp" title="cp">cp</a></li>
                            <li><a href="http://man.linuxde.net/pushd" title="pushd">pushd</a></li>
                            <li><a href="http://man.linuxde.net/ls" title="ls">ls</a></li>
                            <li><a href="http://man.linuxde.net/install" title="install">install</a></li>
                            <li><a href="http://man.linuxde.net/rmdir" title="rmdir">rmdir</a></li>
                            <li><a href="http://man.linuxde.net/rm" title="rm">rm</a></li>
                            <li><a href="http://man.linuxde.net/dirs" title="dirs">dirs</a></li>
                         </ul>
                    </div>
                </div>
                <div id="fixedBox">
                   <div class="input-group">
                       <input type="text" class="form-control" value="命令搜索" onfocus="if (value =='命令搜索'){value =''}" onblur="if (value ==''){value='命令搜索'}">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button" onclick="searchLinux();">Go</button>
                            </span>
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
    </body>
</html>


