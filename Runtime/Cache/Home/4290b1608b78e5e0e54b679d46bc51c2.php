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
	<div class="container body">
    	<div class="common_header">
        	<a class="back" href="javascript:;" onClick="history.back()"></a>
            <span>客户关怀</span>
        </div>
        <?php if(!empty($list_data)): ?><ul class="toggle_list" style="margin-top:10px">
                <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="single_item m_10 p_10 toggle_list_open">
                        <div class="title icon_arrow_right">
                            <img width="26" class="fl mr_10" src="<?php echo ADDON_PUBLIC_PATH;?>/cake.png"/>
                            <p class="t_color"><strong><?php echo ($vo["title"]); ?></strong></p>
                        </div>
                        <div class="content">
                            <p>使用日期:<?php echo ($vo["start_time"]); ?></p>
                            <p><?php echo ($vo["type"]); ?></p>
                            <p>描述: <?php echo ($vo["content"]); ?></p>
                            <?php if(!empty($vo["custom_log"])): if(($vo["is_send"]) == "0"): ?><p style="text-align: right;"><a onclick="get_score(<?php echo ($vo["custom_log"]); ?>,'<?php echo ($vo["title"]); ?>');" style="border: none; background-color: #DA5F66; border-radius: 5px;font-size: 16px;text-decoration: none;color: #fff; padding: 5px 16px 8px 16px;">领取</a></p>
                       			<?php else: ?>
                       			<p style="text-align: right;"><a  style="border: none; background-color: #807B7B; border-radius: 5px;font-size: 16px;text-decoration: none;color: #fff; padding: 5px 16px 8px 16px;">已领取</a></p><?php endif; endif; ?>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        <?php else: ?>
        	<div class="empty_default">
            <br/><br/><br/><br/>
                <img src="/php/weiphp3/Public/Home/images/empty_content.png" width="100"/>
                <br/>
                还没有客户关怀活动~</p>
            </div><?php endif; ?>
    	
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
<div class="bottom_nav_blank"></div>
    <script type="text/javascript">
    function get_score(id,title){
    	$.post("<?php echo U('get_privilege');?>",{'id':id,'title':title},function(res){
    		if(res.status==1){
//     			$.Dialog.success(res.msg);
    			$.Dialog.confirm('提示',res.msg,function(){
    				window.location.reload();
    			});
    		}else{
    			$.Dialog.fail(res.msg);
    		}
    		
    	});
    }
    </script>
</body>
</html>