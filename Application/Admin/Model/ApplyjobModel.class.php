<?php
namespace Admin\Model;
use Think\Model;
class ApplyjobModel extends Model 
{
	protected $insertFields = array('name','position','education','apply_info','tel','email','qq','state','sex','exprience');
	protected $updateFields = array('id','name','position','education','apply_info','tel','email','qq','state','sex','exprience');
	protected $_validate = array(
		array('name', '1,10', '姓名的值最长不能超过 10 个字符！', 2, 'length', 3),
		array('position', '1,30', '想要申请的职位的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('education', '高中,小学,保密,本科,大专,初中,本科,硕士', "学历的值只能是在 '高中,小学,保密,本科,大专,初中,本科,硕士' 中的一个值！", 2, 'in', 3),
		array('apply_info', '1,200', '应聘宣言的值最长不能超过 200 个字符！', 2, 'length', 3),
		array('tel', '1,11', '电话的值最长不能超过 11 个字符！', 2, 'length', 3),
		array('email', 'email', '邮箱格式不正确！', 2, 'regex', 3),
		array('email', '1,30', '邮箱的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('qq', '1,20', 'qq的值最长不能超过 20 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($name = I('get.name'))
			$where['name'] = array('like', "%$name%");
		if($position = I('get.position'))
			$where['position'] = array('like', "%$position%");
		$education = I('get.education');
		if($education != '' && $education != '-1')
			$where['education'] = array('eq', $education);
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