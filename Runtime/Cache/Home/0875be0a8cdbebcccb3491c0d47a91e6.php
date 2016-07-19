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
	<div class="container body">
        <div class="p_10"> 
            <div class="vipcard_content">
                <div class="card geted">
                	<img src="<?php echo ($config["background_url"]); ?>" width="90%"/>
                    <span class="card_name"><?php echo ($config["title"]); ?></span>
                    <span class="card_num">卡号：<?php echo ($info["number"]); ?></span>
                </div>
                <div class="card_info get_card_info">
                    
                    <p class="m_15"><strong><center>使用时向服务员出示此卡</center></strong></p>
                    <!--<div class="single_item tb score_nav m_15">
                        <a class="p_10 flex_1 btl bbl" href="#">总积分<br/>100</a>
                        <a class="p_10 flex_1" href="#">签到积分<br/>50</a>
                        <a class="p_10 flex_1 btr bbr" href="#">消费积分<br/>50</a>
                    </div>-->
                    <div class="single_item m_15">
                        <a class="p_10 arrow_icon mr_10" href="<?php echo addons_url ( 'Card://notice/show' );?>">最新通知<!--<span class="tip_count">1</span>--></a>
<!--                        <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="#" target="_blank">会员卡特权<span class="tip_count">13</span></a>-->
                        <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="<?php echo addons_url ( 'Card://coupons/show' );?>">会员优惠券<!--<span class="tip_count">123</span>--></a>
 <!--                       <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="#" target="_blank">积分礼品兑换<span class="tip_count">1</span></a>-->
                    </div>
                    <!--<div class="single_item m_15">
                        <a class="p_10 arrow_icon mr_10" href="#" target="_blank">签到赚积分<span class="tip_count_yellow">今日未签到</span></a>
                        <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="#" target="_blank">个人资料</a>
                       
                    </div>-->
                    <div class="single_item m_15">
                        <a class="p_10 arrow_icon mr_10" href="<?php echo addons_url('Card://Card/introduction');?>" >会员卡使用说明</a>
                         <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="<?php echo addons_url ( 'Card://Card/writeCardInfo' );?>">个人资料</a>
<!--                        <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/storeList');?>" target="_blank">适用门店电话及地址</a>-->
                    </div>
                    <div class="single_item m_15">
                        <a class="p_10 arrow_icon mr_10" href="http://api.map.baidu.com/marker?location=31.308707,121.523804&title=<?php echo ($config["address"]); ?>&name=<?php echo ($config["address"]); ?>&content=<?php echo ($config["address"]); ?>&output=html&src=weiphp">地址：<?php echo ($config["address"]); ?></a>
                        <div class="single_item_line"></div>
                        <a class="p_10 arrow_icon mr_10" href="tel:13155333122">电话：<?php echo ($config["phone"]); ?></a>
                    </div>
                    
                </div>
            </div>
        </div>
        <p class="copyright">WeiPHP 版权所有</p>
    </div>
    <nav class="bottom_nav">
        <a class="icon_card cur" href="<?php echo addons_url('Card://Card/showCard');?>">会员卡</a>
    <!--        <a class="icon_crown" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/introduction');?>">特权</a>-->
        <a class="icon_time" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
        <a class="icon_tag" href="<?php echo addons_url('Card://coupons/show');?>">优惠券</a>
    <!--        <a class="icon_gift" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/exchange');?>">兑换</a>
        <a class="icon_time" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/score');?>">签到</a>-->
    </nav>
    <div class="bottom_nav_blank"></div>
</body>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>
</html>