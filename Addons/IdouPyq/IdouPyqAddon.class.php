<?php

namespace Addons\IdouPyq;
use Common\Controller\Addon;

/**
 * 土豪朋友圈插件
 * @author 艾逗笔
 */

    class IdouPyqAddon extends Addon{

        public $info = array(
            'name'=>'IdouPyq',
            'title'=>'土豪朋友圈',
            'description'=>'获取微信用户昵称和头像，生成虚拟朋友圈。土豪秀优越，引爆朋友圈。',
            'status'=>1,
            'author'=>'阿追',
            'version'=>'1.0',
            'has_adminlist'=>0
        );

	public function install() {
		$install_sql = './Addons/IdouPyq/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/IdouPyq/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }