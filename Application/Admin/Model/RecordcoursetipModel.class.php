<?php
namespace Admin\Model;
use Think\Model;
class RecordcoursetipModel extends Model 
{
	protected $insertFields = array('classid','username','email');
	protected $updateFields = array('id','classid','username','email');
	protected $_validate = array(
		array('classid', 'number', '班级信息必须是一个整数！', 2, 'regex', 3),
		array('username', 'number', '用户必须是一个整数！', 2, 'regex', 3),
		array('email', 'email', '用户的email格式不正确！', 2, 'regex', 3),
		array('email', '1,40', '用户的email的值最长不能超过 40 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($classid = I('get.classid'))
			$where['classid'] = array('eq', $classid);
		if($username = I('get.username'))
			$where['username'] = array('eq', $username);
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->where($where)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
	}
	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/
}