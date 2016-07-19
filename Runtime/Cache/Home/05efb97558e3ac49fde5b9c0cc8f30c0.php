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
    
<style type="text/css">
.money {
	width: 50px;
}
.specTable .param {
	display: none;
}
.specTable p {
	display: block;
	line-height: 50px;
}
.text-center {
	text-align: center;
}
.check-tips {
	color: #aaa;
	margin-left: 50px
}
</style>
<!-- 标签页导航 -->

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
      <?php $post_url || $post_url = U('edit?model='.$model['id'], $get_param); ?>
      <form class="form-horizontal form-center" method="post" action="<?php echo ($post_url); ?>" id="form">
        <div class="form-item cf toggle-title">
          <label class="item-label"> <span class="need_flag">*</span> 节日名 <span class="check-tips"> </span></label>
          <div class="controls">
            <input type="text" value="<?php echo ($data["title"]); ?>" name="title" class="text" placeholder="请填写活动名称">
          </div>
        </div> 
<!--         <div class="form-item cf"> -->
<!--           <label class="item-label"> 选择人群 </label> -->
<!--           <div class="controls"> -->
<!--             <select name="member"> -->
<!--               <option class="toggle-data" value="0"  <?php if(($data[member]) == "0"): ?>selected="selected"<?php endif; ?> >所有用户 </option> -->
<!--               <option class="toggle-data" value="-1"  <?php if(($data[member]) == "-1"): ?>selected="selected"<?php endif; ?> >所有会员卡成员 </option> -->
<!--               <?php if(is_array($card_level)): $i = 0; $__LIST__ = $card_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cl): $mod = ($i % 2 );++$i;?>-->
<!--               <option class="toggle-data" value="<?php echo ($cl["id"]); ?>"  <?php if(($data[member]) == $cl[id]): ?>selected="selected"<?php endif; ?> ><?php echo ($cl["level"]); ?> </option> -->
<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
<!--             </select> -->
<!--           </div> -->
<!--         </div>          -->

  <div class="form-item cf">
<label class="item-label"><span class="need_flag"></span>
                       适用人群<span class="check-tips"></span>
                </label>
                <div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="0" id="member_0" name="member[]" toggle-data=""
                 <?php if(in_array(0,$data['member']) || empty($data['member'])){echo ' checked="checked"';} ?>                   >
                        <label for="member_0"></label>所有用户 </div>
                        
                 <div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="-2" id="member_-2" name="member[]" toggle-data=""
                 <?php if(in_array('-2',$data['member'])){echo ' checked="checked"';} ?>                   >
                        <label for="member_-2"></label>女性用户 </div>
                        
                  <div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="-3" id="member_-3" name="member[]" toggle-data=""
                 <?php if(in_array('-3',$data['member'])){echo ' checked="checked"';} ?>                   >
                        <label for="member_-3"></label>男性用户 </div>
                        
                <div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="-1" id="member_-1" name="member[]" toggle-data=""
                           <?php if(in_array(-1,$data['member'])){echo ' checked="checked"';} ?>                        >
                        <label for="member_-1"></label>所有会员 </div>
                        
                <?php if(!empty($card_level)): if(is_array($card_level)): $i = 0; $__LIST__ = $card_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="<?php echo ($vo["id"]); ?>" id="member_<?php echo ($vo["id"]); ?>" name="member[]" toggle-data=""
                      <?php if(in_array($vo['id'],$data['member'])){echo ' checked="checked"';} ?>                                    >
                        <label for="member_<?php echo ($vo["id"]); ?>"></label>
                       <?php echo ($vo["level"]); ?> </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                             </div>
                             
                             
        <div class="form-item cf toggle-is_birthday">
          <label class="item-label"> 节日类型 <span class="check-tips">  </span></label>
          <div class="controls">
            <div class="check-item">
              <input type="radio" name="is_birthday" id="is_birthday_0" value="0" class="regular-radio choose_birthday" <?php if(intval($data[is_birthday])==0): ?>checked="checked"<?php endif; ?> >
              <label for="is_birthday_0"></label>
              公历节日 </div>
            <div class="check-item">
              <input type="radio" name="is_birthday" id="is_birthday_1" value="1" class="regular-radio choose_birthday" <?php if($data[is_birthday]==1): ?>checked="checked"<?php endif; ?> >
              <label for="is_birthday_1"></label>
              会员生日节日 </div>
          </div>
        </div>     
        <div class="form-item cf toggle-start_time" id="div_start_time" style="display:none">
          <label class="item-label"> <span class="need_flag">*</span> 节日日期 <span class="check-tips"> </span></label>
          <div class="controls">
            <input type="datetime" placeholder="请选择节日时间" value="<?php echo (time_format($data["start_time"],'Y-m-d')); ?>" class="text date" name="start_time">
          </div>          
        </div>
        <div class="form-item cf toggle-end_time">
          <label class="item-label"> <span class="need_flag">*</span> 赠送时间 <span class="check-tips"> </span></label>
          <div class="controls" id="div_end_time_0" style="display:none">
            <input type="datetime" placeholder="请选择赠送时间" value="<?php echo (time_format($data["end_time"])); ?>" class="text time" name="end_time">
          </div>
          <div class="controls" id="div_end_time_1" style="display:none">
            生日前 <input type="number"  value="<?php echo ((isset($data["before_day"]) && ($data["before_day"] !== ""))?($data["before_day"]):1); ?>" class="text money" name="before_day" style="padding:5px 10px; vertical-align:0;"> 天
          </div>
        </div>           
        <div class="form-item cf toggle-type">
          <label class="item-label"> 赠送类型 <span class="check-tips">  </span></label>
          <div class="controls">
            <div class="check-item">
              <input type="radio" name="type" id="type_0" value="0" class="regular-radio choose_type" <?php if(intval($data[type])==0): ?>checked="checked"<?php endif; ?> >
              <label for="type_0"></label>
              送积分 </div>
            <div class="check-item">
              <input type="radio" name="type" id="type_1" value="1" class="regular-radio choose_type" <?php if($data[type]==1): ?>checked="checked"<?php endif; ?> >
              <label for="type_1"></label>
              送优惠券 </div>
          </div>
        </div>
        <div class="form-item cf" id="score" style="display:none">
        <label class="item-label">  <span class="check-tips"> </span></label>
          <div class="controls">
            赠送 <input type="score" value="<?php echo ($data["score"]); ?>" name="score" class="text money"> 积分
          </div>
        </div>
        <div class="form-item cf" id="coupon_id" style="display:none">
        
          <div class="controls">
                    <select name="coupon_id">
                        <?php if(empty($shop_conpon_list)): ?><option selected="selected" value="0">你还未创建优惠券</option>
                          <?php else: ?>
                          <option value="0">请选择</option>
                          <?php if(is_array($shop_conpon_list)): $i = 0; $__LIST__ = $shop_conpon_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sc): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sc["id"]); ?>" <?php if($data[coupon_id]==$sc[id]): ?>selected="selected"<?php endif; ?> ><?php echo ($sc["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                      </select>
          </div>
        </div>   
        <div class="form-item cf">
          <label class="item-label"> 营销 <span class="check-tips"> </span></label>
          <div class="controls">
      	  <input type="checkbox" class="regular-checkbox" value="1" id="is_show_0" name="is_show" 
                              <?php if($data[is_show]==1): ?>checked="checked"<?php endif; ?> >
                              <label for="is_show_0"></label>在会员卡界面展示
                              
            <label class="textarea input-large" style="margin:10px 0 0">
              <textarea name="content" placeholder="请输入活动说明"><?php echo ($data[content]); ?></textarea>
            </label>
          </div>
        </div>             
        
        <div class="form-item cf">
          <label class="item-label">通知用户领取信息 <span class="check-tips" > </span></label>
          <div class="controls">
            <label class="textarea input-large" style="margin:10px 0 0">
              <textarea name="notice_mess" placeholder="请输入通知用户领取信息"><?php echo ($data[notice_mess]); ?></textarea>
            </label>
            <div id='notice_tip' style="border: 1px solid #94BDAA;padding: 15px;color: #A29E9E;background-color: aliceblue;" ></div>
          </div>
        </div> 
        
        <div class="form-item form_bh">
          <?php if(!empty($data["id"])): ?><input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"><?php endif; ?>
          <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal"><?php echo ((isset($submit_name) && ($submit_name !== ""))?($submit_name):'确 定'); ?></button>
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
  <script type="text/javascript" src="/php/weiphp3/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
  <script type="text/javascript" src="/php/weiphp3/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
  <script type="text/javascript">

function choose_birthday(){
	var val = $('input[name="is_birthday"]:checked').val();
	if(val==0){
		var strtip='通知信息默认为：{username}用户您好，今天是个特殊的日子（{title}），在此我们为您准备份小礼物，请到 会员卡-客户关怀 领取吧！(注：其中{username}代表用户名，{title}节日名称)';
		$('#notice_tip').text(strtip);
		$('#div_start_time').show();
		$('#div_end_time_0').show();
		$('#div_end_time_1').hide();
	}else{
		var strtip='通知信息默认为：{username}用户您好，再过{before_time}天就是您的破蛋日啦！<br/>我们在"{title}"活动中为您准备份小礼物，请到 会员卡-客户关怀 领取吧！(注：其中{username}代表用户名，{before_time}赠送时间，{title}节日名称)';
		$('#notice_tip').text(strtip);
		$('#div_start_time').hide();
		$('#div_end_time_0').hide();
		$('#div_end_time_1').show();
	}
}
function choose_type(){
	var val = $('input[name="type"]:checked').val();
	if(val==0){
		$('#score').show();
		$('#coupon_id').hide();
	}else{
		$('#score').hide();
		$('#coupon_id').show();
	}
}

  $('input[type=score]').keypress(function(e) {
    if (e.which==8) {
      $(this).val('');
    };

      if (!String.fromCharCode(e.which).match(/[0-9\.]/)) {
        return false;
      }
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
	
	$('.choose_type').bind('click',function(){ choose_type();	});
	choose_type();
	
	$('.choose_birthday').bind('click',function(){ choose_birthday();	});
	choose_birthday();	
});
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