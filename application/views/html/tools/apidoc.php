<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="gb2312" />
    <meta name="robots" content="all" />
    <meta name="author" content="www.123itools.com" />
    <meta name="360-site-verification" content="4d7c97467fc2d215cd2bae44e63ec76e" />
    <meta name="google-site-verification" content="wJHmpaG5IpZT-QrPKHh6ugEQWmu8jCePnavT_xHchMM" />
    <title>json格式化,json压缩,json在线解析,json格式化工具</title>
    <?php include('meta.php');?>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="JSON格式,JS,CSS压缩,Md5编码,Base64编码,URL编码,时间戳转换,正则表达式在线解析,Linux命令大全,Git命令大全,Redis命令大全" />
    <meta property="og:description" content="JSON格式,JS,CSS压缩,Md5编码,Base64编码,URL编码,时间戳转换,正则表达式在线解析,Linux命令大全,Git命令大全,Redis命令大全" />
    <meta property="og:url" content="www.123itools.com" />
 
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

    <style type="text/css">
        #left {
            line-height:30px;
            width:300px;
            float:left;
            padding:5px;
        }

        #right {
            padding:10px;
        }

    </style>
</head>

<body id="editor">
    <div id="wrapper">
        <?php include('nav.php');?>
        <div id="left" >
            <div id="search">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_text" onkeyup="sendSearch()" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="sendSearch();">Go!</button>
                    </span>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" id="searchList">
                    </ul>
                </div><!-- /input-group -->
            </div>

            <div id="apilist">
                <ul class="list-group">
                    <li class="list-group-item" onclick="initLocalStorage('Java')">Java</li>
                    <li class="list-group-item" onclick="initLocalStorage('PHP')">PHP</li>
                    <li class="list-group-item" onclick="initLocalStorage('Python')">Python</li>
                    <li class="list-group-item" onclick="initLocalStorage('ES')">ES</li>
                </ul>
            </div>
        </div>
        <div id="right">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" id="url" src="http://docs.oracle.com/javase/7/docs/api/java/util/concurrent/locks/AbstractQueuedLongSynchronizer.html"></iframe>
            </div>
        </div>
        <?php include('bottom_map.php');?>
        <?php include('footer.php');?>
    </div>

    <script>
        $(document).ready(function () {
            initLocalStorage("Java");
        });

        function initLocalStorage(type) {
            var postData = {
                "type":type
            };

            $.ajax({
                type:'post',
                data: postData,
                url: 'apidoc_controller/getAllTitle',
                success:function(data) {
                    console.log(data);
                    var storage=window.localStorage;
                    storage.setItem("data",data);
                }
            })
        }


        function sendSearch() {
            var searchText = $('#search_text').val();
            var storage = window.localStorage;
            var suggestions=JSON.parse(storage.getItem("data"));

            var display_suggestions = suggestions.filter(function(suggestion) {
                return suggestion['title'].indexOf(searchText) >= 0;
            });

            display_suggestions = display_suggestions.map(function(suggestion) {
                suggestion['title'].replace(searchText, "<font color='red'>" + searchText + "</font>");
                return suggestion;
            })

            var dom = display_suggestions.map(function(indice) {
                return '<li role="presentation" onclick="updateUrl(\'' + indice['url'] + '\');">' + indice['title'] + '</li>'
            }).join("\n");

            if(dom){
                $('#searchList').html(dom);
                $('#searchList').show();
            }else{
                $('#searchList').hide();
            }
        }

        function updateUrl(url) {
            $("#url").attr("src", url);
            $('#searchList').hide();
        }
    </script>
</body>
</html>


