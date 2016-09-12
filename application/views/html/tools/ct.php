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
            <p class="text-center form-inline">
                <span><input type="text" class="form-control" disabled="disabled" style="width:250px; margin-right:40px" id="cur_unix_stamp" value="<?php echo time(); ?>" ></span>
                <span><input type="text" class="form-control" disabled="disabled" style="width:250px;" id="cur_bj_datetime" value="<?php date_default_timezone_set("UTC"); echo date('Y-m-d h:i:s',time()); ?>"></span>
            </p>
            <p class="text-center form-inline">
                <span><input type="text" class="form-control" placeholder="Unix timestamp" style="width:250px" id="src_unix_stamp"></span>
                <span class="bttn">
                    <button type="button" onclick="unixToBj();" class="btn label-warning">
                        <span class="glyphicon glyphicon-forward"></span>
                    </button>
                </span>
                <span><input type="text" class="form-control" placeholder="yyyy-MM-dd HH:mm:ss" style="width:250px;" id="target_bj_datetime" ></span>
            </p>
            <p class="text-center form-inline">
                <span><input type="text" class="form-control" placeholder="yyyy-MM-dd HH:mm:ss" style="width:250px" id="src_bj_datetime"></span>
                <span class="bttn">
                    <button type="button" onclick="bjToUnix();" class="btn label-warning">
                        <span class="glyphicon glyphicon-forward"></span>
                    </button>
                </span>
                <span><input type="text" class="form-control" placeholder="Unix timestamp" style="width:250px;" id="target_unix_stamp" ></span>
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

    function unixToBj() {
        var unixStamp = $("#src_unix_stamp").val();
        var newDate = new Date();
        if(unixStamp.length == 13) {
            newDate.setTime(parseInt(unixStamp));
            $('#target_bj_datetime').val(newDate.Format("yyyy-MM-dd hh:mm:ss"));
        } else if(unixStamp.length == 10) {
            newDate.setTime(parseInt(unixStamp) * 1000);
            $('#target_bj_datetime').val(newDate.Format("yyyy-MM-dd hh:mm:ss"));
        } else {
            alert("时间戳格式不正确,时间戳长度不为 10(秒) 或 13(毫秒)");
            return;
        }
    }
    
    function bjToUnix() {
        var bjDateTime = $("#src_bj_datetime").val();
        if (!bjDateTime) {
            return false;
        }
        var unixStamp = Date.parse(bjDateTime)
        if(unixStamp.isNaN) {
            alert("不能识别北京时间格式");
            return;
        } else {
            $('#target_unix_stamp').val(unixStamp.toString().substring(0, unixStamp.toString().length - 3));
        }
    }

    setInterval(function(){setCurTime();},1000);
    function setCurTime() {
        var unixStamp = new Date().getTime();
        console.log(unixStamp);
        $("#cur_unix_stamp").val(unixStamp.toString().substring(0, unixStamp.toString().length - 3));
        var bjDatetime = new Date().Format("yyyy-MM-dd hh:mm:ss");
        $("#cur_bj_datetime").val(bjDatetime);
    }

    </script>
</body>
</html>


