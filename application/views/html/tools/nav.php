<div id="header">
    <div class="nav">
        <div class="logo">开发者工具箱logo
        </div>
        <div class="nav_list">
            <ul class="ul_div">
                <li class='li_list <?php if(empty($_GET["p"])) {echo "now";}?>'><a href="<?php echo base_url();?>json/index">json格式转换</a></li>
                <li class='li_list <?php if ($_GET["p"] == 2) {echo "now";}?>'><a href="<?php echo base_url();?>timestamp/index?p=2">时间格式转换</a></li>
                <li class='li_list <?php if ($_GET["p"] == 3) {echo "now";}?>'><a href="<?php echo base_url();?>regex/index?p=3">正则表达式</a></li>
                <li class='li_list <?php if ($_GET["p"] == 4) {echo "now";}?>'><a href="<?php echo base_url();?>url/index?p=4">URL编码</a></li>
                <li class='li_list <?php if ($_GET["p"] == 5) {echo "now";}?>'><a href="<?php echo base_url();?>base64/index?p=5">Base64编码</a></li>
                <li class='li_list <?php if ($_GET["p"] == 6) {echo "now";}?>'><a href="<?php echo base_url();?>md5/index?p=6">md5加密</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
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

