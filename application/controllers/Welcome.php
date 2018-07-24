<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		//如果定义了构造函数,需要调用父类的构造函数
		parent::__construct();		//调用父类构造函数;

	}
	//控制器入口
	public function index()
	{
		//加载辅助函数
		$this->load->helper('url');
		
		//跳转到home子目录下的welcome控制器
		redirect('http://www.ts.com/home/index');
	}
}
