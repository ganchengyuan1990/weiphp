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
<body>
	<div id="container" class="container">
    	<div class="head_hd">
            <?php if(!empty($ask["cover"])): ?><img src="<?php echo (get_cover_url($ask["cover"])); ?>" width="100%">
            <?php else: ?>
                <img src="head_pic.jpg" width="100%"><?php endif; ?>
         </div>
         <div class="btnWrap" style="margin:0 50px;">
            <a href="<?php echo U('ask','ask_id='.$ask[id]);?>" class="start_btn"> <?php echo ($button_name); ?></a>
         </div>
         <div class="content">
             <h4><?php echo ($ask["title"]); ?></h4>
             <div class="detail_desc"><?php echo ($ask["content"]); ?></div>
         </div>
         <div class="content">
             <h4>商家地址：</h4>
             <div class="detail_desc">
             <?php if(is_array($ask["shop_address_arr"])): $i = 0; $__LIST__ = $ask["shop_address_arr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
         </div>
         
         <p class="copyright"><?php echo ($system_copy_right); ?></p>
     
     
    	
    </div>
    <!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
</body>
</html>
<script>
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {  
	// 分享到朋友圈
	WeixinJSBridge.on('menu:share:timeline', function (argv) {
	WeixinJSBridge.invoke('shareTimeline', {
		"img_url": "<?php echo (get_cover_url($ask["cover"])); ?>",
		"img_width": "640",
		"img_height": "640",
		"link": "<?php echo addons_url('Ask://Ask/ask', $get_param);?>",
		"desc": "<?php echo ($ask["intro"]); ?>",
		"title": "<?php echo ($ask["title"]); ?>"
	}, 
	function (res) {
	//分享到朋友圈成功
	if(res.err_msg=="share_timeline:ok"){
		//$.post("<?php echo U('share','id='.I('id').'&fromuid='.$fromuid);?>",function(e){alert(e);window.location.reload();});
	}
	   });
	});
	WeixinJSBridge.on('menu:share:appmessage', function (argv) {
	WeixinJSBridge.invoke('sendAppMessage', { 
		"img_url": "<?php echo (get_cover_url($ask["cover"])); ?>",
		"img_width": "640",
		"img_height": "640",
		"link": "<?php echo addons_url('Ask://Ask/ask', $get_param);?>",
		"desc": "<?php echo ($ask["intro"]); ?>",
		"title": "<?php echo ($ask["title"]); ?>"
		},
	function (res) {
	//分享给好友成功
	if(res.err_msg=="send_app_msg:ok"){
		   //$.post("<?php echo U('share','id='.I('id').'&fromuid='.$fromuid);?>",function(e){alert(e);window.location.reload();});
	}
	  })
	});
}, false);
</script>