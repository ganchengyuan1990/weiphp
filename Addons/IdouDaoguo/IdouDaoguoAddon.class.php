<?php

namespace Addons\IdouDaoguo;
use Common\Controller\Addon;

/**
 * 岛国么么哒插件
 * @author 洛杉矶豪哥
 */

    class IdouDaoguoAddon extends Addon{

        public $info = array(
            'name'=>'IdouDaoguo',
            'title'=>'岛国么么哒',
            'description'=>'这是一款朋友圈小游戏',
            'status'=>1,
            'author'=>'阿追',
            'version'=>'1.0',
            'has_adminlist'=>0
        );

	public function install() {
		$install_sql = './Addons/IdouDaoguo/install.sql';
		if (file_exists ( $install_sql )) {
			execute_sql_file ( $install_sql );
		}
		return true;
	}
	public function uninstall() {
		$uninstall_sql = './Addons/IdouDaoguo/uninstall.sql';
		if (file_exists ( $uninstall_sql )) {
			execute_sql_file ( $uninstall_sql );
		}
		return true;
	}

        //实现的weixin钩子方法
        public function weixin($param){

        }

    }