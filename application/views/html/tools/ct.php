<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
    <meta name="author" content="www.123itools.com" />
    <meta name="keywords" content="json格式化,json压缩,it工具箱,时间戳转换,www.123itools.com,json在线解析,json格式化工具" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/numberedtextarea.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/font-awesome.min.css" />
    <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.json.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.numberedtextarea.js"></script>
    <script src="<?php echo base_url();?>style/js/json2.js"></script>
    <script src="<?php echo base_url();?>style/js/jsoninit.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.zclip.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jsoninit.js"></script>
    <title>开发者工具箱</title>
</head>

<body id="editor">
<div id="wrapper">
<?php include('nav.php');?>
     <div>
        <div id="CodeArea" >
            <textarea id="json-src" style="line-height:15px"></textarea>
        </div>

        <div  class="jiantou" style="float:left;">
            <div class="botton-div">
                <div class="bt zip">压缩结果</div>
                <div class="bt hover" style="cursor:pointer"  id="copy">复制结果</div>
            </div>
        </div>
	
	<div id="right-box"  style="height:510px;border-left:solid 1px #ddd;box-shadow: 1px 1px 50px #ECECEC;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;border-radius:0;resize: none;overflow-y:scroll;position:relative;">
            <div id="json-target" class="ro" style="padding:0px 5px;over">
            </div>
        </div>
    </div>

   <?php include('footer.php');?> 
</div>
<script>
 $(function () {
       $('#copy').zclip({path:'<?php echo base_url();?>style/js/ZeroClipboard.swf', copy: function () { return $("#json-target").text(); } });
    });
</script>
<script type="text/javascript">
    $('textarea').numberedtextarea();
    var current_json = '';
    var current_json_str = '';
    var xml_flag = false;
    var zip_flag = false;
    var shown_flag = false;
    function init(){
        xml_flag = false;
        zip_flag = false;
        shown_flag = false;
        renderLine();

    }
    $('#json-src').keyup(function(){
     keyup(); 
    });
function keyup(){
	init();
        var content = $.trim($('#json-src').val());
        var result = '';
        if (content!='') {
            try{
                current_json = jsonlint.parse(content);
                current_json_str = JSON.stringify(current_json);
                //current_json = JSON.parse(content);
                result = new JSONFormat(content,4).toString();
            }catch(e){
                result = '<span style="color: #f1592a;font-weight:bold;">' + e + '</span>';
                current_json_str = result;
            }
            $('#json-target').html(result);
        }else{
            $('#json-target').html('');
        }

}
keyup();
    function renderLine(){

	$('#json-src').attr("style","height:510px;padding:0 10px 10px 40px;border:0;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd;border-radius:0;resize: none; outline:none; line-height:15px");
            $('#json-target').attr("style","padding:0px 5px;");
            $('.numberedtextarea-line-numbers').show();
    }
$('.zip').click(function(){
    if (zip_flag) {
        $('#json-src').keyup();
	 $(this).html('');
        $(this).html('压缩结果');
    }else{
        $('#json-target').html(current_json_str);
	$(this).html('');
	$(this).html('解压结果');
        zip_flag = true;
    }
});
  
</script>

</body>
</html>


