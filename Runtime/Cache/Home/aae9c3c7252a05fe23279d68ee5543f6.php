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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/css.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div id="container" class="container">
  <div class="head_hd" style="background:<?php echo ($info["head_bg_color"]); ?>"> <img 
          
    <?php if(empty($info["background"])): ?>style="display:none"<?php endif; ?>
    class="head_pic" src="<?php echo (get_cover_url($info["background"])); ?>" width="100%">
    <div class="seller">
      <?php if(!empty($info["shop_logo"])): ?><img src="<?php echo (get_cover_url($info["shop_logo"])); ?>">
        <?php else: ?>
        <img src="pic_money.png"/><?php endif; ?>
      <span class="name"><?php echo ($info["shop_name"]); ?></span> </div>
    <p class="title"> <span id="title"><?php echo ($info["title"]); ?></span> </p>
    <div class="line"></div>
  </div>
  <div class="btnWrap"> <a href="javascript:void(0)" class="start_btn" id="batchAddCard" style="background:<?php echo ($info["button_color"]); ?>"> 领取卡券 </a> </div>
  <!-- 更多按钮 -->
     <?php if(!empty($info[more_button_arr])): if(is_array($info[more_button_arr])): $i = 0; $__LIST__ = $info[more_button_arr];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($key); ?>"  class="start_btn" style="background:<?php echo ($info["button_color"]); ?>"><?php echo ($vo); ?></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
  <!--
  <div class="v_nav"> <a class="item" href="<?php echo addons_url('CardVouchers://Wap/cardVouchers_detail',array('id'=>$info[id]));?>">卡券详情<em>&nbsp;</em></a> </div>
  -->
  <?php if(!empty($info["content"])): ?><div id="content" style="background:#fff; color:#888; border-radius:5px; padding:10px; border:1px solid #ddd; margin:15px;">
  		<?php echo ($info["content"]); ?>
  </div><?php endif; ?>
  <p class="copyright"><?php echo ($system_copy_right); ?></p>
</div>
<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div> 
<script>
$.WeiPHP.initWxShare({
	title:"<?php echo ($info["title"]); ?>",
	imgUrl:"<?php echo (get_cover_url($info["shop_logo"])); ?>",
	desc:"<?php echo ($info["shop_name"]); ?>",
	link:window.location.href
})
	
// };
document.querySelector('#batchAddCard').onclick = function () {
	 var cardId='<?php echo ($info["card_id"]); ?>';
	 var ext = '<?php echo ($info["card_ext"]); ?>';
	 var aimId="<?php echo ($aim_id); ?>";
	 var fromType="<?php echo ($from_type); ?>";
	 if(fromType && aimId){
		 $.post("<?php echo U('doSaveAward');?>",{'aim_id':aimId,'from_type':fromType},function(dd){
//     		 alert(dd);
    	 });
	 }
	 
		wx.addCard({
		    cardList: [{
		        cardId: cardId,
		        cardExt: ext 
		    }], // 需要添加的卡券列表
		    success: function (res) {
//	 	        var cardList = res.cardList; // 添加的卡券列表信息
//	 	        console.log(cardList);
// 		    	 alert('已添加卡券：' + JSON.stringify(res.cardList));
		    	
		    	 
		    }
		});
	
};

// var readyFunc = function onBridgeReady() {
// 	document.querySelector('#batchAddCard').addEventListener('click',
// 		function(e) {
// 			  WeixinJSBridge.invoke('batchAddCard', { "card_list": [{ "card_id":'<?php echo ($info[card_id]); ?>', "card_ext":'<?php echo ($info["card_ext"]); ?>'}]},								
// 			  function(res) {
// 			  });
// 		}
// 	); 
// }
// if (typeof WeixinJSBridge === "undefined") {
// 	  document.addEventListener('WeixinJSBridgeReady', readyFunc, false);
// } else {
// 	  readyFunc();
// }
</script>
</body>
</html>