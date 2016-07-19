<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/php/weiphp3/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/php/weiphp3/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/php/weiphp3/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/php/weiphp3/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/php/weiphp3/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/php/weiphp3/Public/Home/images";
var  STATIC = "/php/weiphp3/Public/static";
var  ROOT = "/php/weiphp3";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
var  UPLOAD_DIALOG_URL = "<?php echo U('home/File/uploadDialog',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if(!empty($userInfo[website_logo])): ?><img height="52" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/php/weiphp3/Public/Home/images/logo.png"/><?php endif; ?>
       </a>
        <?php if(is_login()): ?><div class="switch_mp">
            	<?php if(!empty($public_info["public_name"])): ?><a href="#"><?php echo ($public_info["public_name"]); ?><b class="pl_5 fa fa-sort-down"></b></a><?php endif; ?>
                <ul>
                <?php if(is_array($myPublics)): $i = 0; $__LIST__ = $myPublics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/index/main', array('publicid'=>$vo[mp_id]));?>"><?php echo ($vo["public_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
      <?php $index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' ); $index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME ); ?>
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                            <?php elseif($index_2 == 'home/public/*' or $index_3 == 'home/user/profile' or $index_2 == 'home/publiclink/*' or $index_3 == 'home/user/bind_login'): ?>
                    		
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($myinfo[headimgurl])): ?><img class="admin_head url" src="<?php echo ($myinfo["headimgurl"]); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head default" src="/php/weiphp3/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort($myinfo["nickname"],4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                               <?php if($mid==C('USER_ADMINISTRATOR')): ?><li><a href="<?php echo U ('Admin/Index/Index');?>" target="_blank">后台管理</a></li><?php endif; ?>
                            	<li><a href="<?php echo U ('Home/Public/lists');?>">公众号列表</a></li>
                                <li><a href="<?php echo U ('Home/Public/add');?>">账号配置</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php  if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>4))); } ?>
<div id="main-container" class="admin_container">
  <?php if(!empty($core_side_menu)): ?><div class="sidebar">
      <ul class="sidenav">
        <li>
          <?php if(!empty($now_top_menu_name)): ?><a class="sidenav_parent" href="javascript:;"> 
            <!--<img src="/php/weiphp3/Public/Home/images/left_icon_<?php echo ($core_side_category["left_icon"]); ?>.png"/>--> 
            <?php echo ($now_top_menu_name); ?></a><?php endif; ?>
          <ul class="sidenav_sub">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
        <?php if(!empty($addonList)): ?><li> <a class="sidenav_parent" href="javascript:;"> <img src="/php/weiphp3/Public/Home/images/ico1.png"/> 其它功能</a>
            <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> <i class="icon-chevron-right">
                  <?php if(!empty($vo['icon'])) { ?>
                  <img src="<?php echo ($vo["icon"]); ?>" />
                  <?php } ?>
                  </i> <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </li><?php endif; ?>
      </ul>
    </div><?php endif; ?>
  <div class="main_body">
    
  <div class="span9 page_message">
  <section id="contents"> <ul class="tab-nav nav">
  <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  
  <?php if (defined ( '_ADDONS' )) { $page = _ADDONS . '_' . _CONTROLLER . '_' . _ACTION; } else { $page = MODULE_NAME . '_' . CONTROLLER_NAME . '_' . ACTION_NAME; } $url = 'http://help.weiphp.cn/index.php?s=/Home/Help/index/page/' . strtolower($page); ?>
  <span class="fr" style="margin:10px;"><a target="_blank" href="<?php echo ($url); ?>"><b style="font-size:16px;" class="fa fa-question-circle"></b>查看配置教程</a></span>
</ul>
<?php if(!empty($sub_nav)): ?><div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav)): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div><?php endif; ?>
<?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p><?php endif; ?>
    <div class="tab-content"> 
      <!-- 表单 -->
      <h4>添加优惠券</h4>
      <?php $post_url || $post_url = U('add?model='.$model['id'], $get_param); ?>
      <form id="form" action="<?php echo ($post_url); ?>" method="post" class="form-horizontal" style="overflow:hidden">
           <div class="fl" style="width:500px;">
            <div class="controls">
                <label class="item-label"><span class="need_flag">*</span>
                       优惠劵标题<span class="check-tips"></span>
                </label>
                <input type="text" name="title" class="text input-large" />
            </div>
            <!--
            <div class="controls">
                <label class="item-label"><span class="need_flag">*</span>
                       商家名称<span class="check-tips"></span>
                </label>
                <input type="text" name="shop_name" class="text input-large" />
            </div>
            -->
            <!--
            <div class="controls">
                <label class="item-label">
                       商家LOGO<span class="check-tips"></span>
                </label>
                <div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="shop_logo">
                  <input type="file" id="upload_picture_shop_logo">
                  <input type="hidden" name="shop_logo" id="cover_id_shop_logo"/>
                  <div class="upload-img-box" id="cover_id_shop_logo_img" style="display:none">
                  		 <img src=""  width="100" height="100"/>
                    	<em class="edit_img_icon">&nbsp;</em>
                 </div>
                  
                  
                  <script type="text/javascript">
						//上传图片
						/* 初始化上传插件 */
						$("#upload_picture_shop_logo").uploadify({
							"height"          : 100,
							"swf"             : STATIC+"/uploadify/uploadify.swf",
							"fileObjName"     : "download",
							"buttonText"      : "上传图片",
							"uploader"        : UPLOAD_PICTURE,
							"width"           : 100,
							'removeTimeout'	  : 1,
							'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
							"onUploadSuccess" : uploadPictureshop_logo
						});
						function uploadPictureshop_logo(file, data){
							console.log(data);
							var data = $.parseJSON(data);
							var src = '';
							if(data.status){										
								src = data.url || ROOT + data.path;
								$('#cover_id_shop_logo_img').show().find('img').attr('src',src);
								$('input[name="shop_logo"]').val(data.id);
								$(window.frames["wxIframe"].document).find(".seller img").attr('src',src).show();;
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
                
            </div>
            -->
            <div class="controls">
                <label class="item-label">
                       优惠券图片<span class="check-tips">建议图片宽度640px，高300px</span>
                </label>
                <div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="background">
                  <input type="file" id="upload_picture_background">
                  <input type="hidden" name="background" id="cover_id_background"/>
                   <div class="upload-img-box" id="cover_id_background_img" style="display:none">
                   	    <img src=""  width="100" height="100"/>
                    	<em class="edit_img_icon">&nbsp;</em>
                  </div>
                  <script type="text/javascript">
						//上传图片
						/* 初始化上传插件 */
						$("#upload_picture_background").uploadify({
							"height"          : 100,
							"swf"             : STATIC+"/uploadify/uploadify.swf",
							"fileObjName"     : "download",
							"buttonText"      : "上传图片",
							"uploader"        : UPLOAD_PICTURE,
							"width"           : 100,
							'removeTimeout'	  : 1,
							'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
							"onUploadSuccess" : uploadPicturebackground
						});
						function uploadPicturebackground(file, data){
							var data = $.parseJSON(data);
							var src = '';
							if(data.status){										
								src = data.url || ROOT + data.path;
								$('#cover_id_background_img').show().find('img').attr('src',src);
								$('input[name="background"]').val(data.id);
								$(window.frames["wxIframe"].document).find(".head_pic").attr('src',src).show();;
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
            </div>
            <!--
            <div class="controls">
                <label class="item-label">
                       优惠头部背景颜色<span class="check-tips"></span>
                </label>
                <div class="colorPicker" style="width:100px; height:100px;background:#35a2dd" onClick="simpleColorPicker(this,bgColorChange)">
                		<input name="head_bg_color" value="#35a2dd" type="hidden" />
                </div>
            </div>
             <div class="controls">
                <label class="item-label">
                       按钮颜色<span class="check-tips"></span>
                </label>
                <div class="colorPicker" style="width:100px; height:100px;background:#0dbd02" onClick="simpleColorPicker(this,buttonColorChange)">
                		<input name="button_color" value="#0dbd02" type="hidden" />
                </div>
            </div>
            -->
            <div class="controls">
                <label class="item-label"><span class="need_flag">*</span>
                       优惠券数量<span class="check-tips"></span>
                </label>
                <input type="text" name="num" class="text input-large" />
            </div>
            
            
 <div class="controls">
<label class="item-label"><span class="need_flag"></span>
                       适用人群<span class="check-tips"></span>
                </label>
                <div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="0" id="member_0" name="member[]" toggle-data=""
                              
                 checked="checked"                   >
                        <label for="member_0"></label>所有用户 </div>
                <div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="-1" id="member_-1" name="member[]" toggle-data=""
                              
                           <?php if(in_array(-1,$data['member'])){echo ' checked="checked"';} ?>                        >
                        <label for="member_-1"></label>所有会员 </div>
                <?php if(!empty($level)): if(is_array($level)): $i = 0; $__LIST__ = $level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="<?php echo ($key); ?>" id="member_<?php echo ($key); ?>" name="member[]" toggle-data=""
                      <?php if(in_array($key,$data['member'])){echo ' checked="checked"';} ?>                                    >
                        <label for="member_<?php echo ($key); ?>"></label>
                       <?php echo ($vo); ?> </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                             </div>
          
            
            
            
<!--             <div class="controls"> -->
<!--                 <label class="item-label"> -->
<!--                        每人最多领取<span class="check-tips">（0表示无限制）</span> -->
<!--                 </label> -->
<!--                 <input type="text" name="max_num" class="text input-large" /> -->
<!--             </div> -->
            <div class="controls">
                <label class="item-label"><span class="need_flag">*</span>
                       领取时间<span class="check-tips"></span>
                </label>
                <input style="width:175px" type="datetime" name="start_time" class="text time" value="" placeholder="请选择时间" />
                到
                <input style="width:175px"  type="datetime" name="end_time" class="text time" value="" placeholder="请选择时间" />
            </div>
            <div class="controls">
                <label class="item-label"><span class="need_flag">*</span>
                       优惠券使用有效期<span class="check-tips"></span>
                </label>
                <input style="width:175px" type="datetime" name="use_start_time" class="text time" value="" placeholder="请选择时间" />
                到
                <input style="width:175px"  type="datetime" name="over_time" class="text time" value="" placeholder="请选择时间" />
            </div>
<!--            <div class="controls">
                <label class="item-label">
                       核销密码<span class="check-tips">提供给商家用于用户消费时核销</span>
                </label>
                <input type="text" name="pay_password" class="text input-large" />
            </div>-->
            <!---
            <div class="controls">
                <label class="item-label">
                       更多按钮<span class="check-tips">格式：按钮名称|按钮跳转地址，每行一个。如：查看官网|http://weiphp.cn</span>
                </label>
                <textarea name="more_button" style="width:405px; height:100px;"></textarea>
            </div>
            -->
            <div class="controls">
                <label class="item-label">
                       <a href="javascript:;" class="border-btn" onClick="chooseAddress();">添加适用门店</a><span class="check-tips"></span>
                </label>
                <table id="shopList" class="form_table" cellpadding="0" cellspacing="1" style="display:none">
                	<thead>
                        <tr>
                            <td>名称</td>
                            <td>地址</td>
                            <td>操作</td>
                        </tr>
                    </thead>
                    <tbody>
                    	
                    </tbody>
                </table>
            </div>
            <div class="controls">
                <label class="item-label"><span class="need_flag">*</span>
                       优惠券详情
                </label>
                <textarea name="use_tips" style="width:405px; height:200px;"></textarea>
                <?php echo hook('adminArticleEdit', array('name'=>'use_tips','value'=>''));?> 
            </div>
             
             
             
          </div> 
            
        	
    
      
<!--           <div class="fl" style="width:400px; display:none"> -->
<!--                 <div class="wx-header"><span>优惠券</span></div> -->
<!--                 手机端页面 -->
<!--                 <div id="container" class="wx-container"> -->
<!--                       <iframe name="wxIframe" frameborder="0" scrolling="no" width="320" height="560" src="<?php echo addons_url('Coupon://Coupon/package',array('is_edit'=>1));?>"></iframe> -->
<!--                 	  <div class="frame_layer"></div> -->
<!--                 </div> -->
<!--                 手机端上页面结束 -->
<!--           </div> -->
      
      </div>
      <div class="form-item form_bh" style="text-align:center">
          <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">提交</button>
      </div>
    </form>
    
    </div>
  </section>
  </div>

  </div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/php/weiphp3", //当前网站地址
		"APP"    : "/php/weiphp3/index.php?s=", //当前项目地址
		"PUBLIC" : "/php/weiphp3/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

	
    <link href="/php/weiphp3/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
   <?php if(C('COLOR_STYLE')=='blue_color') echo '
   <link href="/php/weiphp3/Public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/php/weiphp3/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/php/weiphp3/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script> 
  <script type="text/javascript" src="/php/weiphp3/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
  <script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });	
	showTab();
	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;		
		
	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});
	
	$('select').change(function(){
		$('.toggle-data').each(function(){
			var data = $(this).attr('toggle-data');
			if(data=='') return true;		
			
			 if($(this).is(":selected") || $(this).is(":checked")){
				 change_event(this)
			 }
		});
	});
	//编辑页面预览
	$('input[name="title"]').keyup(function(){
		var val = $(this).val();
		$(window.frames["wxIframe"].document).find("#title").text(val);
	})
	$('input[name="shop_name"]').keyup(function(){
		var val = $(this).val();
		$(window.frames["wxIframe"].document).find(".name").text(val);
	})
// 	$('input[name="use_start_time"]').on('changeDate', function(ev){
// 		$(window.frames["wxIframe"].document).find(".use_start_time").text($(this).val());
// 	});
// 	$('input[name="over_time"]').on('changeDate', function(ev){
// 		$(window.frames["wxIframe"].document).find(".over_time").text($(this).val());
// 	});
});
function buttonColorChange(color){
	//$(window.frames["wxIframe"].document).find(".start_btn").css('background-color',color);
}
function bgColorChange(color){
	//$(window.frames["wxIframe"].document).find(".head_hd").css('background-color',color);
	//$(window.frames["wxIframe"].document).find(".head_pic").hide();	
	$('input[name="background"]').val("");
}
//添加地址
var addnewShopUrl = "<?php echo addons_url('Coupon://Shop/add?model=coupon_shop');?>";
function chooseAddress(){
	var $shopHtml = $('<div class="chooseShopDialog"><ul><center><img src="/php/weiphp3/Public/Home/images/loading.gif"/></center></ul><br/><a href="javascript:;" id="addNewShopBtn" class="border-btn">增加新门店</a><div class="m15"><a href="javascript:;" class="btn" id="confirmBtn">确定</a></div></div>');
	$.Dialog.open("添加适用门店",{width:600,height:500},$shopHtml);
	$('#addNewShopBtn',$shopHtml).click(function(){
		window.open(addnewShopUrl);
		$.Dialog.close();
	})
	var ids = [];
	$('.shop_tr').each(function(index, element) {
        var _id = $(this).find('input').val();
		ids[index] = _id;
    });
	$.ajax({
		url:"<?php echo addons_url('Coupon://Shop/list_data',array('p'=>1));?>",
		data:{},
		dataType:'JSON',
		success:function(data){
			var html = "";
			var list_data = data.list_data;
			if(list_data && list_data.length>0){
				for(var i=0;i<list_data.length;i++){
					//console.log(list_data[i].name)
					var id = list_data[i].id;
					var name = list_data[i].name;
					var address = list_data[i].address;
					//console.log(ids)
					//console.log(id)
					if(ids.indexOf(id)!=-1){
						html += '<li><input type="checkbox" checked="true" class="shop_id" value="'+id+'"/><span class="name">'+name+'</span><span class="address">'+address+'</span></li>';
					}else{
						html += '<li><input type="checkbox" class="shop_id" value="'+id+'"/><span class="name">'+name+'</span><span class="address">'+address+'</span></li>';
					}
				}
				if(html!=""){
					$('ul',$shopHtml).html(html);
					$('#shopList').show();
				}
			}else{
				$('ul',$shopHtml).html("<center>你没有添加任何门店</center>");
			}
		}
	})
	$('#confirmBtn',$shopHtml).click(function(){
		var selectHtml = "";
		var count = 0;
		var prevLiHtml = "";
		$('li',$shopHtml).each(function(index, element) {
			if($(this).find('.shop_id').prop("checked")==true){
				count++;
				var id = $(this).find('.shop_id').val();
				var name = $(this).find('.name').text();
				var address = $(this).find('.address').text();
				selectHtml += '<tr class="shop_tr">'+
								'<td><input type="hidden" name="shop_id[]" value="'+id+'"/>'+name+'</td>'+
								'<td>'+address+'</td>'+
								'<td><a href="javascript:;" onclick="removeSingleAddress(this)">删除</a></td>'+
							'</tr>';
				prevLiHtml = '<li class="item single_address">'+
                        '<span class="title">'+name+'</span><br/>'+
                         '<a href="#">'+address+'</a>'+
                        '<a href="#"><em>&nbsp;</em></a>'+
                    '</li>';
			}
        });
		$('#shopList tbody').html(selectHtml);
		//$(window.frames["wxIframe"].document).find(".v_nav .item").eq(0).siblings().remove();
		if(count==1){
			//$(window.frames["wxIframe"].document).find(".v_nav").append(prevLiHtml);
		}else if(count>1){
			var prevHtml = '<a class="item" href="#">适用门店<em>&nbsp;</em></a>';
			//$(window.frames["wxIframe"].document).find(".v_nav").append(prevHtml);
		}
		$.Dialog.close();
	})
	
}
function removeSingleAddress(_this){
	$(_this).parents('tr').remove();
	if($('.shop_tr').size()==0){
		//$(window.frames["wxIframe"].document).find(".v_nav .item").eq(0).siblings().remove();
	}
}
</script> 
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div style='display:none'><?php echo ($tongji_code); ?></div>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>