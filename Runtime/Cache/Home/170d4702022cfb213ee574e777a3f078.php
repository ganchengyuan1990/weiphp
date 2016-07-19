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
    	<div class="p_10 top_line"> 
        	<h5 class="page_title"></h5>
            <!-- 表单 -->
            <form method="post" class="m_15">
              <!-- 基础文档模型 -->
              
              <div id="tab1" class="tab-pane">
              	<div class="block_content_bg">
                  <div class="block_content_top">
                  		<h6><img width="40px" src="<?php echo ADDON_PUBLIC_PATH;?>/vip_card.png" /> 绑定实体会员卡</h6>
                  </div>
                  <div class="p_10">
                      <div class="form-item cf">
                            <label class="item-label">手机号:</label>
                            <div class="controls">
                              <input type="tel" maxlength="30" placeholder="请输入手机号码" class="text input-large" name="mobile" id="mobile" value="" required>
                            </div>
                       </div>
                       <div class="form-item cf" id='is_show_verify'>
                            <div class="controls tb">
                              <input required type="number" maxlength="30" placeholder="请输入验证码" class="text input-large flex_1 mr_10" name="verifyCode" value="">
                              <button class="home_btn flex_2" id="getVerifyCodeBtn" type="button">获取验证码</button>
                            </div>
                       </div>
                    </div>
                 </div>          
                 <div class="form-item pt_10">
                	<button class="home_btn submit-btn mb_10 flex_1" id="submit" type='button'  target-form="form-horizontal">确  定</button>
                 </div>
          	</div>
            </form>
        </div>
        <p class="copyright"><?php echo ($system_copy_right); ?></p>
    </div>
    <script type="text/javascript">
    var need_verify="<?php echo ($need_verify); ?>";
    if(need_verify == 1){
		$('#is_show_verify').show();
	}else{
		$('#is_show_verify').hide();
	}
		//获取验证码
    	$('#getVerifyCodeBtn').click(function(){
			var phone = $('#mobile').val();
				if(phone!=""){
					$.Dialog.loading();
					$.ajax({
						url:"<?php echo U('sendPhoneCode');?>&phone="+phone,
						type:"post",
						dataType:"json",
						success:function(data){
							$.Dialog.close();
							$.Dialog.success("发送成功!");
						}
					});
				}else{
					$.Dialog.fail("请填写手机号！");
				}
			});
		
		$('#submit').click(function(){
			//$.Dialog.loading();//loading等待调用  loading完成$.Dialog.close();关闭loading
			//$.Dialog.success();//成功调用 提示一秒后自动关闭
			var phone=$('#mobile').val();
			if(phone!=undefined && phone==""){
				$.Dialog.fail("请填写手机号！");//成功调用 提示一秒后自动关闭
				return false;
			}
			$.post("<?php echo U('check_ERP_member');?>",{'phone':phone},function(dd){
				if(dd.status <= 1  || dd.card_number == undefined || dd.card_number==''){
					$.ajax({
						url:"<?php echo U('do_bind_card');?>",
						type:"post",
						data:{'phone':phone,'card_number':dd.card_number},
						dataType:"json",
						success:function(data){
							if(data.status==1){
								$.Dialog.success(data.msg);
								setTimeout(function(){
									var successUrl="<?php echo U('index');?>";
									location.href=successUrl;
								},1500)
							}else{
								$.Dialog.fail(data.msg);
							}
							
						}
					});
				}else{
					$.Dialog.confirm('提示','ERP端存在多个该手机号,请到店里转人工服务处理！');
					return false;
				}
			});
		});
		
    </script>
</body>
</html>