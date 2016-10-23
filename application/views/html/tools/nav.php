<style>
.has_son {
    position: relative;
}
.son{
    position: absolute;
    top: 40px;
    display:none;
    z-index:999;
}
.son li {
    width: 100%;
    background-color: #373D41;
}

.son li:hover{
    background-color:#3f474c;
}
</style>
<div id="header">
    <div class="nav">
        <div class="logo">开发者工具箱logo
        </div>
        <div class="nav_list">
            <ul class="ul_div">


                <li class='li_list  has_son <?php if (isset($_GET["p"]) && ($_GET["p"] == 10 || $_GET["p"] == 11 || $_GET["p"] == 12 )) {echo "now";}?>'><a href="#">
                    <?php if(empty($_GET["p"])){
                        echo "格式化压缩";
                    }else if($_GET["p"]!=10 && $_GET["p"]!=11 && $_GET["p"]!=12){
                         echo "格式化压缩";
                    }else if(!empty($_GET["p"]) && $_GET["p"] == 10){
                        echo "JSON格式化&压缩";
                    }else if(!empty($_GET["p"]) && $_GET["p"]== 11){
                        echo "CSS格式化&压缩";
                    }else if(!empty($_GET["p"]) && $_GET["p"] == 12){
                        echo "JS格式化&压缩";
                    }else if(!empty($_GET["p"]) && $_GET["p"] == 12){
                        echo "XML转换JSON";
                    }else{
                         echo "格式化压缩";
                    }
                    ?>
                </a>
                    <ul class="son">
                      <li ><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>json/index.html?p=10">JSON格式化&压缩</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>css/index.html?p=11">CSS格式化&压缩</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>js/index.html?p=12">JS格式化&压缩</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>jsonxml/index.html?p=12">XML转换JSON</a></li>
                    </ul>
                </li>

                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 2) {echo "now";}?>'><a href="<?php echo base_url();?>timestamp/index.html?p=2">时间格式转换</a></li>
                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 3) {echo "now";}?>'><a href="<?php echo base_url();?>regex/index.html?p=3">正则表达式</a></li>
                <li class='li_list  has_son <?php if (isset($_GET["p"]) && ($_GET["p"] == 4 || $_GET["p"] == 5 || $_GET["p"] == 6 )) {echo "now";}?>'><a href="#">
                    <?php if(empty($_GET["p"])){
                        echo "编解码";
                    }else if($_GET["p"]!=4 && $_GET["p"]!=5 && $_GET["p"]!=6){
                         echo "编解码";
                    }else if(!empty($_GET["p"]) && $_GET["p"] == 4){
                        echo "URL编码";
                    }else if(!empty($_GET["p"]) && $_GET["p"]== 5){
                        echo "Base64编码";
                    }else if(!empty($_GET["p"]) && $_GET["p"] == 6){
                        echo "md5加密";
                    }else{
                         echo "编解码";
                    }
                    ?>

                </a>
                    <ul class="son">
                      <li ><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>Url/index.html?p=4">URL编码</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>base64/index.html?p=5">Base64编码</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>Md5/index.html?p=6">md5加密</a></li>
                    </ul>
                </li>
                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 7) {echo "now";}?>'><a href="<?php echo base_url();?>linux/mv.htm?p=7">Linux命令大全</a></li>
                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 8) {echo "now";}?>'><a href="<?php echo base_url();?>git/init.htm?p=8">Git命令大全</a></li>
                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 9) {echo "now";}?>'><a href="<?php echo base_url();?>redis/DEL.htm?p=9">Redis命令大全</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
$('.has_son *').hover(
    function(){
        $('.son').show();
    },
    function(){
        $('.son').hide();

    }
);

(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https'){
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else{
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>

