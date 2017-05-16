<?php
namespace Admin\Model;
use Think\Model;
class FaofferModel extends Model 
{
	protected $insertFields = array('com_name','com_position','com_num','com_salary','com_tel','com_email','com_address','com_desc','com_like','state','checkenter','fuli','education');
	protected $updateFields = array('id','com_name','com_position','com_num','com_salary','com_tel','com_email','com_address','com_desc','com_like','state','checkenter','fuli','education');
	protected $_validate = array(
		array('com_name', '1,20', '公司名称的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('com_position', '1,30', '公司职位的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('com_num', 'number', '人数必须是一个整数！', 2, 'regex', 3),
		array('com_salary', '1,20', '薪水的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('com_tel', '1,20', '联系方式的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('com_email', '1,30', '公司邮箱的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('com_address', '1,50', '公司地点的值最长不能超过 50 个字符！', 2, 'length', 3),
		array('com_desc', '1,100', '职位描述的值最长不能超过 100 个字符！', 2, 'length', 3),
		array('com_like', 'number', '点赞必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($com_name = I('get.com_name'))
			$where['com_name'] = array('like', "%$com_name%");
		if($com_position = I('get.com_position'))
			$where['com_position'] = array('like', "%$com_position%");
		if($com_tel = I('get.com_tel'))
			$where['com_tel'] = array('like', "%$com_tel%");
		if($com_email = I('get.com_email'))
			$where['com_email'] = array('like', "%$com_email%");
		if($com_address = I('get.com_address'))
			$where['com_address'] = array('like', "%$com_address%");
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
	    $data['state']='否';
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