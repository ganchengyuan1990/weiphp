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
<body>
	<div id="container" class="container">
    	<div class="wrap">
        	<?php if(($type) == "collected"): ?><div class="top_tab">
                    <a class="l current" href="javascript:;">我收藏的名片</a>
                    <a class="r" href="<?php echo U('collecting');?>">收藏我的人</a>
                </div>
            <?php else: ?>
            	<div class="top_tab">
                    <a class="l" href="<?php echo U('collected');?>">我收藏的名片</a>
                    <a class="r current" href="javascript:;">收藏我的人</a>
                </div><?php endif; ?>
            <?php if(empty($list_data)): ?><div class="empty_container">
                	<p>你还没有任何收藏的名片~~</p>
                </div>
            <?php else: ?>
            	<ul class="card_list">
            	<?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    	<a href="<?php echo U('detail',array('uid'=>$vo['uid']));?>">
                        	<?php if(empty($vo[headimgurl])): ?><img src="/php/weiphp3/Public/Home/images/default.png"/>
                            <?php else: ?>
                            	<img src="<?php echo ($vo["headimgurl"]); ?>"/><?php endif; ?>
                            <div class="info">
                            	<p class="name"><?php if(empty($vo["truename"])): echo ($vo["nickname"]); else: echo ($vo["truename"]); endif; ?></p>
                                <p class="position"><?php echo ($vo["position"]); ?></p>
                            </div>
                            <em></em>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="m_10">
                	<?php echo ($_pages); ?>
                </div><?php endif; ?>
        	
            <p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>
        </div>
        <div class="bottom_menu">
        	<a class="back" href="javascript:;" onClick="$.WeiPHP.back();">返回</a>
        	<a class="center" href="<?php echo U('detail');?>">我的名片</a>
            <a class="collected" href="<?php echo U('collected');?>">名片夹</a>
        	<a class="share" href="javascript:;" onClick="$.WeiPHP.showShareTips();">一键分享</a>
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