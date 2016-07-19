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
<style type="text/css">
  body{background-color: #f1f1f1;}
</style>
<div id="content">
  <div id="weiba" data-title="论坛" class="panel" data-selected="true"  data-menu="msgmenu" style="padding:0;">
    <header>
        <div id="header-buttons">
            <div class="head_left">
                    <a class="head_logo" href="/"><img src="<?php echo ADDON_PUBLIC_PATH;?>/sys/logo.png?v=<?php echo SITE_VERSION;?>"/></a>
                    
                </div>
             <div id="otherLink" style="right:0">
                <a id="writeLink" class="header-menu-link" href="<?php echo U('post');?>">发帖</a>
                <a id="myLink" class="header-menu-link msg_tips_container" href="<?php echo addons_url('Weiba://Wap/my');?>">我<em class="msg"></em></a>
            </div>
        </div>
        
    </header>
    <div class="mainWeiba">
      
      <div class="weiba_forumlist">
      	 <?php if(empty($weibacate)): ?>
         	<div class="empty_list">暂时没有版块!</div>
         <?php endif; ?>
         <?php if(is_array($weibacate)): $i = 0; $__LIST__ = $weibacate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i; if(empty($cate['weibalist'])):continue;endif; ?>
              <div class="section">
              <a name="<?php echo ($cate["name"]); ?>"></a>
                <div class="block_title">
                	<p><?php echo ($cate["name"]); ?></p>
                </div>
                <div class="slc clearfix">
                  <div class="bklist">
                    <?php if(is_array($cate["weibalist"])): $i = 0; $__LIST__ = $cate["weibalist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="bk" href="<?php echo addons_url('Weiba://Wap/detail',array('weiba_id'=>$vo['id']));?>">
                        <dl>
                          <dt>
                            <span>
                              <img class="w-h-img" width="100%" height="auto" src="<?php echo (get_cover_url($vo["logo"])); ?>">
                            <span>
                          </dt>
                          <dd>
                            <h3>
                              <span title="<?php echo ($vo["weiba_name"]); ?>" >   <?php echo ($vo["weiba_name"]); ?>
                              </span>
                            </h3>
                            <p class="intro"><?php echo ($vo["intro"]); ?></p>
                          </dd>
                        </dl>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>
                  </div>
                </div>
              </div><?php endforeach; endif; else: echo "" ;endif; ?>
          <div style="height:75px;"></div>
      </div>
      <script>
        $(function(){
        	var arrow_t = "<?php echo ADDON_PUBLIC_PATH;?>/sys/arrowB.png";
        	var arrow_t0 = "<?php echo ADDON_PUBLIC_PATH;?>/sys/arrowT.png";
        	
           $('.slt').click(function(){
        	   var cla = $(this).find('span').attr('title');
        	   if(cla=='收起'){
        		   $(this).find('span').attr('title', '展开');
        		   $(this).find('img').attr('src', arrow_t0);
        		   $(this).next().hide();
        	   }else{
        		   $(this).find('span').attr('title', '收起');
        		   $(this).find('img').attr('src', arrow_t);
        		   $(this).next().show();		   
        	   }
           });

        })
      </script>
    </div>
</div>


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