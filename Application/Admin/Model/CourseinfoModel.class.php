<?php
namespace Admin\Model;
use Think\Model;
class CourseinfoModel extends Model 
{
	protected $insertFields = array('coursename','courseid');
	protected $updateFields = array('courseid','coursename');
	protected $_validate = array(
		array('coursename', '1,20', '课程名的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('courseid', '1,5', '课程号的值最长不能超过5个字符！', 2, 'length', 3),
		array('courseid', 'require', '课程号不能为空', 1, 'regex', 3),
		array('coursename', 'require', '课程名不能为空', 1, 'regex', 3),
	 
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($coursename = I('get.coursename'))
			$where['coursename'] = array('like', "%$coursename%");
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->where($where)->group('a.courseid')->limit($page->firstRow.','.$page->listRows)->select();
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
		if(is_array($option['where']['courseid']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/
}