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
            

            
	<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
	<div class="main-title cf">
		<h2>
		<?php if($_GET['_action'] == 'add'): ?>新增
			<?php else: ?>
			编辑<?php endif; ?>友情连接</h2>
	</div>
	<!-- 表单 -->
	<form id="form" action="<?php echo addons_url('Links://Links/update');?>" method="post" class="form-horizontal">
		<!-- 基础文档模型 -->
		<div id="tab1" class="tab-pane in tab1">
			<div class="form-item cf">
				<label class="item-label">站点名称<span class="check-tips">（请输入友情连接站点名称）</span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="title" value="<?php echo ($info["title"]); ?>">
				</div>
			</div>
			<div class="form-item cf">
				<label class="item-label">外链地址<span class="check-tips">（请填写带http://的全路径）</span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="link" value="<?php echo ($info["link"]); ?>">
				</div>
			</div>
			<div class="form-item cf" id="type1">
				<label class="item-label">广告图片<span class="check-tips">（请上传广告图片）</span></label>
				<div class="controls">
					<input type="file" id="upload_picture_ptspic">
					<input type="hidden" name="cover_id" id="cover_id_ptspic" value="<?php echo ($info["cover_id"]); ?>"/>
					<div class="upload-img-box">
						<?php if(!empty($info['cover_id'])): ?><div class="upload-pre-item"><img src="<?php echo ($info["path"]); ?>"/>
							</div><?php endif; ?>
					</div>
				</div>
				<script type="text/javascript">
										//上传图片
					/* 初始化上传插件 */
					$("#upload_picture_ptspic").uploadify({
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
					$("#cover_id_ptspic").val(data.id);
					src = data.url || data.path
					$("#cover_id_ptspic").parent().find('.upload-img-box').html(
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
				</script>
			</div>
			<div class="form-item cf">
				<label class="item-label">站点描述<span class="check-tips"></span></label>
				<div class="controls">
					<textarea name="summary" rows="2" class="textarea input-large"><?php echo ($info["summary"]); ?></textarea>
				</div>
			</div>
			<div class="form-item cf">
				<label class="item-label">站长联系方式<span class="check-tips"></span></label>
				<div class="controls">
					<input type="text" class="text input-large" name="mailto" value="<?php echo ($info["mailto"]); ?>">
				</div>
			</div>
			<div class="form-item cf">
				<label class="item-label">nofollow设置<span class="check-tips"></span></label>
				<div class="controls">
					<label class="radio">
						<input type="radio" value="1" <?php if(($info['nofollow']) == "1"): ?>checked<?php endif; ?> <?php if($_GET['_action'] == 'add'): ?>checked<?php endif; ?> name="nofollow">
						跟踪</label>
					<label class="radio">
						<input type="radio" value="0" <?php if(($info['nofollow']) == "0"): ?>checked<?php endif; ?> name="nofollow">
						不跟踪</label>
				</div>
			</div>
			<div class="form-item cf">
				<label class="item-label">状态<span class="check-tips"></span></label>
				<div class="controls">
					<label class="radio">
						<input type="radio" value="1" <?php if(($info['status']) == "1"): ?>checked<?php endif; ?> <?php if($_GET['_action'] == 'add'): ?>checked<?php endif; ?> name="status">
						启用</label>
					<label class="radio">
						<input type="radio" value="0" <?php if(($info['status']) == "0"): ?>checked<?php endif; ?> name="status">
						禁用</label>
				</div>
			</div>
			<div class="form-item cf">
				<label class="item-label">分组类型<span class="check-tips"></span></label>
				<div class="controls">
					<select name="type">
						<?php if(is_array($group_type)): $i = 0; $__LIST__ = $group_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"  <?php if($key == $info['type']): ?>selected<?php endif; ?> ><?php echo ($so); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
			<div class="form-item cf">
				<label class="item-label">优先级</label>
				<div class="controls">
					<input type="text" class="text input-large" name="sort" value="<?php echo ($info["sort"]); ?>">
				</div>
			</div>
		</div>
		<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
		<div class="form-item cf">
			<input class="btn submit-btn hidden" type="submit" value="确 定" />
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