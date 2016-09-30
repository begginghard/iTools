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
                <li class='li_list <?php if(empty($_GET["p"])) {echo "now";}?>'><a href="<?php echo base_url();?>json/index">json格式转换</a></li>
                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 2) {echo "now";}?>'><a href="<?php echo base_url();?>timestamp/index?p=2">时间格式转换</a></li>
                <li class='li_list <?php if (isset($_GET["p"]) && $_GET["p"] == 3) {echo "now";}?>'><a href="<?php echo base_url();?>regex/index?p=3">正则表达式</a></li>
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
                      <li ><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>Url/index?p=4">URL编码</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>base64/index?p=5">Base64编码</a></li>
                      <li><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>Md5/index?p=6">md5加密</a></li>
                    </ul>
                </li>

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

