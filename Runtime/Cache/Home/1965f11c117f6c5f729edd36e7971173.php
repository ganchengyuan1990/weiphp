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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/style.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ADDON_PUBLIC_PATH;?>/common.js"></script>
<body>
	<div id="container" class="container">
    	<div class="wrap">
        	<div class="m_20"><center>名片信息保存成功！<br/>请选择一个名片模板</center></div>
        	<ul class="temp_list">
            	<?php if(is_array($tempList)): $i = 0; $__LIST__ = $tempList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="javascript:;" data-temp="<?php echo ($vo["dirName"]); ?>" onClick="previewCard(this,'<?php echo U('save_template',array('id'=>I('id')));?>','<?php echo U('detail');?>');"><img src="<?php echo ($vo["icon"]); ?>"/><br/><span><?php echo ($vo["title"]); ?></span></a>
                    <?php if(($vo['class']) == "selected"): ?><em class="checked"></em><?php endif; ?>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <p class="copyright"><?php echo ($system_copy_right); ?></p>
        </div>
    </div>
    <!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
    <script type="text/javascript">
	$.WeiPHP.initWxShare({
		title:'<?php echo ($info["truename"]); ?>的互联网名片',
		desc:'<?php echo ($info["position"]); ?>',
		link:"<?php echo U('detail', array('uid'=>$mid));?>",
		imgUrl:'<?php echo ($info["headimgurl"]); ?>'
	});
	</script>
</body>
</html>