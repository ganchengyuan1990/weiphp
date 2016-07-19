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
    	<div class="my_card" style="background:url(<?php echo ($config["background_url"]); ?>) no-repeat -10px -10px; background-size:120% 120%;">
        	<img class="head" src="<?php echo ($userInfo["headimgurl"]); ?>"/>
            <p class="name"><?php echo ($userInfo["nickname"]); ?></p>
            <p class="level"><a href="<?php echo U('level_intro');?>"><img src="<?php echo ADDON_PUBLIC_PATH;?>/king.png" width="16"/> <?php if(!empty($levelInfo[level])): echo ($levelInfo["level"]); else: ?>体验卡<?php endif; ?></a></p>
            <div class="my_card_nav">
            	<a href="<?php echo addons_url('Coupon://Wap/personal');?>&use=1">优惠券<br/><?php echo ($coupon_count); ?></a>
                <a disabled='ture'>代金券<br/><?php echo ($shop_coupon_count); ?></a>
              <!--  <a href="<?php echo addons_url('Card://Wap/score');?>">积分<br/><?php echo ($userInfo["score"]); ?></a>-->
                <a disabled='ture'>积分<br/><?php echo ($userInfo["score"]); ?></a>
                <a href="<?php echo addons_url('Card://Wap/recharge');?>">余额<br/><?php echo ($info["recharge"]); ?></a>
            </div>
            <a class="edit_icon" href="<?php echo U('writeCardInfo');?>&edit=1"></a>
        </div>
         <div class="h_item_container">
         <!--    <a class="h_item" href="<?php echo addons_url('Coupon://Wap/personal');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/ticket.png"/> 我的优惠券 <span class="colorless">(<?php echo ($coupon_count); ?>)</span><em></em></a>
            <div class="h_item_line"></div>
             <a class="h_item" href="<?php echo addons_url('ShopCoupon://Wap/personal');?>"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/money_ticket.png"/> 我的代金券 <span class="colorless">(<?php echo ($shop_coupon_count); ?>)</span><em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo addons_url('Coupon://Wap/personal');?>"><img style="vertical-align: -6px;" width="18" src="<?php echo ADDON_PUBLIC_PATH;?>/gift.png"/>&nbsp;&nbsp;我的礼品券 <span class="colorless">(<?php echo (intval($couponCount)); ?>)</span><em></em></a> 
<div class="h_item_line"></div>-->
            <a class="h_item" href="<?php echo U('privilege');?>"><img width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/vip.png"/> 会员卡特权<em></em></a>
            <div class="h_item_line"></div>
           <!--  <a class="h_item" href="<?php echo addons_url('Card://Wap/recharge');?>" ><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/money.png"/> 我的账单<em></em></a>-->
            <a class="h_item" href="<?php echo addons_url('Card://Wap/score_rule');?>" ><img style="vertical-align: -5px;" width="22" src="<?php echo ADDON_PUBLIC_PATH;?>/score_method_gray.png"/>&nbsp;&nbsp;积分规则<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo U('score_exchange');?>"><img style="vertical-align: -7px;" width="20" src="<?php echo ADDON_PUBLIC_PATH;?>/gift.png"/>&nbsp;&nbsp;积分兑换<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo addons_url('Card://Wap/introduction');?>" ><img style="vertical-align: -5px;" width="22" src="<?php echo ADDON_PUBLIC_PATH;?>/intro.png"/>&nbsp;&nbsp;会员卡使用说明<em></em></a>
            <div class="h_item_line"></div>
            <a class="h_item" href="<?php echo U( 'writeCardInfo');?>&edit=1"><img style="vertical-align: -5px;" width="24" src="<?php echo ADDON_PUBLIC_PATH;?>/setting_icon.png"/> 完善会员卡资料 <em></em></a>



            
        </div>

        <div class="card" onClick="zoomCard();" style="background:none;">
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



          	<?php if(empty($info["is_bind"])): ?><div class="h_item_container" style="display:none;">
      
        	 <p style="color: darkgray;">（若已是实体店会员，可点击 绑定实体店会员卡）</p>
                 <div class="form-item pt_10">
                	<button class="home_btn submit-btn mb_10 flex_1 yellow_btn" type="button" id='bind_card' >绑定实体店会员卡</button>
                 </div>
        	
<!--         	<a style="padding-right:10px;" class="h_item" href="<?php echo U('writeCardInfo');?>&edit=1"><img style="vertical-align: -5px;" width="12" src="<?php echo ADDON_PUBLIC_PATH;?>/phone_1.png"/>   <?php echo ($info["phone"]); ?> <span class="btn fr" style="display:inline; width:auto; height:14px; line-height:14px; padding:4px 10px;">绑定新号码</span></a> -->
        </div><?php endif; ?>
        <p class="copyright" style="display:none;"><?php echo ($system_copy_right); ?></p>
    </div>
    <nav class="bottom_nav">
        <a class="icon_me_blue cur" href="<?php echo addons_url('Card://Wap/me');?>">我的</a>
        <!-- <a class="icon_card_gray" href="<?php echo addons_url('Card://Wap/index');?>">会员卡</a>-->
        <a class="icon_notice_gray" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
        <!--<a class="icon_ticket_gray" href="<?php echo addons_url('Card://coupons/show');?>">优惠券</a>-->
        <a class="icon_share_gray" href="<?php echo addons_url('Card://Wap/share');?>">积分</a>
        <a class="icon_signin_gray" href="<?php echo addons_url('Card://Wap/signin');?>">签到</a>
    </nav>
    <div class="bottom_nav_blank"></div>
</body>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
$('#bind_card').click(function(){
	window.location.href="<?php echo addons_url('Card://Wap/bindCard');?>";
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