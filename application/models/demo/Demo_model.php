<?php
/*
* demo_model展示了简单的模型对数据库的查询操作
* author:LW
* time:2018/7/3
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo_model extends CI_Model{
	public function __construct(){
		parent::__construct();		//调用父类构造函数
	}

	//查询内容方法
	public function getContent($id){

		//加载链接default分组数据库
		$this->load->database('default');		

		//指定user数据表
		$this->db->from('user');

		//设置查询字段(*)为所有,eg: $this->db->select('username,id')
		$this->db->select('*');

		//指定查询条件
		$this->db->where(array('id'=>$id));

		//获取查询结果集
		$result = $this->db->get();

		//返回遍历结果
		return $result->row_array();  //单条数据
		//$result->result_array(); //多条数据
	}

}
