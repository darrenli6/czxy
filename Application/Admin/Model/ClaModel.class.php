<?php
namespace Admin\Model;
use Think\Model;
class ClaModel extends Model 
{
	protected $insertFields = array('nameid','name','tea_name','zixiarea','departmentid');
	protected $updateFields = array('id','nameid','name','tea_name','zixiarea','departmentid');
	protected $_validate = array(
		array('nameid', '1,5', '的值最长不能超过 5 个字符！', 2, 'length', 3),
		array('name', '1,30', '的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('tea_name', '1,10', '的值最长不能超过 10 个字符！', 2, 'length', 3),
		array('zixiarea', '1,30', '的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('departmentid', 'number', 'ϵid必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($nameid = I('get.nameid'))
			$where['nameid'] = array('like', "%$nameid%");
		if($tea_name = I('get.tea_name'))
			$where['tea_name'] = array('like', "%$tea_name%");
		if($departmentid = I('get.departmentid'))
			$where['departmentid'] = array('eq', $departmentid);
		/************************************* 翻页 ****************************************/
		$count = $this
		->field('a.*,b.name dname')
		->alias('a')
		->join('LEFT JOIN __DEPARTMENT__ b ON b.id=a.departmentid ')
		->where($where)
		->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this
		->field('a.*,b.name dname')
		->alias('a')
		->join('LEFT JOIN __DEPARTMENT__ b ON b.id=a.departmentid ')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)->select();
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
   public function getDepData(){
       $dModel=D('department');
       $data=$dModel
       ->field('id,name')
       ->select();
       return $data;
   }
   
   public function getClaData(){
       $data=$this
       ->field('id,departmentid,nameid,name')
       ->select();
       return $data;
   }

   
}