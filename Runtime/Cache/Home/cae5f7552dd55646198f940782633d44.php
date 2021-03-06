<?php if (!defined('THINK_PATH')) exit();?><!-- 用户绑定页面 -->
<!DOCTYPE html>
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
<link href="<?php echo ADDON_PUBLIC_PATH;?>/userCenter1.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
<div id="container" class="container body user_bind_page">
  <div style="margin:20px auto; text-align:center"><img src="<?php echo ADDON_PUBLIC_PATH;?>/bind_mobile.png" width="150px;"/></div>
  
  <!-- 表单 -->
  <form class="bind_form form-horizontal" method="post" action="<?php echo addons_url('UserCenter://Wap/bind_prize_info');?>" id="post_form">
    <!-- 基础文档模型 -->
    <div class="tab-pane in      tab1" id="tab1">
      <div class="form-item cf">
        <div class="controls">
          <input type="text" placeholder="输入手机号码" value="" name="mobile" id="mobile" class="text input-large">
        </div>
      </div>
      <div class="form-item cf">
        <div class="controls">
          <input type="text" placeholder="真实姓名" value="" name="truename" id="truename" class="text input-large">
        </div>
      </div>
      <!--<div class="form-item cf">
          <div class="controls tb">
            <input type="text" placeholder="输入收到的验证码" value="" name="code" class="text input-large" style="width:50%; margin-right:10px;">
            <a href="javascript:void(0);" class="btn flex_1" id="send_btn" onClick="sendmsg()">获取短信验证码</a>
            
          </div>
        </div>-->
      <div id="top-alert" class="fixed alert alert-error" style="display: none;">
        <button class="close fixed" style="margin-top: 4px;">×</button>
        <div class="alert-content"></div>
      </div>
      <div class="form-item cf">
        <button class="home_btn submit-btn" id="submit_post" type="button" target-form="form-horizontal">提交</button>
      </div>
      <!--<p class="bind_tips">手机号码用于验证身份，不会被公开，请放心输入。</p>-->
    </div>
  </form>
</div>
<block name="script">
<script type="text/javascript">
var reSentTime = 60;
function sendmsg(){	
	if($('#send_btn').hasClass('gray_btn'))return;
    if($('input[name="mobile"]').size()>0 && $('input[name="mobile"]').val().length!=11){
   		 $.Dialog.fail("请填写正确的手机号码!");
		 return;
    }
  
   	$('#send_btn').addClass('gray_btn');
	reSentTime = 60;
	show_time();
	
	var mobile = $('#mobile').val();
	var url = "<?php echo U('Home/Index/sendMsg');?>";
	
	$.post(url,{mobile:mobile},function(){
		//TODO
	});
}
function show_time(){ 
	if(reSentTime > 0){ 
		--reSentTime; 
		$('#send_btn').html(reSentTime+'秒后可重发');
		setTimeout("show_time()", 1000); //设置1000毫秒以后执行一次本函数
	}else{
		reSentTime = 60;
		$('#send_btn').html('重新发送验证码');
		$('#send_btn').removeClass('gray_btn');
	}
};

	
$('#submit_post').click(function(){
   console.log(11);
   //判断
   if($('input[name="mobile"]').size()>0 && $('input[name="mobile"]').val().length!=11){
   		 $.Dialog.fail("请填写正确的手机号码!");
		 return;
   }
   console.log($('input[name="truename"]').val()=='');
   	if($('input[name="truename"]').val()==''){
   		 $.Dialog.fail("真实姓名!");
		 return;
    }
	console.log(33);
$('#post_form').submit();
   
//   $.Dialog.loading();
//   $.ajax({
//	   url:"<?php echo addons_url('UserCenter://Wap/bind_prize_info');?>",
//	   type:'post',
//	   data:$('#form').serializeArray(),
//	   dataType:'json',
//	   success:function(json){
//		   console.log(json);
//		    //$.Dialog.close();
//			if(json.status==1){
//			   		
//			   		$.Dialog.success(json.info);
//					//alert('2');
//			   }else{
//				   	$.Dialog.fail(json.info);
//					//alert('3');
//				   }
//		   if(json.url!=""){
//			   setTimeout(function(){
//				   window.location.href=json.url;
//				   },2000);
//			   }
//   		},
//		error:function(){
//				$.Dialog.close();
//			 //$.Dialog.fail();
//			}
//	   });
});

</script> 
<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo ($tongji_code); ?>
</div>
</body>
</html>