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
            margin:0 auto;
            margin-top: 50px;
            margin-bottom: 350px;
            width:70%;

        }
        .tag{
            margin:0 auto;
            height:50px;
            line-height:50px;
        }
        .tag span{
            cursor: pointer;
        }
        #pattern {
            width:%50;
        }
    </style>

    <body id="editor">
        <div id="wrapper">
            <?php include('nav.php');?>
            <div class="containter">
            <div class="tag">
                <label for="exampleInputEmail1">常用正则表达式</label>
                <span class="label label-default" onclick="setRegExp('email')">email地址</span>
                <span class="label label-primary" onclick="setRegExp('url')">网址url</span>
                <span class="label label-success" onclick="setRegExp('phone')">电话号码(国内)</span>
                <span class="label label-info" onclick="setRegExp('zipcode')">邮政编码</span>
                <span class="label label-warning" onclick="setRegExp('ip')">ip</span>
                <span class="label label-danger" onclick="setRegExp('idcard')">身份证号</span>
                <span class="label label-default" onclick="setRegExp('positive')">正整数</span>
                <span class="label label-primary" onclick="setRegExp('negative')">负整数</span>
                <span class="label label-success" onclick="setRegExp('number')">整数</span>
                <span class="label label-success" onclick="setRegExp('datetime')">格式日期</span>
                <span class="label label-info" onclick="setRegExp('qq')">qq号</span>
                <span class="label label-warning" onclick="setRegExp('telephone')">手机号码</span>
                <span class="label label-primary" onclick="setRegExp('double')">浮点型</span>
            </div>

            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">正则表达式原文</label>
                    <textarea class="form-control" rows="5" id="src_txt"></textarea>
                </div>
            </form>

            <form class="form-inline" role="form">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">正则表达式</div>
                        <input class="form-control" type="text" placeholder="正则表达式" id="pattern" style="width:500px">
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> 忽略大小写
                    </label>
                </div>
                <button type="button" class="btn btn-warning" onclick="parseRegex();">测试匹配</button>
            </form>

            <form role="form" style="margin-top:20px">
                <div class="form-group">
                    <label for="exampleInputEmail1">匹配结果</label>
                    <textarea class="form-control" rows="5" disabled id="target_txt"></textarea>
                </div>
            </form>

        </div>
            <?php include('footer.php');?>
        </div>

        <script>
        function parseRegex() {
            var srcText = $("#src_txt").val();
            var pattern = $("#pattern").val();
            if(!srcText) {
                return false;
            }

            if(!pattern) {
                alert("请添加正则表达式");
            } else {
                var regexExp = new RegExp(pattern, "g");
                var targetText = srcText.match(regexExp);
                console.log(targetText);
                $("#target_txt").val(targetText);
            }
        }

        function setRegExp(type) {
            var typeToPattern = new Array();
            typeToPattern["email"] = "\\w[-\\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\\.)+[A-Za-z]{2,14}";
            typeToPattern["url"] = "^((https|http|ftp|rtsp|mms)?:\\/\\/)[^\\s]+";
            typeToPattern["phone"] = "0?(13|14|15|18)[0-9]{9}";
            typeToPattern["zipcode"] = "\\d{6}";
            typeToPattern["ip"] = "(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)\\.(25[0-5]|2[0-4]\\d|[0-1]\\d{2}|[1-9]?\\d)";
            typeToPattern["idcard"] = "\\d{17}[\\d|x]|\\d{15}";
            typeToPattern["positive"] = "[1-9]\\d*";
            typeToPattern["negative"] = "-[1-9]\\d*";
            typeToPattern["number"] = "-?[1-9]\\d*";
            typeToPattern["datetime"] = "\\d{4}(\\-|\\/|.)\\d{1,2}\\1\\d{1,2}";
            typeToPattern["qq"] = "[1-9]([0-9]{5,11})";
            typeToPattern["telephone"] = "0?(13|14|15|18)[0-9]{9}";
            typeToPattern["double"] = "-?[1-9]\\d*.\\d*|0.\\d*[1-9]\\d*";
            $("#pattern").val(typeToPattern[type]);
            $("#target_txt").val("");
        }
        </script>
    </body>
</html>

