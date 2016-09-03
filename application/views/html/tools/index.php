<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="w3school.com.cn" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    </script>

    <title>开发者工具箱</title>
</head>

<body id="editor">

<div id="wrapper">
    <div id="header">
        <div class="nav">
            <div class="logo">开发者工具箱logo</div>
            <div class="nav_list">
                <ul class="ul_div">
                    <li class="li_list"><a href="#">json格式转换</a></li>
                    <li class="li_list"><a href="#">时间格式转换</a></li>
                    <li class="li_list"><a href="#">序列化数组</a></li>
                    <li class="li_list"><a href="#">json格式转换</a></li>
                    <li class="li_list"><a href="#">时间格式转换</a></li>
                    <li class="li_list"><a href="#">序列化数组</a></li>
                </ul>
            </div>
        </div>
        <div id="ad">
            广告

        </div>
    </div>
<div>
    <div>
    <form action="" method="post" id="tryitform" name="tryitform" onSubmit="validateForm();" target="i">

        <div id="butt">
            <input type="button" value="提交代码" onClick="submitTryit()">
        </div>

        <div id="CodeArea">
            <h2 id="codeTitle">json格式转换</h2>

            <textarea id="TestCode" wrap="logical">
<!DOCTYPE html>
<html>
<head>
<style>
div
{
    text-align:center;
    border:2px solid #a1a1a1;
    padding:10px 40px;
    background:#dddddd;
    width:350px;
    border-radius:25px;
    -moz-border-radius:25px; /* 老的 Firefox */
}
</style>
</head>
<body>

<div>border-radius 属性允许您向元素添加圆角。</div>

</body>
</html>
</textarea>
        </div>

        <input type="hidden" id="code" name="code"  />
        <input type="hidden" id="bt" name="bt" />

    </form>
        </div>
    <div  class="jiantou" style="float:left;">
        <div class="botton-div">
            <div class="bt"><a href="#">提交结果</a></div>
            <div class="bt"><a href="#">复制结果</a></div>
        </div>
    </div>
    <div id="result">
        <h2>转换结果:</h2>
        <iframe frameborder="0" name="i" src=""></iframe>
    </div>
</div>
    <div id="footer">
        <br>
        <p>如有问题,可email到492060267@qq.com</p>
        <p>联系电话:15101193015</p>
        <p>京ICP备13051813号-5  京公网安备11010802014000</p>
    </div>


</div>

<script type="text/javascript">
</script>

<script>
    $('.li_list').click(function(){
        var txt = $(this).text();
        $('#codeTitle').html(txt);
    });

</script>
</body>
</html>

