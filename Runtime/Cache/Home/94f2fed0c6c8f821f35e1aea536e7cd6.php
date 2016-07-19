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
<link href="<?php echo ($assetsPath); ?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div class="container">
	<img src="<?php echo ($assetsPath); ?>/head.jpg" width="100%"/>
    <div class="wish">
    	<p class="receive"><?php echo ($data["receive_name"]); ?>:</p>
        <p class="content">
        	<?php echo ($data["content"]); ?>
        </p>
        <p class="send">——来自<?php echo ($data["send_name"]); ?></p>
    </div>
    <?php if($isMake == 0): ?><a class="btn" href="<?php echo ($makeUrl); ?>">我也要制作</a>
    <?php else: ?>
    	<a class="btn" href="javascript:;" onClick="$.WeiPHP.showShareTips();">发送给朋友</a><?php endif; ?>
    <p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>
</div>
</body>
<script type="text/javascript">
$('.container').css('min-height',$(window).height());
wx.ready(function(){
	var shareData = {
			title: '<?php echo ($data["send_name"]); ?>给你发了贺卡', // 分享标题
			desc: '<?php echo ($data["content"]); ?>', // 分享描述
			link: '<?php echo ($shareUrl); ?>', // 分享链接
			imgUrl: "<?php echo ($assetsPath); ?>/head.jpg", // 分享图标
			type: 'link', // 分享类型,music、video或link，不填默认为link
			dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			success: function () { 
				// 用户确认分享后执行的回调函数
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		}
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareTimeline(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
});
</script>
</html>