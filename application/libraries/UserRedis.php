<?php
/*
* UserRedis连接类
* author:LW
* time:2018/7/3
*/

if(!defined('BASEPATH')) EXIT('No direct script asscess allowed');

class UserRedis {
  protected $ci,$config;
  protected static $redisLink=NULL;
  public function __construct(){

    $this->ci = & get_instance();
    $this->ci->load->config('redis',TRUE);//加载smarty的配置文件
    $this->config = $this->ci->config->item('default','redis');//默认配置
    $this->connect_redis();

  }

  //连接redis资源
  private function connect_redis(){
    self::$redisLink = new Redis();
    self::$redisLink->connect($this->config['hostname'],$this->config['port']);
    //验证密码
    if($this->config['auth']){
        self::$redisLink->auth($this->config['auth']);
    }
    //选择数据库(默认0号库)
    if(isset($this->config['index'])){
        self::$redisLink->select($this->config['index']);
    }else{
        self::$redisLink->select(0);
    }
  }
  //关闭连接
  public function unconnect(){
    return self::$redisLink ->close();
  }

  //获取redis资源
  public function getLink(){
    if (self::$redisLink){
      return self::$redisLink;
    }else{
      $this->connect_redis();
      return self::$redisLink;
    }
  }


}