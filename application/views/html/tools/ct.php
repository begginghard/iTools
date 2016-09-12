<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
    <?php include('meta.php');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
    <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
    <title>开发者工具箱-json格式化,json压缩,json在线解析,json格式化工具,正则表达式测试,时间戳转换</title>
</head>
<style>
.containter{
    margin-top: 50px;
    margin-bottom: 350px;
}
.text-center{
height:50px;
line-height:50px;
font-size:14px;
}
.text{
    #position: relative;
    #top: -5px;
    #padding-right: 10px;
}
.bttn{
    #padding-right: 5px;
    #position: relative;
    #top: -5px;
}
.btn{color:white;}
</style>
<body id="editor">
    <div id="wrapper">
        <?php include('nav.php');?>
        <div class="containter">
            <p class="text-center form-inline ">
                <span class="text">Unix时间戳(Unix timestamp)</span>
                <span><input type="text" class="form-control" placeholder="Unix timestamp" value="<?php echo time();?>"  id="input_1"></span>
                <span class="bttn"> <button type="button" onclick="unixtobj();" class="btn label-warning">转换成北京时间</button></span>
                <span><input id="result_1" type="text" class="form-control" placeholder="" width="wt200" disabled="disabled"></span>
            </p>
            <p class="text-center form-inline">
                <span class="text">北京时间(yyyy-MM-dd HH:mm:ss)</span>
                <span><input type="text" class="form-control" placeholder="北京时间" id="input_2" value="<?php date_default_timezone_set('UTC'); echo date("Y-m-d H:i:s"); ?>"></span>
                <span class="bttn"> <button type="button" onclick="bjToUnix();" class="btn label-warning">转换成Unix时间戳</button></span>
                <span><input type="text" class="form-control" placeholder="" width="wt200" id="result_2" disabled="disabled"></span>
            </p>
        </div>
        <?php include('footer.php');?> 
    </div>
    
    <script>
    Date.prototype.Format = function(fmt)   
    { //author: meizz   
      var o = {   
        "M+" : this.getMonth()+1,                 //月份   
        "d+" : this.getDate(),                    //日   
        "h+" : this.getHours(),                   //小时   
        "m+" : this.getMinutes(),                 //分   
        "s+" : this.getSeconds(),                 //秒   
        "q+" : Math.floor((this.getMonth()+3)/3), //季度   
        "S"  : this.getMilliseconds()             //毫秒   
      };   
      if(/(y+)/.test(fmt)) {   
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
      }
      if(/(S+)/.test(fmt)) {
        var replaceStr = "";
        for (var i = 0; i < RegExp.$1.length - this.getMilliseconds().toString().length; i++) {
            replaceStr += "0";
        }
        fmt=fmt.replace(RegExp.$1, replaceStr + this.getMilliseconds());
      }
      for(var k in o)   
        if(new RegExp("("+ k +")").test(fmt))   
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
      return fmt;   
    }  


    function unixtobj() {
        var unixStamp = $("#input_1").val();
        var newDate = new Date();
        if(unixStamp.length == 13) {
            newDate.setTime(parseInt(unixStamp));
            $('#result_1').val(newDate.Format("yyyy-MM-dd hh:mm:ss,SSS"));
        } else if(unixStamp.length == 10) {
            newDate.setTime(parseInt(unixStamp) * 1000);
            $('#result_1').val(newDate.Format("yyyy-MM-dd hh:mm:ss,SSS"));
        } else {
            alert("时间戳格式不正确,时间戳长度不为 10(秒) 或 13(毫秒)");
            return;
        }
    }
    
    function bjToUnix() {
        var bjDateTime = $("#input_2").val();
        if (!bjDateTime) {
            return false;
        }
        var unixStamp = Date.parse(bjDateTime)
        if(unixStamp.isNaN) {
            alert("不能识别北京时间格式");
            return;
        } else {
            $('#result_2').val(unixStamp)
        }
    }

    </script>
</body>
</html>


