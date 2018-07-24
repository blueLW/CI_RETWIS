<?php
/*****/
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers\home\Common.php';

class Index extends Common {
	public function __construct(){
		//如果定义了构造函数,需要调用父类的构造函数
		parent::__construct();		//调用父类构造函数;
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password2', 'required');

	}

	public function index(){
		$this->smartyextend->display('home/home.html');
	}

	//注册新用户
	public function register(){
		//验证表单
        if($this->form_validation->run() == FALSE){
        	//返回表单页面
        	$url = base_url('/home/index');
        	$msg = '您填写的信息有误,请从新填写!';
        	$this->smartyextend->error($url,$msg);
        	die;
        }else{
        	//将用户信息写入redis中
        	$redis = $this->userredis->getLink();       //获取redis资源
        	$data = $this->input->post();				//接收数据
        	//判断用户名是否被使用
        	if ($redis->hget('users',$data['username'])){
        		$url = base_url('/home/index');
        		$msg = '用户名已被使用,请从新填写!';
        		$this->smartyextend->success($url,$msg);
        		die;
        	}
        	//校验密码
        	if ($data['password']!=$data['password2']){
        	    $url = base_url('/home/index');
        		$msg = '两次密码不一致,请从新填写!';
        		$this->smartyextend->success($url,$msg);
        		die;
        	}
        	$time = time();
        	$userid = $redis->incr('global:userid');//自增长的ID
        	$redis->hset('users',$data['username'],$userid);//保存用户信息(users)
        	$auth = md5($data['username'].$userid.$time);	//登录校验字符串
        	$arr=array(
        		'password'=>$data['password'],
        		'username'=>$data['username'],
        		'auth'=>$auth,
        	);
        	$redis->hMset('user:'.$userid,$arr);			//保存详细信息
        	$redis->hset('auths',$auth,$userid);			//保存校验字符和ID
        	$redis->zadd('user_add_time',$time,$data['username']); //使用时间来排序用户
        	set_cookie('auth',$auth,$time+3600);	//设置cookie1个小时
                //保存新注册的50个用户(newRegisterUser表 type list)
                $redis->lPush('newRegisterUser',$userid);
                $redis->ltrim('newRegisterUser',0,49);  //保留最新的50个

        	//显示成功页面
        	$url = base_url('/home/center');
        	$msg = '注册成功,开始爆发你的小宇宙吧!^v^';
        	$this->smartyextend->success($url,$msg);
        }
	}

}
