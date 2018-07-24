<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
        protected $userInfo;
	public function __construct(){
	       //如果定义了构造函数,需要调用父类的构造函数
	       parent::__construct();		//调用父类构造函数;
	       $this->load->library('SmartyExtend');	//加载smarty扩展类
	       $this->load->library('UserRedis');	//加载userredis类
	       $this->load->helper('cookie');		//载入cookie类
	       //引入表单验证类
	       $this->load->helper(array('form', 'url'));
               $this->load->library('form_validation');
               //跳过注册环节
               if($_SERVER['REQUEST_URI']!='/home/index/register'){
                        $this->checkLogin();               //检查是否登录
               }   
	}

        //校验用户是否登录
        public function checkLogin(){
                $redis = $this->userredis->getLink();
                $auth  = $this->input->cookie('auth');
                $url = base_url('/home/index');         //主页URL

                if(!$auth){
                        if($_SERVER['REQUEST_URI']=='/home/index'){
                                $this->smartyextend->display('home/home.html');
                                die;
                        }else{
                           $msg = '请先登录!';
                           $this->smartyextend->error($url,$msg);
                           die;
                        }
                }
                //根据auth去读取用户信息进行校验
                $redis = $this->userredis->getLink();
                $userid = $redis -> hGet('auths',$auth);
                $userInfo = $redis -> hGetAll('user:'.$userid);
                if (!$userInfo || $auth != $userInfo['auth']){
                        delete_cookie('auth');
                        $msg = '登录校验失败,请从新登录!';
                        $this->smartyextend->error($url,$msg);
                        die;
                }else{
                        $this->userInfo = $userInfo;
                        $this->userInfo['userid'] = $userid;
                        if($_SERVER['REQUEST_URI']=='/home/index'){
                          redirect(base_url('home/center'));
                        }
                }
        }




}
