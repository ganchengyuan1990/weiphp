<?php if (!defined('THINK_PATH')) exit();?><html>
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
    <script type="text/javascript">
		//静态变量
		var IMG_PATH = "/php/weiphp3/Public/Home/images";
		var STATIC_PATH = "/php/weiphp3/Public/static";
		var SITE_URL = "<?php echo SITE_URL;?>";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <link href="<?php echo ADDON_PUBLIC_PATH;?>/css.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo ADDON_PUBLIC_PATH;?>/style.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo ADDON_PUBLIC_PATH;?>/swiper/dist/idangerous.swiper.css">

    <!--TS-U function-->
    <script type="text/javascript">
        var SITE_URL  = '<?php echo SITE_URL; ?>';
        //载入函数
        var U = function(url, params) {
            var website = SITE_URL+'/index.php';
            url = url.split('/');
            if(url[0]=='' || url[0]=='@')
                url[0] = APPNAME;
            if (!url[1])
                url[1] = 'Index';
            if (!url[2])
                url[2] = 'index';
            website = website+'?app='+url[0]+'&mod='+url[1]+'&act='+url[2];
            if(params) {
                params = params.join('&');
                website = website + '&' + params;
            }
            return website;
        };
        var _static = '/php/weiphp3/index.php?s=';
    </script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/jquery-2.1.1.min.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script src="<?php echo ADDON_PUBLIC_PATH;?>/appframework.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/jquery.tap.min.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/iscroll.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/zepto.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/ui4jq.js?v=<?php echo SITE_VERSION;?>"></script><script src="<?php echo ADDON_PUBLIC_PATH;?>/basic.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/app.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/form.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/core.js?v=<?php echo SITE_VERSION;?>"></script>
    <script src="<?php echo ADDON_PUBLIC_PATH;?>/swiper/dist/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="/php/weiphp3/Public/Home/js/m/dialog.js"></script>
    <script type="text/javascript" src="/php/weiphp3/Public/Home/js/m/mobile_module.js"></script>
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var UPLOAD_URL= '<?php echo UPLOAD_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var MID       = '<?php echo $mid; ?>';
var UID       = '<?php echo $uid; ?>';
var initNums  =  '<?php echo $initNums; ?>';
var SYS_VERSION = '<?php echo $site["sys_version"]; ?>';
var _CITY = '<?php echo session("init_city");?>';
var ISWAP = 1;
var USER_UN_SETTING = '<?php echo ($unsetting); ?>';
// Js语言变量
var LANG = new Array();
</script>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): $i = 0; $__LIST__ = $langJsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><script src="<?php echo ($vo); ?>?v=<?php echo SITE_VERSION;?>"></script><?php endforeach; endif; else: echo "" ;endif; ?>
<?php } ?>
<!--
<script src="<?php echo ADDON_PUBLIC_PATH;?>/js.min.w3g.js?v=<?php echo SITE_VERSION;?>"></script>
-->
<script src="<?php echo ADDON_PUBLIC_PATH;?>/swiper/dist/idangerous.swiper.min.js"></script>
</head>
<body>
<div id="header">
    <div id="header-buttons">
    </div>
    <h1>
        
    </h1>
</div>
<div id="layout">
    <div id="main">
<script type="text/javascript">					
var mySwiper
function showBigImgBox(obj){
	$('.pagination').html('');
	$('.swiper-slide-duplicate').remove('');
	$('#content_img_list').html("");
	
	var old_src = $(obj).attr('src');
		
	var imgArr = new Array();
	var index = 0;
	
	$(obj).closest('.content_imgs').find('img').each(function(i, e) {
		var src = $(this).attr('src');

		if(src!=""){
			if(src==old_src){
				index = i;
			}

			src = src.replace(/_250_250./,".");
			src = src.replace(/_200_200./,".");	

			imgArr.push(src);
			var html = "<div class=\"swiper-slide\"><img src=\""+src+"\" width=\"100%\" /></div>";
			$('#content_img_list').append(html);

		}        
    });

	$('.device').show();

	mySwiper = new Swiper('.swiper-container',{
		pagination: '.pagination',
		loop:true,
		grabCursor: true,
		paginationClickable: true,
		calculateHeight: true,
		initialSlide:index
    })	
	//location.hash="anchor";
	$("body,html").animate({scrollTop: 0}, 0); 
}
function closeBox(){
	mySwiper.destroy();
	$('.device').hide();
}
</script>
<div id="content">
    <div id="weiba" data-title="<?php echo ($post_detail["title"]); ?>" class="panel" data-selected="false"  data-menu="msgmenu" style="padding:0;">
        <header>
            <div id="header-buttons">
            	<?php if(isset($_SERVER['HTTP_REFERER'])){if(session('post_before_url')){ ?>
                	<a href="javascript:window.location.replace('<?php echo session('post_before_url');?>');">
                    <div id="back" class="header-menu-link" data-back="false">
                    返回
                    </div>
                <?php session('post_before_url',NULL);}else{ ?>
                	<a href="javascript:history.go(-1);">
                    <div id="back" class="header-menu-link" data-back="false">
                     返回
                    </div>
                <?php }}else{ ?>
                	<?php if($post_detail['city'] == $curCity): ?><a href="<?php echo U('index',array('from_city'=>$post_detail['city']));?>">
                    <?php else: ?>
                    	<a href="javascript:;" onclick="ui.chooseCity(<?php echo ($post_detail["city"]); ?>);"><?php endif; ?>
                   <div id="back_index">首页</div>
                <?php } ?>
                	
                </a>
				<!--
                <div id="messageLink" class="header-menu-link"><a href="<?php echo U('w3g/Index/msgbox');?>"><i class="num"></i></a></div>
        		<div id="menuLink" class="header-menu-link"></div>
                -->
                <?php $userinfo = getUserInfo($post_detail['post_uid']); ?>
                <div id="otherLink" style="right:0">
                    
                      <?php if($mid){ ?>
                        <a id="unfavoriteBtn" class="unfavorite header-menu-link" event-args="post_id=<?php echo ($post_detail['id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&post_uid=<?php echo ($post_detail['post_uid']); ?>" href="javascript:void(0)" event-node="post_unfavorite" id="favorite" onclick="unfavorite_weiba(this, <?php echo ($post_detail['id']); ?>,<?php echo ($post_detail['post_uid']); ?>,<?php echo ($post_detail['weiba_id']); ?>)" <?php if($post_detail['favorite']!=1){ ?>style="display:none;"<?php } ?>>已收藏</a>
                        <a id="favoriteBtn" class="header-menu-link" event-args="post_id=<?php echo ($post_detail['id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&post_uid=<?php echo ($post_detail['post_uid']); ?>" href="javascript:void(0)" event-node="post_favorite" id="favorite" onclick="favorite_weiba(this, <?php echo ($post_detail['id']); ?>,<?php echo ($post_detail['post_uid']); ?>,<?php echo ($post_detail['weiba_id']); ?>)" <?php if($post_detail['favorite']==1){ ?>style="display:none;"<?php } ?>>收藏</a>
                        <?php }else{ ?>
                            <a id="favoriteBtn" class="header-menu-link" href="<?php echo U('w3g/Public/Login');?>">收藏</a>
                         <?php } ?>
                    <div id="headMenu" class="header-menu-link msg_tips_container" href="javascript:;">
                    	导航<em class="msg"></em>
                    	<ul class="head_sub_menu">
                        	<a href="<?php echo U('index');?>">首页</a>
                            <a href="<?php echo U('forum');?>">版块</a>
                            <a class="msg_tips_container" href="<?php echo U('my');?>">我<em class="msg"></em></a>
                        </ul>
                    </div>
                   

                </div>
            </div>
            <h1 style="display:none">
                <?php echo (getShort($weiba_name,6,'...')); ?>
            </h1>
            
        </header>
  <div class="mainWeiba">
    <!-- <div class="path"> <a href="<?php echo U('forum');?>">版块</a><i>></i><a href="<?php echo U('forum');?>#<?php echo ($cate); ?>"><?php echo ($cate); ?></a><i>></i><a href="<?php echo U('detail',array('weiba_id'=>$weiba_id));?>"><span class="text-required"><?php echo ($weiba_name); ?></span></a></div> -->
    <div class="postDetail">
      <div class="detail_follow">
      	<a class="weiba_title" href="<?php echo U('detail',array('weiba_id'=>$post_detail['weiba_id']));?>"><?php echo (getShort($weiba_name,6,'...')); ?></a>
        <span class="small">已有<?php echo ($weiba_detail['follower_count']); ?>人关注</span>
       
        <?php echo W('FollowWeiba',array('weiba_id'=>$post_detail['weiba_id'],'follow_state'=>array('following'=>$follow_state[$post_detail['weiba_id']]['following']),'isrefresh'=>1));?>
      </div>
      <div style="background:#fff">
      
      <div class="pc_info">
      	<div class="pc_title_wrap">
            <span class="pc_title">
            <?php if($post_detail['tag_id']): ?><a class="blue" href="<?php echo U('detail',array('weiba_id'=>$weiba_id,'tag_id'=>$post_detail['tag_id']));?>">[ <?php echo ($post_detail["tag_name"]); ?> ]</a><?php endif; ?>
            <?php if($post_detail['is_event']): ?><a class="blue" href="<?php echo U('detail',array('weiba_id'=>$weiba_id,'filter'=>'event'));?>">[ 活动 ]</a><?php endif; ?>
            <?php echo ($post_detail["title"]); ?>
            </span>
        </div>
        <dl>
          <dt><a href="<?php echo addons_url('Weiba://Wap/profile',array('uid'=>$post_detail['post_uid']));?>" ><img src="<?php echo (get_userface($post_detail["post_uid"])); ?>"></a></dt>
          <dd>
            
            <div class="name"><a href="<?php echo addons_url('Weiba://Wap/profile',array('uid'=>$userInfo['uid']));?>"><?php echo ($userInfo["nickname"]); ?></a></div>
            <div class="info">
              <p class="date">
              	<?php echo (time_format($post_detail["post_time"])); ?>　
                <div class="pinfo">
                　<span class="llnum"><?php echo ($post_detail["read_count"]); ?></span>
                  <span class="plnum"><?php echo ($post_detail["reply_count"]); ?></span>
                </div>
              </p>
            </div>
          </dd>
        </dl>
      </div>
      <!-- 活动信息 -->
        <?php if($post_detail['is_event']): ?><div class="event_wrap">
            	<div class="event_cover">
                	<img width="100%" src="<?php echo (get_cover_url($event_detail["cover"])); ?>"/>
                </div>
                <div class="event_info">
                	<p>报名人数：<span class="b"><?php echo ($event_detail["join_count"]); ?></span> <?php if($event_detail['max'] > 0): ?>/ <?php echo ($event_detail["max"]); endif; ?>人</p>
                    <p>活动时间：<?php echo (date('Y/m/d h:i',$event_detail["start_time"])); ?> - <?php echo (date('Y/m/d h:i',$event_detail["end_time"])); ?></p>
                    <p>报名截止：<?php echo (date('Y/m/d h:i',$event_detail["deadline"])); ?></p>
                    <p>活动地点：<?php echo ($event_detail["address"]); ?></p>
                    <?php if($isJoin): ?><a class="btn-big join_btn" style="background:#ffb533" href="javascript:;">已报名</a>
                    <?php elseif($event_detail['deadline'] < time()): ?>
                    <a class="btn-big join_btn" style="background:#ccc" href="javascript:;">结束报名</a>
                    <?php elseif($event_detail['max'] > 0 && $event_detail['join_count'] >= $event_detail['max']): ?>
                    <a class="btn-big join_btn" style="background:#ccc" href="javascript:;">已报满</a>
                    <?php else: ?>
                    	 <a class="btn-big join_btn" href="javascript:;" onClick="joinEvent();">参加活动</a><?php endif; ?>
                </div>
                <div class="line"><em></em></div>
            </div>
            <script type="text/javascript">
			var eventAttrs = <?php echo $event_detail['attrs']?json_encode($event_detail['attrs']):''; ?>;
			var event_id = '<?php echo ($event_detail["event_id"]); ?>';
			function joinEvent(){
				var attrHtml = '';
				if(eventAttrs!=''){
					for(var i=0;i<eventAttrs.length;i++){
						var json = eventAttrs[i];
						if(json.type=='text'){
							attrHtml +='<div class="form_row"><p>'+json.label+'</p><div class="row"><input type="text" name="'+json.name+'"/></div></div>';
						}else if(json.type=='radio' || json.type=='checkbox'){
							var selAttrHtml = '';
							for(var j=0;j<json.extra.length;j++){
								var json2 = json.extra[j];
								selAttrHtml += '<label for="attr_value_'+i+'_'+j+'"><input type="'+json.type+'" value="'+j+'" name="'+json.name+'" id="attr_value_'+i+'_'+j+'"/><em></em>'+json2+'</label>';
							}
							var typeTxt = json.type=='radio'?'<span> (单选)</span>':'<span> (多选)</span>';
							attrHtml +='<div class="form_row form_row_check"><p>'+json.label+typeTxt+'</p><div class="row">'+selAttrHtml+'</div></div>';
							
						}
					}
				}
				var joinHtml = $('<div class="join_event_dialog">'+
				'<form class="join_form">'+
					'<a class="close" href="javascript:;"></a>'+
					'<p class="title">我要参加</p>'+
					'<div class="form_row"><p>真实姓名<em>*</em></p><div class="row"><input type="text" name="name"/></div></div>'+
					'<div class="form_row"><p>手机<em>*</em></p><div class="row"><input type="text" name="phone"/></div></div>'+
					attrHtml+
					'<input type="hidden" name="event_id" value="'+event_id+'"/>'+
					'<a class="btn-big" id="submitJoinBtn" href="javascript:;">提交</a>'+
				'</form>'+
				'</div>');
				$('body').append(joinHtml);
				$('.join_event_dialog').height($('#layout').height()+50);	
				var dialogTop = $(window).scrollTop()+($('body').height()-$('.join_event_dialog .join_form').height()-32)/2;
				if($('.join_event_dialog .join_form').height()>=$(window).height()){
					dialogTop = 0;
					$('body').css('min-height',$('.join_event_dialog .join_form').height())
				}
				$('.join_event_dialog .join_form').css('top',dialogTop);
				$('.close',joinHtml).click(function(){
					joinHtml.remove();
				})
				$('#submitJoinBtn',joinHtml).click(function(){
					var name = $('input[name="name"]',joinHtml).val();
					var phone = $('input[name="phone"]',joinHtml).val();
					if(name==''){
						 $.ui.showMask("请填写真实姓名！", true);
						 return;
					}
					if(phone==''){
						 $.ui.showMask("请填写手机！", true);
						 return;
					}
					$.post(U('doJoinEvent'), $('.join_form',joinHtml).serializeArray(), function(txt) {
						if(1 == txt.status ) {
							$.ui.showMask('提交成功',true);
							setTimeout(function(){
								window.location.reload();
							},1500);
						  } else {
							$.ui.showMask(txt.info);
						  }
					  }, 'json');
				})
			}
			</script><?php endif; ?>
      <div class="pc_text content_imgs" id="detail_content_img" >
      	<?php echo ($post_detail["content"]); ?><br/>
      	
      </div>
      <div class="m_attach">
      	  <?php if($post_detail['attachInfo']){ ?>
          <ul class="attach_list mt10">
            <?php if(is_array($post_detail["attachInfo"])): $i = 0; $__LIST__ = $post_detail["attachInfo"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> 
               <!-- onclick="openAttachAction('<?php echo U('widget/Upload/down',array('attach_id'=>$vo['attach_id']));?>');" -->
               
               <a style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis" href="javascript:;" onclick="openAttachAction('<?php echo getAttachUrlByAttachId($vo[attach_id]);?>','<?php echo ($vo["attach_name"]); ?>','<?php echo ($vo["attach_id"]); ?>','<?php echo ($post_detail["post_id"]); ?>');">
              	<i class="ico-attach-small ico-<?php echo ($vo["extension"]); ?>-small"></i>			
              	<span class="name"><?php echo ($vo["attach_name"]); ?></span>
                <!--<span class="tips">(<?php echo (byte_format($vo["size"])); ?>)</span>-->
              </a>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <?php } ?>
      </div>
      </div>
      <div class="pc_reply">
        <!--评论列表-->
        <div class="weiba-com" id="commentlist_<?php echo ($post_id); ?>">
          <?php if(is_array($postcomment["list_data"])): $k = 0; $__LIST__ = $postcomment["list_data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="list" id="item_<?php echo ($vo["reply_id"]); ?>">
              <dl model-node="comment_list">
                <dt><a href="<?php echo addons_url('Weiba://Wap/profile', array('uid'=>$vo['user_info']['uid']));?>"><img width="50" height="50" src="<?php echo ($vo["user_info"]["headimgurl"]); ?>"></a><?php if($vo['user_info']['group_icon_only']): ?><a href="javascript:;" title="<?php echo ($vo['user_info']['group_icon_only']['user_group_name']); ?>" class="group_icon_only"><img alt="<?php echo ($vo['user_info']['group_icon_only']['user_group_name']); ?>" src="<?php echo ($vo['user_info']['group_icon_only']['user_group_icon_url']); ?>" ></a><?php endif; ?></dt>
                <dd>
                  <p class="cont mb5 name_p"> <a href="<?php echo addons_url('Weiba://Wap/profile', array('uid'=>$vo['user_info']['uid']));?>"><?php echo ($vo["user_info"]["nickname"]); ?></a>
                    <span class="floor">
                    <?php $page = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1; ?>
                    <?php echo ($k+(($page-1)*$limit)); ?>楼</span> </p>
                  <p><span class="date"><?php echo (time_format($vo["ctime"])); ?></span></p>
                  <?php if($vo['replyData']): ?><div class="to_reply_div">
                        <p class="reply_p">引用：<?php echo ($vo["replyData"]["user_info"]["nickname"]); ?>&nbsp;&nbsp;&nbsp;<?php echo (time_formate($vo["replyData"]["ctime"])); ?></p>
                        <?php echo ($vo["replyData"]["content"]); ?>
                      </div><?php endif; ?>
                  <p class="det-c"><?php echo ($vo["content"]); ?></p>
                  
                </dd>
              </dl>
        
              
              <p class="info textR"><span> 
              
              <?php $isdel=0;if( $vo['user_info']['uid'] == $mid){ $isdel=1; ?><span class="c_ico w3g_reply_del"><a href="javascript:void(0);" event-node="reply_del" event-args="reply_id=<?php echo ($vo["reply_id"]); ?>"></a></span><?php } ?>
             <span class="c_ico w3g_reply"><a href="javascript:void(0)" onclick="showreplyDialog({'tempp':'{}','weiba_id':<?php echo ($weiba_id); ?>,'post_id':<?php echo ($post_detail["id"]); ?>,'post_uid':<?php echo ($post_detail["post_uid"]); ?>,'to_reply_id':<?php echo ($vo["reply_id"]); ?>,'to_uid':<?php echo ($vo["uid"]); ?>,'to_comment_uname':'<?php echo ($vo["user_info"]["nickname"]); ?>','feed_id':0,'comment_id':<?php echo ($vo["comment_id"]); ?>,'addtoend':'<?php echo ($addtoend); ?>'});"></a></span>
             	<!--
                <span class="c_ico w3g_digg"><?php echo W('ReplyDigg', array('row_id'=>$vo['reply_id'], 'digg_count'=>$vo['digg_count'], diggArr=>$diggArr,'widget_appname'=>'weiba','tpl'=>'w3g'));?> </span>
                -->
                
                </span></p>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        
        <!--页码-->
        <?php if(($list["html"]) != ""): ?><!--<div id="page" class="page" style="padding: 10px 0px 20px 0px;"> <?php echo ($list["html"]); ?> </div>-->
          <a id="load_page_btn" href="javascript:;" data-page="<?php echo ($postcomment["totalPages"]); ?>" data-url="<?php echo addons_url('Weiba://Wap/postDetail',array('post_id'=>$post_id));?>">下一页</a>
           <div class="no_more_data">没有更多数据了</div>
           <div class="page_loading">正在加载中...</div>
           <script>
            loadPageByMore('#commentlist_<?php echo ($post_id); ?>');
            </script><?php endif; ?>
        <!--页码/end--> 
    
  </div>
</div>

<!--大图相册的效果-->
<style type="text/css">
#topcontrol{ display:none;}
#content .postDetail{ padding-bottom:3em;}
/*大图相册的效果*/
.device {
  display:none;position: absolute;top: 0px; bottom:44px;left: 0px;width: 100%;height: 100%;background-color: #333;z-index: 10009;
}
.device .showImg{position: relative;}
.device .showImg_t{height: 38px;line-height: 38px;text-align: center;background-color: #000;color: #fff;font-size: 14px;padding: 0 20px;}
.device .showImg_close{position: absolute;right: 20px;top: 10px; color: #fff;}
.device .swiper-container {
  width: 100%;
}
.device .content-slide {
  padding: 20px;  color: #fff;
}
.device .title {
  font-size: 25px;  margin-bottom: 10px;
}
.device .pagination {
  position: absolute; left: 0;  text-align: center; bottom: 50px;  width: 100%;  z-index: 99999;
}
.swiper-slide{display: box; display: -webkit-box; -webkit-box-pack:center; -webkit-box-align:center;}
.device .swiper-pagination-switch {
  display: inline-block;  width: 12px;  height: 12px; border-radius:6px; background: #ccc; margin: 0 3px;  cursor: pointer;}
.device .swiper-active-switch {
  background: #09b092;
}
</style>

<div class="device">
  <div class="showImg">
    <a class="showImg_close" href="javascript:void(0)" onClick="closeBox()">关闭</a>
    <h1 class="showImg_t">图片浏览</h1>
    <div class="swiper-container">
      <div class="swiper-wrapper" id="content_img_list"> 
        <!--        <div class="swiper-slide">
            <img src="<?php echo ($vo["img_url"]); ?>" alt="<?php echo ($vo["ad_name"]); ?>" width="100%" height="198" />
          </div>--> 
        
      </div>
    </div>
    <div class="pagination"></div>
  </div>
</div>
</div>
<script src="<?php echo ADDON_PUBLIC_PATH;?>/sendAttach.js?v=<?php echo SITE_VERSION;?>"></script>
<script>
var loginMid =  "<?php echo ($mid); ?>";
$(".pc_reply a[event-node='reply_del']").click(function(){
    if(!confirm("确认删除此回复？")){
        return false;
    }
    var _this = $(this);
    var data  = _this.attr('event-args')+'&widget_appname=weiba';
    $.post("<?php echo addons_url('Weiba://Wap/delReply');?>", data, function(result){
		//console.log(result==1)
        if(result == '1'){
            _this.parents('.list').remove();
        }else{
            $.ui.showMask("删除失败，请稍候再试！", true);
        }
    });
    return false;
});
$(".pc_reply a[event-node='reply_reply']").click(function(){
    window.location.href=U('reply')+'&'+$(this).attr('event-args');
});

function addDigg(id){
	if(loginMid>0){
		var span = $('#digg'+id);
		var data = {
			widget_appname: 'weiba',
			row_id:id
		};
		$.post('<?php echo U("widget/ReplyDigg/addDigg");?>', data, function(result){
			if(result.status == 1){
				var num = parseInt(span.attr('rel'))+1;
				span.attr('rel', num).html('<a href="javascript:;" class="like-h digg-like-yes" onclick="delDigg('+id+')">'+num+'</a>');
			}else{
				$.ui.showMask("点赞失败，请稍候再试！", true);
			}
		}, 'json');
	}else{
		$.ui.showMask("请先登录", true);
		setTimeout(function(){
			window.location.href = "<?php echo U('w3g/Public/login');?>";		
		},1500)
	}
}
function delDigg(id){
    var span = $('#digg'+id);
    var data = {
        widget_appname: 'weiba',
        row_id:id
    };
    $.post('<?php echo U("widget/ReplyDigg/delDigg");?>', data, function(result){
        if(result.status == 1){
            var num = parseInt(span.attr('rel'))-1;
            var zan = num>0?num:'';
            span.attr('rel', num).html('<a href="javascript:;" onclick="addDigg('+id+')">'+zan+'</a>');
        }else{
            $.ui.showMask("取消失败，请稍候再试！", true);
        }
    }, 'json');
}
</script>


    </div><!--content-->
</div><!--main-->
        <script>
            (function(){
                TS.cache.profile = {
                    uid:'<?php echo ($profile["uid"]); ?>',
                    uname:'<?php echo ($profile["uname"]); ?>',
                    email:'<?php echo ($profile["email"]); ?>',
                    avatar_original:'<?php echo ($profile["avatar_original"]); ?>',
                    avatar_small:'<?php echo ($profile["avatar_small"]); ?>'
                };
//                $(document).on("touchmove",".pic-view-img",function(e){
//                        console.log(e);
//                });
            })();

        </script>

</div>
	<!--
    <div class="postentry">
        <?php if(MODULE_NAME == 'Index' && in_array(ACTION_NAME,array('index','rec','fri_weibo','doSearch'))){ ?>
            <a href="#new-weibo" id="postentry">&nbsp;</a>
        <?php }elseif(MODULE_NAME == 'Channel'){ ?>
            <a href="#new-channel-weibo" id="postentry">&nbsp;</a>
        <?php }elseif(MODULE_NAME == 'Weiba'){ ?>
            <?php if(ACTION_NAME == 'postDetail'){ ?>
            <a href="<?php echo U('reply', array('post_id'=>intval($_GET['post_id'])));?>" id="postentry">&nbsp;</a>
            <?php }elseif(!in_array(ACTION_NAME, array('reply', 'post'))){ ?>
            <a href="<?php echo U('post', array('weiba_id'=>intval($_GET['weiba_id'])));?>" id="postentry">&nbsp;</a>
            <?php } ?>
        <?php } ?>
    </div>
    -->
    <div id="pure-shadow"></div>
    <div id="footer"></div>
    <div id="custom"></div>
    <?php if($is_post_detail == 1){ ?>
    	<!-- 详情底部兰 -->
        <div class="weiba_detail_bar">
            <a href="javascript:;" onclick="showreplyDialog();"><i class="comment"></i><span>评论</span></a>
            <a href="javascript:;" onclick="doPostDigg()">
            	<div id="post-zan" class="<?php if(($is_digg) == "1"): ?>iszan<?php endif; ?>"><i class="zan"></i><em><?php if(($post_detail[praise]) > "0"): echo ($post_detail["praise"]); endif; ?></em></div><span class="mcount">点赞</span>
            </a>
            <?php if($isWeixin): ?><a onclick="ui.showShareTips();" href="javascript:;"><i class="share"></i><span>分享</span></a><?php endif; ?>
        </div>
        <div class="reply_dialog">
            <div class="dialog">
                <div class="textarea"><textarea autofocus name="weiba-reply-textarea" id="weiba-reply-textarea" placeholder="内容,2-70个字"></textarea></div>
                <div class="bar">
                    <a id="replybtn" class="btn" href="javascript:;" onclick="submitReply();">发送</a>
                    <a class="btn btn_border" href="javascript:;" onclick="hidereplyDialog();">取消</a>
                    
                </div>
            </div>
        </div> 
        <script type="text/javascript">
			
        	function showreplyDialog(data){
				$('.reply_dialog').height($('#layout').height()+50);
				$('.reply_dialog .dialog').css('top',$(window).scrollTop()+50);
				if('<?php echo ($mid); ?>'>0){
					$('.reply_dialog').show();
					$('.reply_dialog textarea').focus();
					if(data){
						window.replyData = data;
						$('#weiba-reply-textarea').attr('placeholder','回复'+window.replyData.to_comment_uname);
						//console.log(window.replyData)
					}else{
						window.replyData = null;
					}
				}else{
					$.ui.showMask("请先登录", true);
					setTimeout(function(){
						window.location.href = "<?php echo U('w3g/Public/login');?>";		
					},1500)
				}
				//window.location.href = "<?php echo U('reply', array('post_id'=>intval($_GET['post_id'])));?>";
			}
			function hidereplyDialog(){
				$('.reply_dialog').hide();
			}
			function submitReply(){
					var url = "<?php echo addons_url('Weiba://Wap/addReply');?>";
					var data = {};
					if(window.replyData){
						data.weiba_id = window.replyData.weiba_id;
						data.post_id = window.replyData.post_id;
						data.post_uid = window.replyData.post_uid;
						data.to_reply_id = window.replyData.to_reply_id;
						data.to_uid = window.replyData.to_uid;
						data.feed_id = window.replyData.feed_id;
						data.list_count= 0;
						
					}else{
						data.weiba_id = '<?php echo $post_detail["weiba_id"]; ?>';
						data.post_id = '<?php echo $post_detail["id"]; ?>';
						data.post_uid = '<?php echo $post_detail["post_uid"]; ?>';
						data.to_reply_id = data.reply_id?data.reply_id:0;
						data.to_uid = data.uid?data.uid:0;
						data.feed_id = '<?php echo $post_detail["feed_id"]; ?>';
						data.list_count= '<?php echo $list_count; ?>';
					}
					data.widget_appname = 'weiba';
					data.content = '';
					data.ifShareFeed = '0';
					data.attach_id = '0';
					var content = $.trim($('#weiba-reply-textarea').val());
					if(!content){
						$.ui.showMask("请输入内容！", true);
						return false;
					}
					if(content.length<2 || content.length>70){
						$.ui.showMask("评论限制2-70个字！", true);
						return false;
					}
					data.content = content;
					
					
					$.post(url, data, function(result){
						if(result.status == 1){
							hidereplyDialog();
							$.ui.showMask("评论成功！", true);
							//setTimeout(function(){
								window.location.href = "<?php echo addons_url('Weiba://Wap/postDetail', array('post_id'=>$post_detail['id']));?>";
							//}, 1200);
						}else{
							$.ui.showMask("回复失败，请稍候再试！", true);
						}
					}, 'json');
						
			}
			function doPostDigg(){
				if('<?php echo ($mid); ?>'<=0){
					$.ui.showMask("请先登录", true);
					setTimeout(function(){
						window.location.href = "<?php echo U('w3g/Public/login');?>";		
					},1500)
				}else{
				var type = $('#post-zan').hasClass('iszan')?0:1;
				if(type==1){
					var url = "<?php echo U('addPostDigg');?>";
				}else{
					var url = "<?php echo U('delPostDigg');?>";
				}
				
				var data = {};
					data.row_id = '<?php echo $post_detail["post_id"]; ?>';
				$.post(url, data,function(result){
					if(result == 1){
						if(type==1){
							$('#post-zan').addClass('iszan');
							if($('#post-zan em').text()==""){
								var count = 0;
							}else{
								var count = parseInt($('#post-zan em').text());
							}
							$('#post-zan em').text(count+1);
						}else{
							$('#post-zan').removeClass('iszan');
							var count = parseInt($('#post-zan em').text());
							if(count-1>0){
								$('#post-zan em').text(count-1);
							}else{
								$('#post-zan em').text('');
							}
						}
					}else{
						
					}
				}, 'json');
				}
			}
        </script>    
    <?php } ?>
    <!-- 统计代码-->
<div id="site_analytics_code" style="display:none;"> <?php echo (base64_decode($site["site_analytics_code"])); ?> </div>
<?php if(($site["site_online_count"]) == "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace&city=<?php echo session('city');?>"></script><?php endif; ?>
</body>
</html>