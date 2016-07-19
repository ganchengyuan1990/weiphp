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
	  <div class="head_div">
      	<img src="<?php echo ADDON_PUBLIC_PATH;?>/h.png" width="100%"/>
         <?php if(!empty($service_info[headface_url])): ?><p class="title"><?php echo ($data["prize_title"]); ?></p> 
        <p class="info"> 
         	<img class="user_head" src="<?php echo (get_cover_url($service_info["headface_url"])); ?>"/> 
             <?php echo ($service_info["public_name"]); ?> 
         </p><?php endif; ?>
      </div>
      <div class="content">
            <img src="<?php echo (get_cover_url($data["prize_image"])); ?>"/>
            <p class="name"><?php echo ($data["prize_name"]); ?></p>
            <p class="remark"><strong>活动说明：</strong><br/><?php echo ($data["prize_conditions"]); ?></p>
			<a class="get_btn" href="<?php echo ($jumpurl); ?>">领取</a>
      </div>	
      <p class="copyright"><?php echo ($system_copy_right); ?></p>
</div> 
<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div> 
<script>
$.WeiPHP.initWxShare({
	title:"<?php echo ($data["prize_title"]); ?>",
	imgUrl:"<?php echo (get_cover_url($data["prize_image"])); ?>",
	desc:"<?php echo ($data["prize_conditions"]); ?>",
	link:window.location.href
})
</script>
</body>
</html>