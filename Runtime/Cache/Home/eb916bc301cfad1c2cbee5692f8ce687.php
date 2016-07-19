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
<style>
.card_get_error{
	position: absolute;
    left: 5%;
    right: 5%;
    top: 15px;
    bottom: 0;
    z-index: 1000;
    border-radius: 8px;
    color: #fff;
    padding-top: 125px;
    font-size: 14px;
    text-align: center;
}
</style>
<body>
	<div class="container body">
    	<div class="card">
        	<img class="card_bg" src="<?php echo ($config["background_url"]); ?>"/>
            <div class="card_container">
                <p class="logo"><?php if(($config["show_logo"]) == "1"): ?><img src="<?php echo (get_cover_url($config["logo"])); ?>"/><?php endif; ?></p>
                <p class="card_name" style="color:<?php echo ($config["title_color"]); ?>"><?php echo ($config["title"]); ?></p>
                <?php if(empty($is_error)): ?><p class="card_number" style="color:<?php echo ($config["number_color"]); ?>"><small>体验卡号</small><br/><?php echo ($card_info["number"]); ?></p><?php endif; ?>
            </div>
            <?php if(empty($is_error)): ?><div class="card_get_mark">填写会员资料，即可升级会员卡！</div><?php else: ?><div class="card_get_error"><?php echo ($is_error); ?></div><?php endif; ?>
        </div>
        <div class="m_15">
        	<div class="write_tips_content">
            	<h6><?php echo ($info["title"]); ?></h6>
                <!-- 开卡寄送提示语  -->
           		<p><?php echo ($info["content"]); ?></p>
            </div>
            <?php if(empty($is_error)): ?><a class="btn" href="<?php echo addons_url('Card://Wap/writeCardInfo');?>">完善会员资料</a><?php else: ?><a class="btn" href="<?php echo addons_url('Card://Wap/index');?>">返回</a><?php endif; ?>
        </div>
        
        <p class="copyright"><?php echo ($system_copy_right); ?></p>
    </div>
    
</body>
<script type="text/javascript">
	  var is_error="<?php echo ($is_error); ?>";
	  if(is_error){
		$('.card_get_mark').css('background_image','');  
	  }
	  
		if($('#select_background').val()==11){
			var cardBgUrl = $("#hidden_background_custom").val();
		}else{
			var cardBgUrl = '<?php echo ADDON_PUBLIC_PATH;?>/card_bg_'+$('#select_background').val()+".png";

		}	
		$('#cardBg').attr("href",cardBgUrl);
		
		wx.ready(function(){
			wx.hideAllNonBaseMenuItem();
		})
</script>
</html>