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
        <div class="p_10"> 
            <div class="vipcard_content">
                <div class="card" style="background-image:url(<?php echo ($config["background_url"]); ?>);">
                    <span class="card_name"><?php echo ($config["title"]); ?></span>
                    <!--<span class="card_num">卡号：<?php echo ($config["length"]); ?></span>-->
                    <div class="card_mask"></div>
                </div>
                <div class="card_info">
                    <div class="tb"><a href="<?php echo addons_url('Card://Card/writeCardInfo');?>" class="btn m_15 flex_1">点击领取会员卡</a></div>
                    <p class="m_15 gray_txt"><center>微信会员卡时代</center></p>
                    <div class="single_item m_15">
                        <a class="p_10 arrow_icon mr_10" href="<?php echo addons_url('Card://Card/introduction');?>" >会员卡使用说明</a>
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
    
</body>
<script type="text/javascript">
		if($('#select_background').val()==11){
			var cardBgUrl = $("#hidden_background_custom").val();
		}else{
			var cardBgUrl = '<?php echo ADDON_PUBLIC_PATH;?>/card_bg_'+$('#select_background').val()+".png";

		}	
		$('#cardBg').attr("href",cardBgUrl);
</script>
</html>