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
<link href="<?php echo CUSTOM_TEMPLATE_PATH;?>Index/ColorV4/main.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<style>
body{
	background:#eee url(<?php echo ($config["background"]); ?>) no-repeat; background-size:100% 100%
}
</style>
<body id="weisite" >
<div class="container">
    <?php if(!empty($slideshow)): ?><section class="banner" id="banner">
    	<ul>
        <?php if(is_array($slideshow)): $i = 0; $__LIST__ = $slideshow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            	<a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["img"]); ?>"/></a>
            	<span class="title"><?php echo ($vo["title"]); ?></span>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <span class="identify">
        <?php if(is_array($slideshow)): $i = 0; $__LIST__ = $slideshow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><em></em><?php endforeach; endif; else: echo "" ;endif; ?>        
        </span>
    </section><?php endif; ?>
    <div class="mainbg" style="background:#7ABDE9;">
<!--  	<img src="<?php echo ($config["background"]); ?>" /> -->
    <?php if(is_array($config["background_arr"])): $i = 0; $__LIST__ = $config["background_arr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><input type='hidden' id='bg_<?php echo ($key); ?>' value="<?php echo (get_cover_url($so)); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
    <?php if(!empty($category)): ?><section>
    	<div class="icon_lists">
            <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="item" href="<?php echo ($vo["url"]); ?>">
                    <span class="icon"><img src="<?php echo ($vo["icon"]); ?>"/></span>
                    <span class="click_item_txt"><?php echo ($vo["title"]); ?></span>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </section><?php endif; ?>
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
<script type="text/javascript">
$(function(){
    $.WeiPHP.initBanner('#banner',true,5000);
	var h=$(window).height();
	$('#weisite').css('min-height',h);
})

</script>
<script type="text/javascript">
$(function(){
	var count = $('.mainbg input').length;
	var i=0;
	 var imgurl='';
	 setInterval(function(){
		imgurl=$('#bg_'+i).val();
// 		 $('.mainbg img').attr('src', imgurl).fadeTo('3000',1);
		$('#weisite').css('background-image',"url("+imgurl+")");
		 i++;
		 if(i==count){
			 i=0;
		 }
	 },3500);
});

wx.ready(function(){
    var shareData = {
            title: '悦慢咖啡', // 分享标题
            desc: '咖啡与工匠精神', // 分享描述
            link: "<?php echo U( 'index',array('token'=>get_token()));?>", //分享的链接地址
            imgUrl: "<?php echo SITE_URL;?>/Addons/Card/View/default/Public/umind.png", // 分享图标
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