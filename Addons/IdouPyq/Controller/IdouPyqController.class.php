<?php

namespace Addons\IdouPyq\Controller;
use Home\Controller\AddonsController;

class IdouPyqController extends AddonsController{

	/**
	 * 土豪朋友圈首页，根据不同的参数，调用不同的朋友圈模板显示
	 * @author 艾逗笔<765532665@qq.com>
	 */
	public function index() {
		if ($_GET['origin_uid']) {	// 查看别人分享的朋友圈
			$userInfo = getUserInfo($_GET['origin_uid']);
		} else {
			$userInfo = getUserInfo(get_openid());	// 查看自己的朋友圈
		}

		/*$choose['openid'] = get_openid();


		$Data = M('follower_info')->where($choose)->select();

		if($Data) {
			$userInfo['nickname'] = $Data[0]['nickname'];
			$userInfo['headimgurl'] = $Data[0]['headimgurl'];
		} */
		
		$this->assign('userInfo', $userInfo);
		
		$template = $_GET['template'] ? $_GET['template'] : 'template1';
		$this->display($template);
	}

}
