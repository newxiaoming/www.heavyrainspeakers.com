<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
	<!--引入CSS-->
	<link rel="stylesheet" type="text/css" href="/Public/static/webuploader/webuploader.css">
	<!--引入JS-->
	<script type="text/javascript" src="/Public/static/webuploader/webuploader.js"></script>
	<!-- <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script> -->

	<div class="main-title cf">
		<h2><?php if($_GET['_action'] == 'add'): ?>新增<?php else: ?>编辑<?php endif; ?>幻灯片</h2>
	</div>

	<!-- 表单 -->
	<form id="form" action="<?php echo addons_url('Silder://Silder/update');?>" method="post" class="form-horizontal">
		
		<div class="form-item cf">
			<label class="item-label">幻灯片中文标题<span class="check-tips"></span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="title" value="<?php echo ($info['title']); ?>">
			</div>
		</div>
		<div class="form-item cf">
			<label class="item-label">幻灯片英文标题<span class="check-tips"></span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="title_en" value="<?php echo ($info['title_en']); ?>">
			</div>
		</div>

		<div class="form-item cf" id="type1" >
			<!-- <label class="item-label">图片<span class="check-tips">（请上传幻灯片图片）</span></label>
            <div class="controls">
				<input type="file" id="upload_picture_advspic">
				<input type="hidden" name="silderpic" id="cover_id_silderpic" value="<?php echo ($info['silderpic']); ?>"/>
				<div class="upload-img-box">
					<?php if(!empty($info['silderpic'])): ?><div class="upload-pre-item"><img src="<?php echo ($info["path"]); ?>"/></div><?php endif; ?>
				</div>
			</div> -->
			<div id="uploader-demo controls">
				<div id="fileList" class="uploader-list"></div>
				<div id="filePicker">选择图片</div>
				
				<input type="hidden" name="silderpic" id="cover_id_silderpic" value="<?php echo ($info['silderpic']); ?>"/>
				<div class="upload-img-box">
				<?php if(!empty($info['silderpic'])): ?><div class="upload-pre-item"><img src="<?php echo ($info["path"]); ?>"/></div><?php endif; ?>
				</div>
			</div>
			<script type="text/javascript">
				var src = '';

				// 初始化Web Uploader
				var uploader = WebUploader.create({

					// 选完文件后，是否自动上传。
					auto: true,

					// swf文件路径
					swf: '/Public/static/webuploader/Uploader.swf',

					// 文件接收服务端。
					server: "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",

					// 选择文件的按钮。可选。
					// 内部根据当前运行是创建，可能是input元素，也可能是flash.
					pick: '#filePicker',
					fileVal : "download",

					// 只允许选择图片文件。
					accept: {
						title: 'Images',
						extensions: 'gif,jpg,jpeg,bmp,png',
						mimeTypes: 'image/*'
					}
				});
				
				// 当有文件添加进来的时候
				
				// 文件上传成功，给item添加成功class, 用样式标记上传成功。
				uploader.on( 'uploadSuccess', function( file ) {
					$( '#'+file.id ).addClass('upload-state-done');
				});

				// 文件上传失败，显示上传出错。
				uploader.on( 'uploadError', function( file ) {
					var $li = $( '#'+file.id ),
						$error = $li.find('div.error');

					// 避免重复创建
					if ( !$error.length ) {
						$error = $('<div class="error"></div>').appendTo( $li );
					}

					$error.text('上传失败');
				});

				// 完成上传完了，成功或者失败，先删除进度条。
				uploader.on( 'uploadComplete', function( file ) {
					$( '#'+file.id ).find('.progress').remove();
				});
				uploader.on( 'uploadSuccess', function( file,response ) {
					console.log(response.id);
					$("#cover_id_silderpic").val(response.id);
					src = response.url || '' + response.path
					console.log(src);
					$("#cover_id_silderpic").parent().find('.upload-img-box').html(
							'<div class="upload-pre-item"><img src="' + src + '"/></div>'
					);
				}); 
			</script>
			<!-- <script type="text/javascript">
			//上传图片
		    /* 初始化上传插件 */
			$("#upload_picture_advspic").uploadify({
		        "height"          : 30,
		        "swf"             : "/Public/static/uploadify/uploadify.swf",
		        "fileObjName"     : "download",
		        "buttonText"      : "上传图片",
		        "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
		        "width"           : 120,
		        'removeTimeout'	  : 1,
		        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
		        "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>,
		        'onFallback' : function() {
		            alert('未检测到兼容版本的Flash.');
		        }
		    });
			function uploadPicture<?php echo ($field["name"]); ?>(file, data){
		    	var data = $.parseJSON(data);
		    	var src = '';
		        if(data.status){
		        	$("#cover_id_silderpic").val(data.id);
		        	src = data.url || data.path
		        	$("#cover_id_silderpic").parent().find('.upload-img-box').html(
		        		'<div class="upload-pre-item"><img src="' + src + '"/></div>'
		        	);
		        } else {
		        	updateAlert(data.info);
		        	setTimeout(function(){
		                $('#top-alert').find('button').click();
		                $(that).removeClass('disabled').prop('disabled',false);
		            },1500);
		        }
		    }
			</script> -->
		</div>

		<div class="form-item cf">
			<label class="item-label">说明(中文)<span class="check-tips"></span></label>
			<div class="controls">
				<textarea rows="3" cols="54" name="sildertext"><?php echo ($info["sildertext"]); ?></textarea>
			</div>
		</div>
		<div class="form-item cf">
			<label class="item-label">说明(英文)<span class="check-tips"></span></label>
			<div class="controls">
				<textarea rows="3" cols="54" name="sildertext_en"><?php echo ($info["sildertext_en"]); ?></textarea>
			</div>
		</div>

		<div class="form-item cf">
				<label class="item-label">详细描述<span class="check-tips">（将显示在图片下方）</span></label>
				<div class="controls">
					<textarea rows="3" cols="54" name="content"><?php echo ($info["content"]); ?></textarea>
				</div> 
			</div>

		<div class="form-item cf">
			<label class="item-label">链接<span class="check-tips">（点击图片后跳转）</span></label>
			<div class="controls">
				<input type="text" class="text input-large" name="jumplink" value="<?php echo ($info["jumplink"]); ?>">
			</div>
		</div>

		<div class="form-item cf">
			<label class="item-label">跳转<span class="check-tips">（链接的打开方式）</span></label>
			<div class="controls">
				<?php if($info["jumptype"] == 2): ?><label class="radio"><input type="radio" value="1" name="jumptype">当前页</label>
	        		<label class="radio"><input type="radio" value="2" name="jumptype"checked>新标签</label>
				<?php else: ?>
					<label class="radio"><input type="radio" value="1" name="jumptype" checked>当前页</label>
	        		<label class="radio"><input type="radio" value="2" name="jumptype">新标签</label><?php endif; ?>
	           
			</div>
		</div>

		<div class="form-item cf">
			<label class="item-label">优先级<span class="check-tips">（数字0-9，0的优先级最高）</span></label>
			<div class="controls">
				<?php if($info["priorityr"] != ''): ?><input type="text" class="text input-large" name="priorityr" maxlength="1" value="<?php echo ($info["priorityr"]); ?>">
				<?php else: ?>
				<input type="text" class="text input-large" name="priorityr" maxlength="1" value="0"><?php endif; ?>
			</div>
		</div>

		<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>

		<div class="form-item cf">
			<button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
			<input class="btn btn-return" type="reset" value="重置" />
		</div>

	</form>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
</body>
</html>