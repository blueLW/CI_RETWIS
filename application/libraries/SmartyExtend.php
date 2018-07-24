<?php
/*
* ci扩展smarty类 smarty版本(3.1.32)
* author:LW
* time:2018/7/3
*/

defined('BASEPATH') OR exit('No direct script access allowed');
require_once('smarty/Smarty.class.php');

class SmartyExtend extends Smarty {
	protected $ci;
	private $config;
	public function __construct(){
		parent::__construct();
		$this->ci = & get_instance();				//获取全局CI资源
		$this->ci->config->load('smarty',TRUE);		//加载smarty配置文件

		//获取配置参数
		$this->config = $this->ci->config->item('default','smarty');

		//设置相关配置
		$this->debugging =  $this->config['debug'];			     //调试模式
		$this->caching = $this->config['caching'];			     //缓存
		$this->cache_lifetime = $this->config['lefttime'];       //缓存周期
		$this->left_delimiter=$this->config['left_delimiter'];   //左定界符
		$this->right_delimiter=$this->config['right_delimiter']; //右定界符
		$this->setTemplateDir($this->config['template_dir']);    //模板目录
		$this->setCompileDir($this->config['compile_dir']);     //模板缓存文件目录
		$this->setConfigDir($this->config['config_dir']);       //配置目录
		$this->setCacheDir($this->config['cache_dir']);         //模板缓存目录

	}

	//扩展执行成功提示并跳转函数
	/*
	* @param string $url  跳转的地址
	* @param string $msg  提示信息
	* @author LW
	* @time 2018/7/4
	*/
	public function success($url,$msg){
		$this->assign('url',$url);					//分配地址
		$this->assign('msg',$msg);					//分配提示信息
		$this->display('public/notic.html');
	}
	//扩展执行失败提示并跳转函数
	/*
	* @param string $url  跳转的地址
	* @param string $msg  提示信息
	* @author LW
	* @time 2018/7/4
	*/
	public function error($url,$msg){
		$this->assign('url',$url);					//分配地址
		$this->assign('msg',$msg);					//分配提示信息
		$this->display('public/notic.html');
	}
}
