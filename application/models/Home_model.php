<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
	public function __construct(){
		parent::__construct();

	}

	//查询内容
	public function getContent($id){
		//加载分组数据库
		$this->load->database('default');
		//指定表
		$this->db->from('user');
		//查询字段
		$this->db->select('*');
		//指定查询条件
		$this->db->where(array('id'=>$id));
		//获取查询数据
		$result = $this->db->get();
		return $result->row_array();  //单条数据
		//$result->result_array(); //多条数据
	}

}
