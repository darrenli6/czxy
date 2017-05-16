<?php
namespace Admin\Model;
use Think\Model;
class ClassroombinddevModel extends Model 
{
	protected $insertFields = array('devid','classroomaddr','roomcapacity');
	protected $updateFields = array('id','devid','classroomaddr','roomcapacity');
	protected $_validate = array(
		array('devid', '1,50', '设备id的值最长不能超过 50 个字符！', 2, 'length', 3),
		array('classroomaddr', '1,100', '教室位置的值最长不能超过 100 个字符！', 2, 'length', 3),
		array('roomcapacity', 'number', '教室容纳人数必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($devid = I('get.devid'))
			$where['devid'] = array('like', "%$devid%");
		if($classroomaddr = I('get.classroomaddr'))
			$where['classroomaddr'] = array('like', "%$classroomaddr%");
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