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
            <span>积分规则</span>
        </div>
    	<ul class="toggle_list" style="margin-top:10px">
        	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(intval($vo['score'])!=0 || intval($vo['experience'])!=0){ ?> 	 
        	<li class="single_item m_10 p_10 toggle_list_open">
            	<div class="title icon_arrow_right">
                 	<img width="30" class="fl mr_10" src="<?php echo ADDON_PUBLIC_PATH;?>/score_method_gray.png"/> 
                	<p ><strong><?php echo ($vo["title"]); ?></strong></p>
                </div>
                <div class="content">
                	<p class="t_color"><strong>赠送值（'-' 代表 扣除）</strong></p>
                	 	<p>积分赠送： <?php echo (intval($vo["score"])); ?> </p>
                	<p>经验值赠送： <?php echo (intval($vo["experience"])); ?> </p>
                	 	
                </div>
            </li>
            <?php } endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    	
        <p class="copyright"><?php echo ($system_copy_right); ?></p>
    </div>
    <script type="text/javascript">
    </script>
</body>
</html>