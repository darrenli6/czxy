<?php
namespace Admin\Model;
use Think\Model;
class CoursetableModel extends Model 
{
	protected $insertFields = array('xingqi','diyi','dier','disan','disi','diwu','classid');
	protected $updateFields = array('id','xingqi','diyi','dier','disan','disi','diwu','classid');
	protected $_validate = array(
		array('xingqi', '1,10', '星期几的值最长不能超过 10 个字符！', 2, 'length', 3),
		array('diyi', '1,30', '第一节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('dier', '1,30', '第二节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('disan', '1,30', '第三节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('disi', '1,30', '第四节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('diwu', '1,30', '第五节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('classid', 'number', '必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 14)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		
		if($xingqi = I('get.xingqi'))
			$where['xingqi'] = array('like', "%$xingqi%");
		if($classid = I('get.classid'))
			$where['classid'] = array('eq', $classid);
		/************************************* 翻页 ****************************************/
		$count = $this
		->alias('a')
		->where($where)
		->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)
		->select();
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