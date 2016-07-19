<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/php/weiphp3/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/php/weiphp3/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/php/weiphp3/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/php/weiphp3/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/php/weiphp3/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/php/weiphp3/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/php/weiphp3/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/php/weiphp3/Public/Home/images";
var  STATIC = "/php/weiphp3/Public/static";
var  ROOT = "/php/weiphp3";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
var  UPLOAD_DIALOG_URL = "<?php echo U('home/File/uploadDialog',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

<body style="background:#fff">
  <!-- 标签页导航 -->
  <div class="span9 page_message">
    <section id="contents">
      
      <div class="tab-content" style="padding:0 20px"> 
        <!-- 表单 -->
        <form id="form" action="<?php echo U('do_recharge?model='.$model['id']);?>" method="post" class="form-horizontal">
          <ul id="tab" class="tab-pane in">
          	<?php if(empty($data["member_id"])): ?><li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>
                    <select name='card_id'>
                    	<option value='0'>会员卡号</option>
                    	<?php if(!empty($all_number)): if(is_array($all_number)): $i = 0; $__LIST__ = $all_number;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><option value='<?php echo ($key); ?>'><?php echo ($a); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                     <input type="text" class="text samll_num check_number" name="number" value="<?php echo ($data["number"]); ?>" placeholder="会员卡号" > <span id="number_tips"> </span>
                
                    <span class="check-tips"></span></label>
                    <div class="controls"> 
                    
                    </div>
                     </li><?php endif; ?>
                  
            	 <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>充值金额<span class="check-tips"></span></label>
                    <div class="controls">
                      <input type="text" class="text input-large samll_num" name="recharge" value="<?php echo ($data["recharge"]); ?>" placeholder="金额" > （元）
                    </div>
                  </li>  
                   <li class="form-item cf">
                    <label class="item-label"><span class="need_flag">*</span>充值门店<span class="check-tips"></span></label>
                    <div class="controls">
                     	<select name='branch_id'>
                     		<option value='0'>所有门店</option>
                     		<?php if(!empty($shop)): if(is_array($shop)): $k = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><option value='<?php echo ($k); ?>'><?php echo ($v); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                     	</select>
                    </div>
                  </li>  
                  
                   <li class="form-item cf">
                    <label class="item-label"><span class="need_flag"></span>操作员<span class="check-tips"></span></label>
                    <div class="controls">
                      <input type="text" class="text input-large" name="operator" value="<?php echo ($data["operator"]); ?>" placeholder="请填写操作员姓名" >
                    </div>
                  </li>  
                  
                  <li class="form-item cf" id="event_div" style="display:none">
                    <label class="item-label"><span class="need_flag"></span>充值赠送活动<span class="check-tips"></span></label>
                    <div class="controls" id="event_html"></div>
                  </li> 
                  
               	</ul>
          </div>
          <div class="form-item form_bh">
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
            <input type='hidden' name='member_id' value='<?php echo ($data["member_id"]); ?>' />
            <button class="btn submit-btn ajax-post dialog_submit" id="submit" type="submit" target-form="form-horizontal">确 定</button>
          </div>
        </form>
       
      </div>
    </section>
  </div>
  </div>
</body>
<script type="text/javascript">
$(function(){
	set_number();
	$("select[name='card_id']").change(function(){
		set_number();
	})
	
	$('.check_number').blur(function(){ var number = $(this).val(); checkMember(number); });
});
function set_number(){
	var number_id=$("select[name='card_id'] option:selected").val();
	
	if(number_id==0){
		$("input[name='number']").val('').show();
		$('#number_tips').html('');
		$('#event_div').hide();
	}else{
		var number = $("select[name='card_id'] option:selected").text();
	    checkMember(number);
		
		$("input[name='number']").hide();
	}
}
function checkMember(number){
	var url = "<?php echo U('checkMemberByAjax');?>&number="+number;
	$.post(url,{number:number},function(data){
		var data = $.parseJSON(data);
		if(data.status==0){
			$('#number_tips').html('此会员不存在！');
			$('#event_div').hide();
		}else{
			$('#number_tips').html('会员：'+data.name);
			if(data.event_id!=0){
			 var html = '<input type="checkbox" class="regular-checkbox" value="'+data.event_id+'" id="event_id" name="event_id" checked="checked" ><label for="event_id"></label>'+data.event_title;
			
			$('#event_div').show();
			$('#event_html').html(html);}
		}		
	});
}
</script>
</html>