<?php
/*
* demo控制器,展示了smarty类库,和redis类库的使用
* author:LW
* time:2018/7/3
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	public function __construct(){
		//如果定义了构造函数,需要调用父类的构造函数
		parent::__construct();					//调用父类构造函数;
		$this->load->library('SmartyExtend');	//加载smarty扩展类
		$this->load->library('UserRedis');		//加载userredis类

	}

	//index控制器
	public function index()
	{
		//调用扩展类的getLink()方法获取redis连接资源
		$redis = $this->userredis->getLink();

		//使用phpredis的get()方法获取字符串类型的值
		$key = '123';
		$value = $redis -> get($key);

		//关闭连接资源	
		$this->userredis->unconnect();

		//把变量分配到模板
		$this->smartyextend->assign('name',$value);

		//加载模板
		$this->smartyextend->display('demo/demo.html');
	}

	//通过model获取数据
	public function get(){
		//加载模型
		$this->load->model('demo/demo_model');
		//调用模型中的方法
		$result = $this->demo_model->getContent(1);

		//分配结果到模板
		$this->smartyextend->assign('data',$result);

		//加载模板
		$this->smartyextend->display('demo/demo_model.html');
		//var_dump($result);
	}
}
