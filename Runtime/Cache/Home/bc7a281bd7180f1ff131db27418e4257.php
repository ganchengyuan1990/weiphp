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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/index.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div id="container" class="container">
	   <div class="head_hd" style="background:<?php echo ($info["head_bg_color"]); ?> url(<?php echo (get_cover_url($info["background"])); ?>); background-size:100% auto;">
          
         <p class="title">
          	<?php echo ($info["title"]); ?><br/>
          	<span class="time">有效期：<span class="use_start_time"><?php echo (time_format($info["use_start_time"])); ?></span> - <span class="over_time"><?php echo (time_format($info["over_time"])); ?></span></span> 
          </p>
          <div class="line"></div>
      </div>
      
      
     
         <div class="v_nav">
            <a class="item" href="<?php echo addons_url('Coupon://Wap/coupon_detail',array('id'=>$info[id]));?>">优惠券详情<em>&nbsp;</em></a>
            <?php if(!empty($shop_list)): if(count($shop_list) != 1): ?><a class="item" href="<?php echo addons_url('Coupon://Wap/store_list',array('id'=>$info[id]));?>">适用门店<em>&nbsp;</em></a>
            <?php else: ?>
            	<?php if(is_array($shop_list)): $i = 0; $__LIST__ = $shop_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="item single_address">
                        <span class="title"><?php echo ($vo["name"]); ?></span>
		 				<span style="padding-left: 8px;">营业时间：<?php echo ($vo["open_time"]); ?></span>
		                <br/>
                         <?php if(!empty($$vo[gps])): ?><a href="http://api.map.baidu.com/marker?location=<?php echo ($vo["gps"]); ?>&title=<?php echo ($vo["name"]); ?>&content=<?php echo ($vo["address"]); ?>&output=html"><?php echo ($vo["address"]); ?></a>
                        <?php else: ?>
                        	<a href="http://api.map.baidu.com/geocoder?address=<?php echo ($vo["address"]); ?>&output=html&src=<?php echo ($vo["name"]); ?>|<?php echo ($vo["address"]); ?>"><?php echo ($vo["address"]); ?></a><?php endif; ?>
                        <a href="tel:<?php echo ($vo["phone"]); ?>"><em>&nbsp;</em></a>
                    </li><?php endforeach; endif; else: echo "" ;endif; endif; endif; ?>
         </div>
         
         <div class="btnWrap">
    	<a href="<?php echo ($jumpURL); ?>" class="start_btn" style="background:<?php echo ($info["button_color"]); ?>"> 
        	领取优惠券
        </a> 
        <?php if(!empty($info[more_button_arr])): if(is_array($info[more_button_arr])): $i = 0; $__LIST__ = $info[more_button_arr];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($key); ?>"  class="start_btn" style="background:<?php echo ($info["button_color"]); ?>"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
     </div>
     
     <p class="copyright"><?php echo ($system_copy_right); ?></p>
	</div>
    <!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
    <script type="text/javascript">
    	$.WeiPHP.initWxShare({
			title:"<?php echo ($info["title"]); ?>",
			imgUrl:"<?php echo (get_cover_url($info["shop_logo"])); ?>",
			desc:"<?php echo ($info["shop_name"]); ?>",
			link:window.location.href
		})
    </script>
</body>
</html>