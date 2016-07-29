<?php
        	
namespace Addons\IdouDaoguo\Model;
use Home\Model\WeixinModel;
        	
/**
 * IdouDaoguo的微信模型
 */
class WeixinAddonModel extends WeixinModel{
	function reply($dataArr, $keywordArr = array()) {
		$config = getAddonConfig ( 'IdouDaoguo' ); // 获取后台插件的配置参数	
		//dump($config);
		$articles[0] = array(
			'Title' => '岛国么么哒',
			'Description' => '看看你认识几个岛国精英',
			'PicUrl' => 'http://7xp0e8.com1.z0.glb.clouddn.com/u=1054778629,4219145614&fm=21&gp=0.jpg',
			'Url' => addons_url('IdouDaoguo://IdouDaoguo/index', array('token'=>get_token()))
		);
		$this->replyText ("lalalala");
	}
}
        	