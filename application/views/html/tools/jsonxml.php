<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
    <meta name="360-site-verification" content="4d7c97467fc2d215cd2bae44e63ec76e" />
    <meta name="google-site-verification" content="wJHmpaG5IpZT-QrPKHh6ugEQWmu8jCePnavT_xHchMM" />
    <title>xml,json在线转换, xml-json格式转换</title>
    <?php include('meta.php');?>
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
</head>

<body id="editor">
    <div id="wrapper">
        <?php include('nav.php');?>
        <div>
            <div id="CodeArea">
                <button>JSON</button>
                <textarea id="json" placeholder="请输入 Json 内容" style="line-height:15px; background:white"></textarea>
            </div>

            <div class="jiantou" style="float:left; width:9%" >
                <div class="botton-div">
                    <div class="bt" id="json2xml"  onclick="jsontoxml();">>>></div>
                    <div class="bt" id="xml2json"  onclick="xmltojson();"><<<</div>
                </div>
            </div>

            <div id="CodeAreaTarget" style="float:right;">
                <button>XML</button>
                <textarea id="xml" placeholder="请输入 XML 内容" style="line-height:15px; background:white"></textarea>
            </div>
        </div>
        <?php include('bottom_map.php');?>
        <?php include('footer.php');?>
    </div>

    <script>
        function xmltojson() {
            var xml_src = $("#xml").val();
            var postData = {"xml":xml_src}
            $.ajax({
                    type:'post',
                    data: postData,
                    url: '/jsonxml/xmltojson',
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $("#json").val(data);
                    }
                }
            )
        }

        function jsontoxml() {
            var json_src = $("#json").val();
            var postData = {"json":json_src}
            $.ajax({
                    type:'post',
                    data: postData,
                    url: '/jsonxml/jsontoxml',
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $("#xml").val(data);
                    }
                }
            )
        }
    </script>
</body>
</html>


