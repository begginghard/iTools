<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
    <meta name="360-site-verification" content="4d7c97467fc2d215cd2bae44e63ec76e" />
    <meta name="google-site-verification" content="wJHmpaG5IpZT-QrPKHh6ugEQWmu8jCePnavT_xHchMM" />
    <title>js格式化,js压缩,js格式化工具,js压缩工具</title>
    <?php include('meta.php');?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/numberedtextarea.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/font-awesome.min.css" />
    <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jquery.zclip.min.js"></script>
    <script src="<?php echo base_url();?>style/js/jsbeautify.js"></script>
</head>

<body id="editor">
    <div id="wrapper">
        <?php include('nav.php');?>
        <div>
            <div id="CodeArea" >
                <textarea id="js" style="line-height:15px; background:white"></textarea>
            </div>

            <div class="jiantou" style="float:left; width:9%">
                <div class="botton-div">
                    <div class="bt zip" id="format" onclick="format();">格式化</div>
                    <div class="bt zip" id="compress" onclick="compress();">压缩</div>
                    <div class="bt hover" style="cursor:pointer" id="copy">复制结果</div>
                </div>
            </div>

            <div id="CodeAreaTarget" style="float:right;">
                <textarea id="fjs" style="line-height:15px; background:white"></textarea>
            </div>
        </div>
        <?php include('bottom_map.php');?>
        <?php include('footer.php');?>
    </div>

    <script>
        function format() {
            var js_source =$('#js').val().replace(/^\s+/, '');
            if(js_source.length==0)
              return;
            var fjs = js_beautify(js_source, 4, ' ');
            $("#fjs").val(fjs);
        }

        function compress() {
            var postData = {"js": $("#js").val()};
            $.ajax({
                    type:'post',
                    data: postData,
                    url: '/js/compress',
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $("#fjs").val(data.trim());
                    }
                }
            )
        }

        $(function () {
            $('#copy').zclip({
                path:'<?php echo base_url();?>style/js/ZeroClipboard.swf',
                copy: function() {
                    return $("#fjs").val();
                }
            });
        });
    </script>
</body>
</html>


