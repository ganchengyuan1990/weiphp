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
	<?php $isEdit = I('edit'); ?>
	<div id="container" class="container body">
    	<?php if(($isEdit) == "1"): ?><div class="common_header">
                <a class="back" href="javascript:;" onClick="history.back()"></a>
                <span>编辑会员卡资料</span>
            </div><?php endif; ?>
    	<div class="p_10 top_line"> 
        	 <!-- 表单 -->
            <form method="post" class="" id='form'>
              <!-- 基础文档模型 -->
              
              <div id="tab1" class="tab-pane">
              	<div class="block_content_bg">
                  <?php if(empty($isEdit)): ?><div class="block_content_top">
                  		
                  		<h6><img width="40px" src="<?php echo ADDON_PUBLIC_PATH;?>/vip_head.png" /> 填写会员卡资料</h6>
                  </div><?php endif; ?>
                  <div class="p_10">
                      <div class="form-item cf">
                            <label class="item-label">姓名:</label>
                            <div class="controls">
                              <input type="text" maxlength="30" placeholder="请输入姓名" class="text input-medium" name="username" id="username" value="<?php echo ($info["username"]); ?>">
                             </div>
                       </div>
                       <div class="form-item cf">
                            <label class="item-label">手机号:</label>
                            <div class="controls">
                              <input type="tel" maxlength="30" placeholder="请输入手机号码" class="text input-large" name="phone" id="phone" value="<?php echo ($info["phone"]); ?>">
                            </div>
                       </div>
                       <?php if(($isEdit) == "1"): ?><div class="form-item cf">
                		<div class="controls">
                  			<select maxlength="30" name="sex">
			                  	<option value="2" <?php if(($info["sex"]) == "2"): ?>selected=selected<?php endif; ?>>女</option>
			                  	<option value='1' <?php if(($info["sex"]) == "1"): ?>selected=selected<?php endif; ?>>男</option>
                  			</select>
                 		</div>
           				</div>
           
                       <div class="form-item cf">
                            <label class="item-label">生日:</label>
                            <div class="controls">
                              <input style="height:44px;" type="date" maxlength="30" placeholder="请选择生日日期" class="text input-large" name="birthday" id="birthday" value="<?php echo (time_format($info["birthday"],'Y-m-d')); ?>">
                            </div>
                        </div>
                        
                        <div class="form-item cf">
                            <label class="item-label">详细地址:</label>
                            <div class="controls">
                              <input type="text" placeholder="请输入详细地址" class="text input-large" name="address" id="address" value="<?php echo ($info["address"]); ?>">
                            </div>
                        </div><?php endif; ?>
        			   
                           <div class="form-item cf" id='is_show_verify'>
                                <div class="controls tb">
                                  <input type="number" maxlength="30" placeholder="请输入验证码" class="text input-large flex_1 mr_10" name="verifyCode" id="verifyCode" value="">
                                  <button class="home_btn flex_2" id="getVerifyCodeBtn" type="button">获取验证码</button>
                                </div>
                           </div>
                        
                    </div>
                 </div>          
                 <div class="form-item pt_10">
                	<button class="home_btn submit-btn mb_10 flex_1" id="submit1" type="button" target-form="form-horizontal">提  交</button>
                 </div>    
                 <br/>
                 <br/>
                 <?php if(empty($isEdit)): ?><p style="color: darkgray;">（若已是实体店会员，可直接 绑定实体店会员卡）</p>
                 <div class="form-item pt_10">
                	<button class="home_btn submit-btn mb_10 flex_1 yellow_btn" type="button" id='bind_card' >绑定实体店会员卡</button>
                 </div><?php endif; ?>            
          	</div>
            </form>
        </div>
        <p class="copyright"><?php echo ($system_copy_right); ?></p>
    </div>
    <script type="text/javascript">
		//获取验证码
    	$('#getVerifyCodeBtn').click(function(){
			if($('#getVerifyCodeBtn').hasClass('gray_btn'))return;
			var phone = $('#phone').val();
				if(phone!=""){
					$.Dialog.loading();
					$.post("<?php echo U('send_sms_code');?>&phone="+phone,function(data){
							$.Dialog.close();
							if(data.result==1){
								$.Dialog.success("发送成功!");
								$('#getVerifyCodeBtn').addClass('gray_btn');
								var leftTime = 60;
								var timer = setInterval(function(){
									$('#getVerifyCodeBtn').text(leftTime+'秒后可重发');
									leftTime--;
									if(leftTime==0){
										clearInterval(timer);
										$('#getVerifyCodeBtn').removeClass('gray_btn').text('重新获取');
									}
								},1000);
							}else{
								$.Dialog.fail(data.msg);
							}
						}
					);
				}else{
					$.Dialog.fail("请填写手机号！");
				}
			})
		var need_verify="<?php echo ($need_verify); ?>";
		var old_phone="<?php echo ($info["phone"]); ?>";
		var phone=$('#phone').val();
		if(need_verify == 1){
			if(old_phone === phone && phone !==""){
				$('#is_show_verify').hide();
				$('#phone').change(function(){
					$('#is_show_verify').show();
				})
			}else{
				$('#is_show_verify').show();
			}
		}else{
			$('#is_show_verify').hide();
		}
		
		
		$('#submit1').click(function(){
			//$.Dialog.loading();//loading等待调用  loading完成$.Dialog.close();关闭loading
			//$.Dialog.success();//成功调用 提示一秒后自动关闭
			if($('#username').val()!=undefined && $('#username').val()==""){
				$.Dialog.fail("请填写姓名！");//成功调用 提示一秒后自动关闭
				return false;
			}
			if($('#phone').val()!=undefined && $('#phone').val()==""){
				$.Dialog.fail("请填写手机号！");//成功调用 提示一秒后自动关闭
				return false;
			}
			phone=$('#phone').val();
			if($('#verifyCode').val()!=undefined && $('#verifyCode').val()=="" && old_phone != phone && need_verify == 1){
					$.Dialog.fail("请填写手机验证码！");//成功调用 提示一秒后自动关闭
					return false;
			}
			if(old_phone=="" || phone != old_phone){
				$.post("<?php echo U('check_ERP_member');?>",{'phone':phone},function(data){
					if(data.status==0  || data.card_number == undefined || data.card_number==''){
						$('#form').submit();
					}else if(data.status == 1){
						$('#form').submit();
// 						if(confirm('ERP端存在该手机号,确定绑定，或取消重新填写手机号！')){
// 							$.ajax({
// 								url:"<?php echo U('do_bind_card');?>",
// 								type:"post",
// 								data:{'phone':phone,'card_number':data.card_number},
// 								dataType:"json",
// 								success:function(data){
// 									if(data.status ==1){
// 										$.Dialog.success(data.msg);
// 										setTimeout(function(){
// 											var successUrl="<?php echo U('index');?>";
// 											location.href=successUrl;
// 										},1500)
// 									}else{
// 										$.Dialog.fail(data.msg);
// 									}
									
// 								}
// 							});
// 						}
// 						else{
// 							$('#form').submit();
// 						}
					}else{
						$.Dialog.confirm('提示','ERP端存在多个该手机号,请到店里转人工服务处理！');
						
						//$.Dialog.confirm("ERP端存在多个该手机号,请到店里转人工服务处理！");
						return false;
					}
				});
			}else{
				$('#form').submit();
			}
		})
		$('#bind_card').click(function(){
			window.location.href="<?php echo addons_url('Card://Wap/bindCard');?>";
		});
		
    </script>
</body>
</html>