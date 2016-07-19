<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/php/weiphp3/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript">
		//静态变量
		var SITE_URL = "<?php echo SITE_URL;?>";
		var IMG_PATH = "/php/weiphp3/Public/Home/images";
		var STATIC_PATH = "/php/weiphp3/Public/static";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <script type="text/javascript" src="/php/weiphp3/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="minify.php?f=/php/weiphp3/Public/Home/js/prefixfree.min.js,/php/weiphp3/Public/Home/js/m/dialog.js,/php/weiphp3/Public/Home/js/m/flipsnap.min.js,/php/weiphp3/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>	
<link href="<?php echo ADDON_PUBLIC_PATH;?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://yaotv.qq.com/shake_tv/include/js/jsapi_subscribe.js"></script>
<body>
	<div id="container" class="container">
    	<!--<img src="<?php echo ADDON_PUBLIC_PATH;?>/finish.jpg" width="100%"/>-->
     <div class="startContent" style="margin:10px 20px;">
        <div class="questionContent" style="text-align:center; margin:40px 0; color:#888">
        	<img src="/php/weiphp3/Public/Home/images/blank_pic.png" width="100"/>
        	<div class="lead_over">不好意思，您没有抢到题目</div>
        	<div class="lead_over" id="msg1">请等待<span id="left_time"><?php echo ($time_left); ?></span>秒后再参与摇一摇重新抢答</div>
        	<div class="lead_over" id="msg2" style="display:none">请摇一摇重新抢答</div>
        </div>
        <?php foreach($ask['appidArr'] as $id=>$val) { ?>
        <div class="btnWrap">
        	<a href="javascript:;" onClick="subscribe('<?php echo ($id); ?>');" class="start_btn" ><?php echo ($val); ?></a>
        </div>
        <?php } ?>
        <center>
            <a href="javascript:;" onClick="closepage();" style="color:#444">返回微信</a>
        </center>       
        <p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>
        
    </div>
</div>
<script type="text/javascript">
function subscribe(appid){
	shaketv.subscribe(appid, function(returnData){
		  alert(returnData.errorCode + ":" + returnData.errorMsg);
	});	
}
function closepage(){
	WeixinJSBridge.call('closeWindow');
}
var reSentTime = parseInt(<?php echo ($time_left); ?>);
function show_time(){ 
	if(reSentTime > 0){ 
		--reSentTime; 
		$('#msg1').show();
		$('#msg2').hide();
		$('#left_time').html(reSentTime);
		setTimeout("show_time()", 1000); //设置1000毫秒以后执行一次本函数
	}else{
		$('#msg1').hide();
		$('#msg2').show();
	}
};
$(function(){
  show_time();	
});
</script>
</body>
</html>