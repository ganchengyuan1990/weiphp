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
  		<div class="common_header">
        	<a class="back" href="javascript:;" onClick="history.back()"></a>
            <span>积分兑换</span>
        </div>
  		<ul class="integral_list">
  			<?php if(!empty($score_exchange)): if(is_array($score_exchange)): $i = 0; $__LIST__ = $score_exchange;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <p class="title"><?php echo ($vo["title"]); ?></p>
<!--                     <p class="info">此券有效期至：2015-4-27</p> -->
                    <p class="info">兑换有效期：<span><?php echo (time_format($vo["start_time"],'Y-m-d')); ?>至<?php echo (time_format($vo["end_time"],'Y-m-d')); ?></span></p>
                    <?php if(empty($vo["cover_id"])): ?><img src="<?php echo ADDON_PUBLIC_PATH;?>/exchange_pic.jpg"/>
                    <?php else: ?>
                    <img src="<?php echo (get_cover_url($vo[cover_id])); ?>"/><?php endif; ?>
                    <br/>（<?php echo ($vo["coupon"]); ?>）
                    <div class="integral_bottom">
                    	
                    	<span class="count">
                    	
                            <em><?php echo ($vo["score_limit"]); ?></em>
                            积分 
                        </span>
                        <?php $time=time(); if($time >= $vo['end_time']){ ?>
                        	<a class="btn gray_btn exchange_btn" href="#">已过期</a>
                        	<?php }else if($vo['no_count']==1){ ?>
                        	<a class="btn gray_btn exchange_btn" href="#">已兑换完</a>
                        	<?php }else{ ?>
                        	<a class="btn exchange_btn" onclick='do_exchange("<?php echo ($vo["id"]); ?>","<?php echo ($vo["coupon_id"]); ?>")'>兑换</a>
                        	
                        	<?php } ?>
                        
                        <!--
                        <a class="btn gray_btn exchange_btn" href="#">已兑换或已过期</a>
                        -->
                    </div>
             </li><?php endforeach; endif; else: echo "" ;endif; ?>
  			<?php else: ?>
            	<div class="empty_default">
                    <br/><br/><br/><br/>
                        <img src="/php/weiphp3/Public/Home/images/empty_content.png" width="100"/>
                        <br/>
                        还没有积分兑换活动~</p>
                    </div><?php endif; ?>
             
   		</ul>
           
            
            
        <nav class="bottom_nav">
    <a class="icon_me_gray" href="<?php echo addons_url('Card://Wap/me');?>">我的</a>
    <a class="icon_card_gray" href="<?php echo addons_url('Card://Wap/index');?>">会员卡</a>
    <a class="icon_notice_gray" href="<?php echo addons_url('Card://notice/show');?>">最新通知</a>
    <a class="icon_share_gray" href="<?php echo addons_url('Card://Wap/share');?>">积分</a>
    <a class="icon_signin_gray" href="<?php echo addons_url('Card://Wap/signin');?>">签到</a>
</nav>
<div class="bottom_nav_blank"></div>	
 </div>
 
<script type="text/javascript">
function do_exchange(id,coupon_id){
	var url = "<?php echo addons_url('Card://Wap/do_score_exchange');?>&id="+id+"&coupon_id="+coupon_id;
	$.post(url,function(d){
		if(d==1){
			$.Dialog.success('兑换成功');
			window.location.reload();
		}else if(d==-1){
			$.Dialog.fail('积分不足');
		}else{
			$.Dialog.fail('兑换失败');
		}
	});
}
</script>
</body>
</html>