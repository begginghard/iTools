<div id="header">
    <div class="nav">
        <div class="logo">后台
        </div>
        <div class="nav_list">
            <ul class="ul_div">
                <li class='li_list <?php if(empty($_GET["p"])) {echo "now";}?>'><a href="<?php echo base_url();?>admin/editor?flag=zgh1988">命令添加</a></li>
                <li class='li_list <?php if(!empty($_GET["p"]) && $_GET["p"] == 2) {echo "now";}?>'><a href="<?php echo base_url();?>admin/modifyCommand?p=2&flag=zgh1988">编辑命令</a></li>
                <li class='li_list <?php if(!empty($_GET["p"]) && $_GET["p"] == 3) {echo "now";}?>'><a href="<?php echo base_url();?>admin/upCache?p=3&flag=zgh1988">更新缓存</a></li>

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

