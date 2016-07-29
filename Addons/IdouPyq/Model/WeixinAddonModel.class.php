<?php
        	
namespace Addons\IdouPyq\Model;
use Home\Model\WeixinModel;
        	
/**
 * IdouPyq的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		// $config = getAddonConfig ( 'IdouPyq' ); // 获取后台插件的配置参数	
		$param ['token'] = get_token ();
		$param ['openid'] = get_openid ();
		$url = addons_url ( 'IdouPyq://IdouPyq/index', $param );
		//dump($config);
		$articles[0] = array(
			'Title' => '我的土豪朋友圈',
			'Description' => '土豪秀优越，引爆朋友圈',
			'PicUrl' => 'http://img.ui.cn/data/file/7/3/0/202037.png',
			'Url' => $url
		);
		replyNews($articles);
	}
}
        	