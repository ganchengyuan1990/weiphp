<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>悦慢欢迎您</title>
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
        var WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
        var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
        var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
    </script>
    <script type="text/javascript" src="/php/weiphp3/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript" src="minify.php?f=/php/weiphp3/Public/Home/js/prefixfree.min.js,/php/weiphp3/Public/Home/js/m/dialog.js,/php/weiphp3/Public/Home/js/m/flipsnap.min.js,/php/weiphp3/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>
<link href="<?php echo CUSTOM_TEMPLATE_PATH;?>Detail/V2/detail.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body id="weisite">
<div class="container">
	<div class="detail">
    	<h6 class="title"><?php echo ($info["title"]); ?></h6>
        <p class="info">
        	<span class="colorless"><?php echo (time_format($info["cTime"])); ?>
        	</span>
        	</span>
        </p>
        <section class="content">
                <?php if(!empty($info["cover"])): ?><p><img src="<?php echo (get_cover_url($info["cover"])); ?>"/></p><?php endif; ?>
                <?php echo (htmlspecialchars_decode($info["content"])); ?>
        </section>
    </div>
</div>
<!-- 底部导航 -->
<?php echo ($footer_html); ?>
<!-- 统计代码 -->
<?php if(!empty($config["code"])): ?><p class="hide bdtongji">
<?php echo ($config["code"]); ?>
</p>
<?php else: ?>
<p class="hide bdtongji">
<?php echo ($tongji_code); ?>
</p><?php endif; ?>
</body>
<script>
	wx.ready(function(){
    var shareData = {
            title: '<?php echo ($info["title"]); ?>', // 分享标题
            desc: '从前慢，现在悦慢', // 分享描述
            link: "<?php echo U( 'addon/WeiSite/WeiSite/detail/id/5', array('token'=>get_token()));?>", //分享的链接地址
            imgUrl: "<?php echo (get_cover_url($info["cover"])); ?>", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () { 
                //分享送积分
                //add_credit();
                $.post("<?php echo U('do_share');?>",function(d){
                    if(d!=0){
                        alert("恭喜，分享朋友圈得积分1分！");
                        window.location.reload();
                    }
                    
                });
            },
            cancel: function () { 
            }
    }
    wx.onMenuShareAppMessage(shareData);
    wx.onMenuShareTimeline(shareData);
    wx.onMenuShareQQ(shareData);
    wx.onMenuShareWeibo(shareData);
});
</script>
</html>