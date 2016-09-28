<div id="header">
    <div class="nav">
        <div class="logo">后台
        </div>
        <div class="nav_list">
            <ul class="ul_div">
                <li class='li_list <?php if(empty($_GET["p"])) {echo "now";}?>'><a href="<?php echo base_url();?>admin/editor?flag=zgh1988">命令添加</a></li>

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

