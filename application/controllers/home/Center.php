<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers\home\Common.php';

class Center extends Common{
	public function __construct(){
		//如果定义了构造函数,需要调用父类的构造函数
		parent::__construct();		//调用父类构造函数;

	}
	public function index(){
		//读取用户自己发布的微博和所关注的人推送的消息
		$redis = $this->userredis->getLink();
		//自己的posts
		$myPosts = $redis -> lrange('posts:'.$this->userInfo['userid'],0,-1);
		//保存100条热推
	    $redis->lTrim('recivePost:'.$this->userInfo['userid'],0,99);
		//推送的posts
		$recivePosts = $redis->sort('recivePost:'.$this->userInfo['userid']);
		$posts = array_merge($myPosts,$recivePosts);
		rsort($posts);    //对postId进行排序,并且改变数字索引

		$data = array();
		foreach ($posts as $k=>$v){
			$temp = $redis->hGetAll('post:'.$v);
			$temp['username'] = $redis->hGet('user:'.$temp['userid'],'username');
			$temp['time'] = time()-$temp['time'];
			$data[] = $temp;
		}
		//获取粉丝数量
		//echo $this->userInfo['userid'];
		$followerNum = $redis->sCard('follower:'.$this->userInfo['userid']);
		//获取粉主数量
		$followingNum = $redis->sCard('following:'.$this->userInfo['userid']);
		$followData =array('follower'=>$followerNum,'following'=>$followingNum);

		$this->smartyextend->assign('followData',$followData);
		$this->smartyextend->assign('post',$data);
		$this->smartyextend->assign('username',$this->userInfo['username']);
		$this->smartyextend->display('home/center.html');
	}

	//获取热点数据
	public function timeline(){
		//获取最新的50个用户
		$redis = $this->userredis->getLink();
		//使用sort函数关联查询用户姓名
		$users = $redis->sort('newRegisterUser',array('get'=>'user:*->username'));
		//把自己过滤掉
		if(in_array($this->userInfo['username'], $users)){
			$users = array_merge(array_diff($users, array($this->userInfo['username'])));
		}
		//获取最新的50条微博
		$offset = 0;    		//postID偏移量
		$lastPostId = $redis->get('global:postId');
		$top50 = array();

		for($i=0;$i<50;$i++){
			$postId = $lastPostId-$offset;
			if($postId<=0) break;		//保证postid大于0
			$res = $redis->exists('post:'.$postId);
			if($res){
				//获取微博内容
				$temp = $redis->hGetAll('post:'.$postId);
				$temp['username'] = $redis->hGet('user:'.$temp['userid'],'username');
				$temp['time'] = time()-$temp['time'];
				$top50[] = $temp;
			}else{
				$i -=1;			//重置条件
			}
			$offset += 1;		//记录偏移量
		}
/*		echo '<pre/>';
		var_dump($top50);
		die;*/
		$this->smartyextend->assign('top50',$top50);
		$this->smartyextend->assign('users',$users);
		$this->smartyextend->display('home/timeline.html');
	}

	//关注别人
	public function following(){
		$redis = $this->userredis->getLink();
		//接收被关注人ID
		$fid = $this->input->get('pid');
		//写入redis数据(following:我关注的,follower:关注我的);
		$res1 = $redis->sAdd('following:'.$this->userInfo['userid'],$fid);
		$res2 = $redis->sAdd('follower:'.$fid,$this->userInfo['userid']);
		if(!$res1||!$res2){
			//清除数据
			$redis->sRem('following:'.$this->userInfo['userid'],$fid);
			$redis->sRem('follower:'.$fid,$this->userInfo['userid']);
			$url = base_url('home\center\timeline.html');
			$msg = '关注失败,请重试....';
			$this->smartyextend->error($url,$msg);
			die;
		}else{
			//关注成功返回个人主页
			$url = base_url('home\center.html');
			$msg = '关注成功,正在返回个人主页....';
			$this->smartyextend->success($url,$msg);
			die;
		}
	}



	//发布微博数据
	public function post(){
		$redis = $this->userredis->getLink();
		$postId = $redis->incr('global:postId');   //自增长postID;
		//验证内容不能为空
		$this->form_validation->set_rules('content','内容','required');
		if($this->form_validation->run()==false){
			$url = base_site('home/center');
			$msg = '内容不能为空!';
			$this->smartyextend->error($url,$msg);
			die;
		}
		$data = $this->input->post();
		//保存post新在用户post表下面(使用list结构)
		$redis->lPush('posts:'.$this->userInfo['userid'],$postId);
		//只保存redis 1000条,超过1000之后的保存在postMysql中等待写入mysql
		if($redis->lSize('posts:'.$this->userInfo['userid'])>1000){
			//从右侧弹出10条数据写入mysql
			for($i=0;$i<10;$i++){
				$id = $redis->rPop('posts:'.$this->userInfo['userid']);
				//写入postMysql表等待定时任务写入mysql
				$redis->lPush('postMysql:'.$this->userInfo['userid'],$id);
			}
			//将数量超过1000的用户ID保存在postMysqlUser集合中,用来识别postMysql
			$redis->sAdd('postMysqlUser',$this->userInfo['userid']);
		}


		//保存post内容
		$arr = array(
			'userid'=>$this->userInfo['userid'],
			'content'=>$data['content'],
			'time'=>time(),
		);
		$redis->hMset('post:'.$postId,$arr);
		//维护一个热推表,记录自己和粉丝发布的最新的500条微博(超过500条,写入mysql)
		//如果粉丝数量在1000以下采用全推模式,大于1000采用推给活跃用户
		$fansNum = $redis->sCard('follower:'.$this->userInfo['userid']);
		$fans = $redis->sort('follower:'.$this->userInfo['userid']);
		if ($fansNum<1000 && $fans){
			//推给所有粉丝(recivePost:userid)
			foreach ($fans as $k => $v){
				//推入队列(该队列只记录,粉丝推送的新鲜事)
				$redis->lPush('recivePost:'.$v,$postId); 
			}
		}else{
			//推给活跃粉丝,(等待开发......)
			echo "正在开发中请等待....";
		}


		//添加成功
		$msg = '发布成功!';
		$url = base_url('home/center');
		$this->smartyextend->success($url,$msg);
		die;
	}


	//查看是否关注某个用户
	public function profile(){
		$redis = $this->userredis->getLink();
		$puser = $this->input->get('u');
		$puserId = $redis->hGet('users',$puser);
		$myId = $this->userInfo['userid'];
		//查询是否关注该用户(following:我关注的集合,follower:粉丝关注的集合)
		$res = $redis->sIsMember('following:'.$myId,$puserId);

		$notice= $res? '已关注':'关注ta';   //关注状态
		$purl = $res? '#':'following.html?pid='.$puserId;   //关注链接

		//获取待关注者的最近50条微博
		$puser_postids = $redis->lrange('posts:'.$puserId,0,49);
		//遍历获取post信息
		$post = array();
		foreach ($puser_postids as $k => $v){
			$temp = $redis->hGetALL('post:'.$v);
			$temp['username'] = $puser;
			$time = time()-$temp['time'];
			if(0<$time && $time<60){
				$str = date('s',$time).'秒';
			}else if($time>=60 && $time<3600){
				$str = date('i',$time).'分钟';
			}else if($time>=3600 && $time<3600*24){

				//$str = date('H',$time).'小时';
				$str = ceil($time/3600).'小时';
			}else{
				$str = ceil($time/(3600*24)).'天';
				//$str = date('z',$time).'天';
			}
			$temp['time'] = $str;
			$post[] = $temp;
		}

		$this->smartyextend->assign('post',$post);
		$this->smartyextend->assign('purl',$purl);
		$this->smartyextend->assign('notice',$notice);
		$this->smartyextend->assign('puser',$puser);
		$this->smartyextend->display('home/profile.html');

	}




}
