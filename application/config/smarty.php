<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//设置配置项
$config = array(
	'default' => array(
		'template_dir' => APPPATH . 'views',				//模板路径
		'compile_dir'  => FCPATH . 'smarty/templates_c', 	//模板缓存路径
		'cache_dir'    => FCPATH . 'smarty/cache',		 	//缓存路径
		'config_dir'   => FCPATH . 'smarty/configs',		//模板配置路径
		'caching'	   => FALSE,							//关闭缓存
		'lefttime'	   => 60,								//缓存时间(默认60秒)
		'left_delimiter'=> '<{',							//左定界符
		'right_delimiter'=> '}>',							//右定界符
		'debug'			=> false,							//调试模式
	),
);
