<?php
/* 处理用户登录和退出
*  @author:LW
*  @time:2018/7/5
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {
	public function __construct(){
	//如果定义了构造函数,需要调用父类的构造函数
	  parent::__construct();	//调用父类构造函数;
          $this->load->library('SmartyExtend'); //加载smarty扩展类
          $this->load->library('UserRedis');    //加载redis扩展类
          $this->load->helper('cookie');        //载入cookie辅助类
          //引入表单验证类
          $this->load->helper(array('form','url'));
          $this->load->library('form_validation');
          $this->form_validation->set_rules('username', 'Username', 'required');
          $this->form_validation->set_rules('password', 'Password', 'required');
	}

    //登录方法
	public function login(){
        $url = base_url('home/Index');

        if($this->form_validation->run() === false){
            $msg = '用户名或密码不能为空!';
            $this->smartyextend->error($url,$msg);
            die;
        }

        $data = $this->input->post();
        $redis = $this->userredis->getLink();
        $userId = $redis -> hGet('users',$data['username']);
        $userInfo = $redis->hGetAll('user:'.$userId);

        if($userInfo['password'] != $data['password']){
            $msg = '密码不正确!';
            $this->smartyextend->error($url,$msg);
            die;
        }
        $this->input->set_cookie('auth',$userInfo['auth'],time()+3600);
        $url = base_url('home/center');
        $msg = '登录成功!';
        $this->smartyextend->success($url,$msg);
	}

	//退出登录
	public function loginOut(){
        //清除cookie
        delete_cookie('auth');
        $url = base_url('home/index');
        $msg = '退出成功!';
        $this->smartyextend->success($url,$msg);
    }

}
