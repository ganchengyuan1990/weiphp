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
  <div class="container">
            <div class="signin_top">
                    <span class="signin_left">
                      <span class="signin_col"> <?php echo ($user["score"]); ?></span><br/>         
                      可用积分
                    </span>
                    <a class="signintop_mid" onClick="doShare()">
                             分享
                    </a>
                    <span class="signintop_right" style=" visibility:hidden">
                    可用积分
                    </span>         
            </div>
 
           <div class="i_nav">
                    <a href="<?php echo U('score_exchange');?>">
                               <img src="<?php echo ADDON_PUBLIC_PATH;?>/gift_white.png" width="26">
                               <br>
                               兑换礼品
                    </a>
                    <span class="i_line"></span>
                    <a href="<?php echo U('score_method');?>">
                                 <img src="<?php echo ADDON_PUBLIC_PATH;?>/score_method.png" width="26">
                                 <br>
                                 积分攻略
                    </a>
           </div> 
           <!--
   			<div class="h_item_container">
            	<a class="h_item" href="<?php echo U('day_recommend');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/star.png"/> 每日推荐<em></em></a>
            </div>
           -->
       
        
        
        <nav class="bottom_nav">
            <a class="icon_me_gray" href="<?php echo addons_url('Card://Wap/me');?>">我的</a>
            <a class="icon_card_gray" href="<?php echo addons_url('Card://Wap/index');?>">会员卡</a>
            <a class="icon_notice_gray" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
            <!--<a class="icon_ticket_gray" href="<?php echo addons_url('Card://coupons/show');?>">优惠券</a>-->
            <a class="icon_share_blue cur" href="<?php echo addons_url('Card://Wap/share');?>">分享</a>
            <a class="icon_signin_gray" href="<?php echo addons_url('Card://Wap/signin');?>">签到</a>
        </nav>
        <div class="bottom_nav_blank"></div>
  </div>
<script type="text/javascript">
function doShare(){
	$.WeiPHP.showShareTips();
}
wx.ready(function(){
	var shareData = {
			title: '会员卡', // 分享标题
			desc: '<?php echo ($config["title"]); ?>', // 分享描述
			link: "<?php echo U( 'index',array('token'=>get_token()));?>", //分享的链接地址
			imgUrl: "<?php echo SITE_URL;?>/Addons/Card/View/default/Public/cover_pic.png", // 分享图标
			type: 'link', // 分享类型,music、video或link，不填默认为link
			dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			success: function () { 
				// 用户确认分享后执行的回调函数
				$('.shareTips').remove();
				//分享送积分
				//add_credit();
				$.post("<?php echo U('do_share');?>",function(d){
					if(d!=0){
						window.location.reload();
					}
					
				});
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
				$('.shareTips').remove();
			}
	}
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareTimeline(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
});
</script>
</body>
</html>