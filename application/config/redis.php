<?php
/*
* redis配置文件
* author:LW
* time:2018/7/3
*/
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'default' => array(
		'hostname' => '127.0.0.1',		//默认ip
		'port'     => '6379',			//默认端口
		'auth'     => '',				//默认访问密码
		'index'    => '0',				//默认0号库
	),
);
