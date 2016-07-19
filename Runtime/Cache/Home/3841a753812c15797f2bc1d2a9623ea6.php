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
            <span>我的余额</span>
        </div>
    	<div class="p_10"> 
            <!--
            <div class="tb"><a href="#" target="_blank" class="btn yellow_btn m_15 flex_1">点击签到,赚积分</a></div>
            -->
            <div class="single_item tb" style="display:-webkit-box">
            	<span class="p_10 flex_1 btl bbl cur" style="text-align:center; border-right:1px solid #ddd;">收入: <?php echo (intval($totalData["all_recharge"])); ?></span>
                <span class="p_10 flex_1 btr bbr" style="text-align:center">支出：  <?php echo (intval($totalData["all_buy"])); ?></span>
            </div>
            
            <div class="single_item mt_10 p_10">
            	<div style="border: none;">
            	 <select id='select_year' class='select_year_month'>
	    			<?php $nowYear= time_format(time(),'Y'); for($i=2000;$i<=$nowYear;$i++){ if( $i== $year){ echo "<option value='$i' selected='selected'>$i</option>"; }else{ echo "<option value='$i'>$i</option>"; } } ?>
    			</select>
    			
            	</div>
            	<div class="select_month">
                	<div class="current_month icon_date">
                    	<p class="icon_arrow_down"><?php echo ($month); ?>月份余额情况<br/>
                        <span>点击此处查看其他月份</span></p>
                    </div>
             
                    <select name="date" id="date" class="score_date mb_10 icon_date">
                        <option value="12">12月</option>
                        <option value="11">11月</option>
                        <option value="10">10月</option>
                        <option value="9">9月</option>
                        <option value="8">8月</option>
                        <option value="7">7月</option>
                        <option value="6">6月</option>
                        <option value="5">5月</option>
                        <option value="4">4月</option>
                        <option value="3">3月</option>
                        <option value="2">2月</option>
                        <option value="1">1月</option>
                    </select>
                </div>
                <div class="score_list score_list_top">
                	<span>日期</span>
                    <span>描述</span>
                    <span>金额</span>
                </div>
                <?php if(!empty($data)): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="score_list">
	                	<span><?php echo ($vo["allday"]); ?></span>
	                    <span><?php echo ($vo["remark"]); ?></span>
	                    <span><?php if(empty($vo["pay"])): echo ($vo["recharge"]); else: echo ($vo["pay"]); endif; ?></span>
	                </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
               
            </div>
        </div>
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
    <script type="text/javascript">
    var month=<?php echo ($month); ?>;

	$("#date option[value="+month+"]").attr('selected','selected');
	
    	$('#date,#select_year').change(function(){
    		var date=$('#date option:selected').val();
    		var year=$('#select_year option:selected').val();
			//选择月份跳转
			window.location.href="<?php echo addons_url('Card://Wap/recharge');?>&month="+date+"&year="+year;	
		});
    </script>
</body>
</html>