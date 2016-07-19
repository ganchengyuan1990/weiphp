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
<script type="text/javascript" src="/php/weiphp3/Public/static/qrcode/qrcode.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/qrcode/jquery.qrcode.js"></script>
<link href="<?php echo ADDON_PUBLIC_PATH;?>/Coupon.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div id="container" class="container">
	  <div class="head_hd" style="background:<?php echo ($data["head_bg_color"]); ?> url(<?php echo (get_cover_url($data["background"])); ?>); background-size:100% auto;">
          
         <p class="title">
          	<?php echo ($data["title"]); ?><br/>
          	<span class="time">有效期：<span class="use_start_time"><?php echo (time_format($data["use_start_time"])); ?></span> - <span class="over_time"><?php echo (time_format($data["over_time"])); ?></span></span> 
          </p>
          <div class="line"></div>
      </div>
      
      <div class="sn_box">
          
                        <div id="usedStatus" style='display: <?php if(($sn["is_use"]) == "0"): ?>none<?php endif; ?>;'> 
                        <img src="/php/weiphp3/Public/Home/images/blank_pic.png" width="100"/>
                        <P class="used">优惠券已使用</P>
                        </div>
                        
                      <div id="unusedStatus" style='display: <?php if(($sn["is_use"]) == "1"): ?>none<?php endif; ?> '>
                      恭喜，您已经获得奖品：<?php echo ($info["prize_title"]); ?><br/>
                      <div id="qrCode">SN码：<?php echo ($sn["sn"]); ?></div>
                      <p class="qr_time_tips"></p>
                      <script type="text/javascript">
                      var textLink = "<?php echo U('do_pay',array('sn_id'=>$sn['id'],'publicid'=>$public_info['id']));?>";
                      $('#qrCode').qrcode({width:150,height:150,text:textLink,refresh:true,time:30000}); 
                      </script>
                      <div id="qrCode">SN码：<?php echo ($sn["sn"]); ?></div>
                      <p class="qr_tips">将本页面展示给商家即可使用</p>
                      </div>
     </div>
     
         <div class="v_nav">
            <a class="item" href="<?php echo addons_url('Coupon://Wap/coupon_detail',array('id'=>$data[id]));?>">优惠券详情<em>&nbsp;</em></a>
            <?php if(!empty($shop_list)): if(count($shop_list) != 1): ?><a class="item" href="<?php echo addons_url('Coupon://Wap/store_list',array('id'=>$data[id]));?>">适用门店<em>&nbsp;</em></a>
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
     
     
     
     <div class="wx_page btnWrap">
     	<a href="<?php echo addons_url('Coupon://Wap/personal');?>" class="start_btn">查看全部优惠券</a>
     </div>
     
     <p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>
</div>

<script type="text/javascript">   
function closepage(){
	WeixinJSBridge.call('closeWindow');
}
var isUsed= '<?php echo ($sn["is_use"]); ?>';
$(function(){
	if(isUsed==0){
	var timer = setInterval(function(){
		$.post("<?php echo addons_url('Coupon://Wap/get_sn_status');?>",{ sn_id:"<?php echo ($sn["id"]); ?>"},function(data){
			if(data==1){
				$('#usedStatus').show();
				$('#unusedStatus').hide();
				clearInterval(timer)
			}
		})
	},2000);
	}
})
</script>
</body>
</html>