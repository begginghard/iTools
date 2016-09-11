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
    <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
    <title>开发者工具箱</title>
</head>
<style>
.containter{
    margin-top: 50px;
    margin-bottom: 400px;
}
.text-center{
height:50px;
line-height:50px;
font-size:14px;
}
.text{
    position: relative;
    top: -5px;
    padding-right: 10px;
}
.bttn{
    padding-right: 5px;
    position: relative;
    top: -5px;
}
</style>
<body id="editor">
<div id="wrapper">
<?php include('nav.php');?>
     <div class="containter">
   	 <p class="text-center"><span class="text">Unix时间戳(Unix timestamp)</span><span><input type="text" class="form-control" placeholder="Username"></span><span class="bttn"> <button type="button" class="btn btn-default">按钮 7</button></span><span><input type="text" class="form-control" placeholder="" width="wt200"></span></p>
 <p class="text-center"><span class="text">Unix时间戳(Unix timestamp)</span><span><input type="text" class="form-control" placeholder="Username"></span><span class="bttn"> <button type="button" class="btn btn-default">按钮 7</button></span><span><input type="text" class="form-control" placeholder="" width="wt200"></span></p>
	 
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


