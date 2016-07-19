<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>慢城会员中心</title>
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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/card.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">

<body>
	<div class="container body">
    	<div class="card" onClick="zoomCard();">
        	<img class="card_bg" src="<?php echo ($config["background_url"]); ?>"/>
            <div class="card_container">
                <p class="logo"><?php if(($config["show_logo"]) == "1"): ?><img src="<?php echo (get_cover_url($config["logo"])); ?>"/><?php endif; ?></p>
                <p class="card_name" style="color:<?php echo ($config["title_color"]); ?>"><?php echo ($config["title"]); ?></p>
                <p class="card_number" style="color:<?php echo ($config["number_color"]); ?>"><small>会员卡号</small><br/><?php echo ($info["number"]); ?></p>
            </div>
        </div>
        <div class="zoom_card_container" style="display:none">
        	<a href="javascript:;" onClick="closeZoomCard();" class="close"></a>
            <div class="zoom_card_front_container">
                <div class="card zoom_card" onClick="turnCard();" style="background:none">
                    <img class="card_bg" src="<?php echo ($config["background_url"]); ?>"/>
                    <div class="card_container">
                        <p class="logo"><?php if(($config["show_logo"]) == "1"): ?><img src="<?php echo (get_cover_url($config["logo"])); ?>"/><?php endif; ?></p>
                        <p class="card_name" style="color:<?php echo ($config["title_color"]); ?>"><?php echo ($config["title"]); ?></p>
                        <p class="card_number" style="color:<?php echo ($config["number_color"]); ?>"><small>会员卡号</small><br/><?php echo ($info["number"]); ?></p>
                    </div>
                </div>
            </div>
            <div class="zoom_card_back_container">
                <div class="card zoom_card_back" onClick="turnBackCard();" style="background:none">
                    <img class="card_bg" src="<?php echo ($config["back_background_url"]); ?>"/>
                    <div class="card_container" style="color:<?php echo ($config["back_color"]); ?>">
                    	<div class="back_content">
                            <p class="use_title" >使用说明</p>
                            <p class="use_content">
                            <?php $config['instruction']=str_replace(chr(10), '<br/>', $config['instruction']); echo $config['instruction']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="zoom_card_tips">点击会员卡可放大</p>
         <div style="margin:10px 5%;">
        	<a class="btn" href="javascript:;" onClick="$('.pay_dialog').show();">付款</a>
         </div>
         <div class="h_item_container" style="margin-top:15px;">
            <a class="h_item" href="<?php echo U('privilege');?>"><img width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/vip.png"/> 会员卡特权<em></em></a>
            <div class="h_item_line"></div>
            <!-- <a class="h_item" href="<?php echo addons_url('Coupon://Wap/lists');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/ticket.png"/> 领取优惠券<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo addons_url('ShopCoupon://Wap/lists');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/money_ticket.png"/> 领取代金券<em></em></a> -->
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo U('score_exchange');?>"><img style="vertical-align: -7px;" width="20" src="<?php echo ADDON_PUBLIC_PATH;?>/gift.png"/>&nbsp;&nbsp;积分兑换<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo addons_url('Card://Wap/score_rule');?>" ><img style="vertical-align: -5px;" width="22" src="<?php echo ADDON_PUBLIC_PATH;?>/score_method_gray.png"/>&nbsp;&nbsp;积分规则<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo addons_url('Card://Wap/introduction');?>" ><img style="vertical-align: -5px;" width="22" src="<?php echo ADDON_PUBLIC_PATH;?>/intro.png"/>&nbsp;&nbsp;会员卡使用说明<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo U( 'writeCardInfo');?>&edit=1"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/setting_icon.png"/> 完善会员卡资料 <em></em></a>
            <div class="h_item_line"></div>
<!--             <a class="h_item" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/bindCard');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/setting_icon.png"/> 绑定已有实体卡 <em></em></a> -->
<!--              <div class="h_item_line"></div> -->
             <a class="h_item" href="<?php echo U( 'custom_privilege');?>&edit=1"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/cake.png"/> 客户关怀 <em></em></a>
             <div class="h_item_line"></div>
             <a class="h_item" href="<?php echo addons_url ( 'Card://notice/show' );?>"><img style="vertical-align: -3px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/notice.png"/> 最新通知 
             <?php if(!empty($notice_num)): ?><span class="red_circle"><?php echo ($notice_num); ?></span><?php endif; ?>
             <em></em></a>
         </div>
         
         <div class="h_item_container">
         	<?php if(!empty($shop)): ?><a class="h_item" href="tel:<?php echo ($shop["mobile"]); ?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/phone_s.png"/> <?php echo ($shop["mobile"]); ?><em>&nbsp;</em></a>
            <div class="h_item_line"></div>
            <?php if(!empty($shop["gps"])): ?><a class="h_item" href="http://apis.map.qq.com/tools/poimarker?marker=coord:<?php echo ($shop["gps"]); ?>;title:<?php echo ($shop["title"]); ?>;addr:<?php echo ($shop["address"]); ?>&referer=myapp&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/location.png"/> <?php echo ($shop["address"]); ?><em></em></a>
            
            <?php else: ?>
            <a class="h_item" href="http://api.map.baidu.com/geocoder?address=<?php echo ($shop["address"]); ?>&output=html&src=<?php echo ($shop["title"]); ?>|<?php echo ($shop["address"]); ?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/location.png"/> <?php echo ($shop["address"]); ?><em></em></a><?php endif; ?>
            <div class="h_item_line"></div><?php endif; ?>
           <!--  <a class="h_item" href="<?php echo addons_url($_REQUEST ['_addons'].'://'.$_REQUEST ['_controller'].'/storeList');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/map.png"/> 适用门店<em></em></a>-->
        </div>
        
        <p class="copyright"><?php echo ($system_copy_right); ?></p>
    </div>
    <nav class="bottom_nav">
        <a class="icon_me_gray" href="<?php echo addons_url('Card://Wap/me');?>">我的</a>
        <!-- <a class="icon_card_gray" href="<?php echo addons_url('Card://Wap/index');?>">会员卡</a>-->
        <a class="icon_notice_gray" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
        <a class="icon_share_gray" href="<?php echo addons_url('Card://Wap/share');?>">积分</a>
        <a class="icon_signin_gray" href="<?php echo addons_url('Card://Wap/signin');?>">签到</a>
    </nav>
    <div class="bottom_nav_blank"></div>
    <!-- 付款 -->
    <div class="pay_dialog" style="display:none">
    	<form action="">
        	<div class="form-item cf">
                <div class="controls">
                  
                  <select name='branch_id'>
                        <option value='0'>商户总店</option>
                        <?php if(!empty($shops)): if(is_array($shops)): $k = 0; $__LIST__ = $shops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><option value='<?php echo ($k); ?>'><?php echo ($v); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                 </div>
           </div>
           <div class="form-item cf">
                <div class="controls">
                  <select  maxlength="30" name="coupon_id">
                  	<option value="0">请选择所需优惠券</option>
                     	<?php if(!empty($coupon)): if(is_array($coupon)): $i = 0; $__LIST__ = $coupon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($key); ?>'><?php echo ($v["target_name"]); ?> (￥<?php echo ($v["prize_title"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                  </select>
                 </div>
           </div>
           <div class="form-item cf">
                <div class="controls">
                  <select maxlength="30" name="pay_type">
                  	<option value="0">请选择支付方式</option>
                  	<option value='1'>会员卡余额消费</option>
                    <option value='2'>现金或POS机消费</option>
                  </select>
                 </div>
           </div>
           <div class="form-item cf">
                <div class="controls">
                  <input type="number" maxlength="30" placeholder="消费金额(元)" class="text input-large" name="pay">
                </div>
           </div>
            <div class="form-item cf">
                <div class="controls">
                  <input type="password" maxlength="30" placeholder="商家密码确认" class="text input-large" name="pay_password">
                </div>
           </div>
           <div class="tb">
           		<input type="hidden" maxlength="30" class="text input-large" name="member_id" value='<?php echo ($info["id"]); ?>'>
               
           		<a onClick="submitPay()" href="javascript:;" class="flex_1 btn mr_10">提交</a>
           		<a onClick="$('.pay_dialog').hide();" href="javascript:;" class="flex_1 btn gray_btn">取消</a>
           </div>
        </form>
    </div>
    
</body>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
function zoomCard(){
	$('.zoom_card_container').show();
	$('.zoom_card').addClass('zoom_card_do');
	$('.zoom_card_back').addClass('zoom_card_back_do');
}
function closeZoomCard(){
	$('.zoom_card').removeClass('zoom_card_do').removeClass('turn_card');
	$('.zoom_card_back').removeClass('turn_card_back').removeClass('zoom_card_back_do');
	$('.zoom_card_front_container').css('z-index','10002');
	$('.zoom_card_back_container').css('z-index','10001');
	$('.zoom_card_container').fadeOut();
	
}
function turnCard(){
	$('.zoom_card').addClass('turn_card');
	$('.zoom_card_back').addClass('turn_card_back');
	$('.zoom_card_front_container').css('z-index','10001');
	$('.zoom_card_back_container').css('z-index','10002');
}
function turnBackCard(){
	$('.zoom_card').removeClass('turn_card');
	$('.zoom_card_back').removeClass('turn_card_back');
	$('.zoom_card_front_container').css('z-index','10002');
	$('.zoom_card_back_container').css('z-index','10001');
}
function submitPay(){
	var shop = $('select[name="branch_id"]').val();
	var type = $('select[name="pay_type"]').val();
	var coupon = $('select[name="coupon_id"]').val();
	var price = $('input[name="price"]').val();
	var password = $('input[name="password"]').val();
	if(type==0){
		$.Dialog.fail('请选择支付类型');
		return;
	}
	if(price==""){
		$.Dialog.fail('请填写消费金额');
		return;
	}
	if(password==""){
		$.Dialog.fail('请填写密码');
		return;
	}
	$.Dialog.loading('支付中...');
	$.post('<?php echo U("do_buy");?>',$('form').serializeArray(),function(data){
		if(data.status==1){
			$.Dialog.success(data.info);
			setTimeout(function(){
				$('.pay_dialog').hide();
				window.location.reload();
			},1500)
		}else{
			$.Dialog.fail(data.info);
		}
	});
}
</script>
</html>