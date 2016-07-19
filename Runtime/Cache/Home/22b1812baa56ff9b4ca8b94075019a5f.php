<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>积分排行榜</title>
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
	<div class="container">
            <div class="m_15">
			<table cellpadding="0" cellspacing="0" class="data_table">
                 <thead>
                     <tr>                
                     <td>昵称</td>
                     <td>积分</td>
                     </tr>  
                 </thead>
                 <tbody>
                 <?php if(!empty($user)): if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>                
                       <td><?php echo ($vo["nickname"]); ?></td>
                       <td><?php echo ($vo["score"]); ?></td>
                   </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                         
                 </tbody>          
          </table>
          <?php if(empty($user)): ?></div>
          <p class="m_15">            
              <center>没有积分记录</center>                 
          </p>
         </div><?php endif; ?>
   </div>
</body>
</html>