<div id="header">
    <div class="nav">
        <div class="logo">开发者工具箱logo
        </div>
        <div class="nav_list">
            <ul class="ul_div">
                <li class='li_list <?php if(empty($_GET["p"])) {echo "now";}?>'><a href="<?php echo base_url();?>">json格式转换</a></li>
                <li class='li_list <?php if ($_GET["p"] == 2) {echo "now";}?>'><a href="<?php echo base_url();?>tools/ct?p=2">时间格式转换</a></li>
                <li class='li_list <?php if ($_GET["p"] == 3) {echo "now";}?>'><a href="<?php echo base_url();?>tools/regex?p=3">正则表达式</a></li>
            </ul>
        </div>
    </div>
</div>

