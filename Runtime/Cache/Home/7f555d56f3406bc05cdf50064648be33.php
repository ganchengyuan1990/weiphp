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
<link rel="stylesheet" type="text/css" href="<?php echo ADDON_PUBLIC_PATH;?>/shop_vote.css?v=<?php echo SITE_VERSION;?>">
<body>
    <div class="container">
    	<div class="fixed_bg"></div>
    	<div class="vote_wrap">
        <div class="common_header">
        	<a class="back" href="javascript:;" onClick="history.back()"></a>
            <span>投票详情</span>
        </div>
      	<?php if(!empty($option)): ?><div class="option_user">
        		<img src="<?php echo (get_cover_url($option["image"],300,300)); ?>">
      			<p>姓名：<?php echo ($option["number"]); ?>号 <?php echo ($option["truename"]); ?></p>
      			<p>总票数:<?php echo ($option["opt_count"]); ?></p>
      			 <?php if($overtime == 1): ?><span class="detail_btn over_btn"><em class="zan"></em>活动未开始</span>
                <?php elseif($overtime == -1): ?>  
                	<span class="detail_btn over_btn"><em class="zan"></em>活动已结束</span>
                <?php else: ?>                  
                    <?php if($option[has_vote]==1) { ?>
                    <a class='detail_btn has_vote'><em class="zan"></em>已投票</a>
                    <?php }elseif($finish_vote==1) { ?>
                    <a class='detail_btn over_btn'><em class="zan"></em>已投完</a>
                    <?php }else { ?>
                    <a class='detail_btn' onClick="vote_join(<?php echo ($option["id"]); ?>,<?php echo ($vote_info["id"]); ?>,this);"><em class="zan"></em>投TA 一票</a>
                    <?php } endif; ?>
      		</div>	
            <div class="option_content">
            	<h6><img src="<?php echo ADDON_PUBLIC_PATH;?>/smile.png"/>微笑宣言</h6>
                <p><?php echo ($option["manifesto"]); ?></p>
            	<h6><img src="<?php echo ADDON_PUBLIC_PATH;?>/remark.png"/>选手介绍</h6>
                <p><?php echo ($option["introduce"]); ?></p>
            </div><?php endif; ?>
        
    </div>	
   </div>
<script type="text/javascript">
var is_verify = '<?php echo ($vote_info["is_verify"]); ?>';
function vote_join(optionid,voteid,_this){
	if (optionid ==0) {
        $.Dialog.fail('获取不到投票选项');
    }
    if (voteid ==0) {
         $.Dialog.fail('该活动不存在');
    }
	if($(_this).hasClass('has_vote')){
		return false;
	}
	$(_this).addClass('has_vote');
	var url="<?php echo addons_url('Vote://Wap/join');?>";
	if(is_verify!="" && parseInt(is_verify)==1){
		$html = $('<p><img style="background:URL('+IMG_PATH +'/loading_icon.gif) no-repeat center center" width="100%" height="60" src="<?php echo U("verify_img");?>"/><br/><input type="text" name="verify" value=""/><a style="color:#3772cb;padding:5px 0 0 0;" href="javascript:;">看不清？换一个</a></p>');
		$('a',$html).click(function(){
			$('img',$html).attr('src',"<?php echo U('verify_img');?>");
		})
		$.Dialog.confirm('请输入验证码',$html,function(){
			verify = $('input',$html).val();
			do_vote(_this,voteid,optionid,verify);
		});
	}else{
		do_vote(_this,voteid,optionid,0);
	}
}
function do_vote(_this,voteid,optionid,verify){
	var url="<?php echo addons_url('Vote://Wap/join');?>";
	$.post(url,{'vote_id':voteid,'option_id':optionid,'verify':verify},function(res){
        if(res.error){
        	 $.Dialog.fail(res.error);
			 $(_this).removeClass('has_vote');
        }else{
        	 $.Dialog.success(res.success);
			 
        	 setTimeout(function(){
				window.location.reload();
			},1500)
			
        }     
    });
}
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
wx.ready(function(){
	var shareData = {
			title: '<?php echo ($vote_info["title"]); ?>', // 分享标题
			desc: '<?php echo ($vote_info["remark"]); ?>', // 分享描述
			link: "<?php echo U( 'index',array('vote_id'=>$vote_info['id'],'publicid'=>$public_info[id]));?>", //分享的链接地址
			imgUrl: "<?php echo SITE_URL;?>/Addons/Vote/icon.png", // 分享图标
			type: 'link', // 分享类型,music、video或link，不填默认为link
			dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			success: function () { 
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
</body>
</html>