<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8"/>
        <meta name="robots" content="all" />
        <meta name="author" content="www.123itools.com" />

        <script src="<?php echo base_url();?>style/js/jquery-3.1.0.min.js"></script>

        <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
        <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/index.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/css/bootstrap.3.3.5.min.css" />
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>style/admin/ueditor.config.js"></script>
                <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>style/admin/ueditor.all.min.js"> </script>
                <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>style/admin/zh-cn.js"></script>
        <title>命令添加</title>
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
        #ZeroClipboardMovie_1{
            position: relative;
            top: 0px;
        }
    </style>

    <body id="">
        <div id="wrapper">
            <?php include('nav.php');?>
            <div class="containter">
                 <h1><?php if(empty($id)){echo "添加命令";}else{echo "修改命令";}?></h1>
                   <form action="<?php if(!empty($id)){echo "/Admin/submitEdit";}else{echo "/Admin/submitEditor";}?>"  method="post">
                   <input type="hidden" name="id" value="<?php if(!empty($id)){echo $id;}?>">
                   <div class="row">
                      <label for="inputEmail3" class="col-sm-2 control-label">命令名称</label>
                      <div class="col-xs-2">
                        <input type="text" name="name"  autocomplete="off" value="<?php if(isset($id)){echo $name;}?>" class="form-control"  placeholder="命令名称">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="inputEmail3" class="col-sm-2 control-label">展示优先级</label>
                        <div class="col-xs-2">
                            <input type="text" name="display_sort" value="<?php if(isset($id)){echo $display_sort;}?>" class="form-control" placeholder="展示优先级">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="" class="wt100 ">命令分类：</label>
                        <select class="form-control" name="type" onchange="changeCommand();">

                            <?php

                                if(!empty($command_type)){
                                    foreach($command_type as $key=>$val){
                            ?>
                            <option value="<?php echo $key;?>" <?php if(!empty($type) && $type == $key){echo "selected";}?>><?php echo $val;?></option>
                            <?php
                                    }
                                }

                            ?>

                         </select>
                     </div>
                        <div class="form-group clearfix" style="display:none;" id="classify_div">
                            <label for="" class="wt100 ">二级分类：</label>
                            <select class="form-control" name="classify">

                            </select>
                     </div>
                    内容:<script id="editor" name="content" type="text/plain" style="width:1000px;height:1500px;">
                    </script>
                   <input type="submit" value="提交" class="btn">
                    </form>
            </div>
            <div style="height:100px;"></div>

        </div>
        <div id="">
            <div>
                <button onclick="getAllHtml()">获得整个html的内容</button>
                <button id="getContent" onclick="getContent()">获得内容</button>
                <button onclick="setContent()" id="setContent">写入内容</button>
                <button onclick="setContent(true)">追加内容</button>
                <button onclick="getContentTxt()">获得纯文本</button>
                <button onclick="getPlainTxt()">获得带格式的纯文本</button>
                <button onclick="hasContent()">判断是否有内容</button>
                <button onclick="setFocus()">使编辑器获得焦点</button>
                <button onmousedown="isFocus(event)">编辑器是否获得焦点</button>
                <button onmousedown="setblur(event)" >编辑器失去焦点</button>

            </div>
            <div>
                <button onclick="getText()">获得当前选中的文本</button>
                <button onclick="insertHtml()">插入给定的内容</button>
                <button id="enable" onclick="setEnabled()">可以编辑</button>
                <button onclick="setDisabled()">不可编辑</button>
                <button onclick=" UE.getEditor('editor').setHide()">隐藏编辑器</button>
                <button onclick=" UE.getEditor('editor').setShow()">显示编辑器</button>
                <button onclick=" UE.getEditor('editor').setHeight(300)">设置高度为300默认关闭了自动长高</button>
            </div>

            <div>
                <button onclick="getLocalData()" >获取草稿箱内容</button>
                <button onclick="clearLocalData()" >清空草稿箱</button>
            </div>

        </div>
        <script type="text/javascript">

            //处理编辑的默认选中
            var classify = '<?php if(isset($classify)){echo $classify;}?>';

            var classify_type = '<?php echo $classify_type;?>';
            var classfyObj = eval('(' + classify_type + ')');
            function changeCommand(){
                var type = $('select[name="type"]').val();
                var classfyCommandObj = null;
                if(classfyObj[type]){
                   classfyCommandObj =  classfyObj[type];
                }
                var html = '';
                if(classfyCommandObj!=null){
                    for (var i in classfyCommandObj){
                        if(classify && classify == i){
                            html = html+'<option value="'+i+'" selected="selected">'+classfyCommandObj[i]+'</option>';
                        }else{
                            html = html+'<option value="'+i+'">'+classfyCommandObj[i]+'</option>';
                        }
                    }
                    if(html!=''){
                        $('select[name="classify"]').html('');
                        $('select[name="classify"]').html(html);
                        $('#classify_div').show();
                    }else{
                         $('#classify_div').hide();
                    }

                }else{
                    $('#classify_div').hide();
                }

            }
            changeCommand();
            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');
            //编辑时内容默认填入
            var content = '<?php if(!empty($content)){ $content = json_encode(stripslashes($content));$content = trim($content);$content = trim($content,"\"");echo $content;}?>';
            if(content){
                ue.addListener("ready", function () {
                // editor准备好之后才可以使用
                 ue.setContent(content);

                });
            }

            function getContent() {
                var arr = [];
                arr.push(UE.getEditor('editor').getContent());
                alert(arr.join("\n"));
            }
            function getPlainTxt() {
                var arr = [];
                arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
                arr.push("内容为：");
                arr.push(UE.getEditor('editor').getPlainTxt());
                alert(arr.join('\n'));
            }

            function setContent(isAppendTo) {
                var arr = [];
                arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
                UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
                alert(arr.join("\n"));
            }

            function setDisabled() {
                UE.getEditor('editor').setDisabled('fullscreen');
                disableBtn("enable");
            }

            function setEnabled() {
                UE.getEditor('editor').setEnabled();
                enableBtn();
            }

            function getText() {
                //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                var range = UE.getEditor('editor').selection.getRange();
                range.select();
                var txt = UE.getEditor('editor').selection.getText();
                alert(txt)
            }


            function getLocalData () {
                alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
            }

            function clearLocalData () {
                UE.getEditor('editor').execCommand( "clearlocaldata" );
                alert("已清空草稿箱")
            }
        </script>

    </body>
</html>


