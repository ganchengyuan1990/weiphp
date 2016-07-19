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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/card.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">

<body>
	<div id="container" class="container body">
    	<h5 class="page_title top_line">优惠券</h5>
    	<ul class="toggle_list" style="margin-top:50px">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="single_item m_15 p_10">
            	<div class="title icon_arrow_right">
                	<img width="30" class="fl mr_10" src="/php/weiphp3/Public/Home/images/m/pic_quan.png"/>
                	<p>
                    	<strong><?php echo ($vo["title"]); ?></strong><br/>
                    </p>
                    <p style="padding-left:40px; line-height:16px;">
                    	<span class="colorless">开始时间：<?php echo (time_format($vo["start_date"])); ?></span><br/>
                        <span class="colorless">结束时间：<?php echo (time_format($vo["end_date"])); ?></span>
                    </p>
                </div>
                <div class="content">
                	<p><?php echo (htmlspecialchars_decode($vo["content"])); ?></p>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>            
        </ul>
        <?php if(empty($list)): ?><div class="empty_default">
            	<p><img src="<?php echo ADDON_PUBLIC_PATH;?>/vip_card_gray.png"/><br/>会员卡目前还没优惠券~</p>
            </div><?php endif; ?>
        <p class="copyright">WeiPHP 版权所有</p>
        <nav class="bottom_nav">
            <a class="icon_card" href="<?php echo addons_url('Card://Card/showCard');?>">会员卡</a>
        <!--        <a class="icon_crown" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/introduction');?>">特权</a>-->
            <a class="icon_time" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
            <a class="icon_tag cur" href="<?php echo addons_url('Card://coupons/show');?>">优惠券</a>
        <!--        <a class="icon_gift" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/exchange');?>">兑换</a>
            <a class="icon_time" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/score');?>">签到</a>-->
        </nav>     
        <div class="bottom_nav_blank"></div>       
    </div>
</body>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>
</html>