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


<body>
	<div id="container" class="container body">
        <?php if(!empty($list)): ?><div class="conpons_list">
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="conpon_item" href="<?php echo addons_url('Coupon://Wap/index',array('id'=>$vo['id']));?>">
                 
                  <div class="coupon_head" 
                  	 style="<?php if(!empty($vo[background])): ?>background:url(<?php echo (get_cover_url($vo["background"])); ?>) no-repeat; background-size:100% auto;<?php else: ?>background:url(<?php echo ADDON_PUBLIC_PATH;?>/cover_pic.jpg) no-repeat; background-size:100% auto;<?php endif; ?>    min-height: 220px;
    max-height: 250px;
    overflow: hidden;"
                    >
                  		
                        
                        <div class="line"></div>
                        
                  </div>
                  <div class="coupon_bottom">
                  		<p class="title" style="position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    padding: 10px 0 20px;
    text-align: center;
    font-size: 24px;
    color: #fff;
    background: RGBA(0,0,0,.3);"><?php echo ($vo["title"]); ?>
                        <span class="colorless">
                        有效期至:
                                <?php if(!empty($vo["over_time"])): echo (time_format($vo["over_time"])); endif; ?>
                        </span>
                      </p>
                  </div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?> 
        </div><?php endif; ?>
        <?php if(empty($list)): ?><div class="empty_default">
            <br/><br/><br/><br/>
            	<img src="/php/weiphp3/Public/Home/images/empty_content.png" width="100"/>
                <br/>
                目前还发放优惠券~</p>
            </div><?php endif; ?>
        <else>
          <div class="btnWrap">
            <a href="http://jasongan.cn/php/weiphp3/index.php?s=/addon/Coupon/Wap/set_sn_code/id/1/publicid/1.html" class="start_btn" style="background:#0dbd02;     border-radius: 5px;
    background: #0dbd02;
    display: block;
    margin: 20px 15px 20px;
    padding: 13px 0;
    text-align: center;
    color: #fff;
    font-size: 16px;"> 
                领取优惠券
            </a> 
             </div>
        </else>
        <p class="copyright"><?php echo ($system_copy_right); ?></p>
                
    </div>
    <nav class="bottom_nav">
    <a class="icon_me_gray" href="<?php echo addons_url('Card://Wap/me');?>">我的</a>
    <a class="icon_card_gray" href="<?php echo addons_url('Card://Wap/index');?>">会员卡</a>
    <a class="icon_notice_gray" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
    <a class="icon_share_gray" href="<?php echo addons_url('Card://Wap/share');?>">分享</a>
    <a class="icon_signin_gray" href="<?php echo addons_url('Card://Wap/signin');?>">签到</a>
</nav>
<div class="bottom_nav_blank"></div>
    <!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
</body>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>
</html>