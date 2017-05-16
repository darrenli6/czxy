<?php
namespace Home\Model;
use Think\Model;
class CoursetableModel extends Model 
{
	 
	public function search($pageSize = 14)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		
		if($departmentid=I('get.departmentid'))
		{
		    $where['b.departmentid'] = array('eq', $departmentid);
		}
		if($classid=I('get.classid'))
		{
		    $where['b.nameid'] = array('eq', $classid);
		}
	 
		if(empty($where))
		{
		    return null;
		} 
		
		/************************************** 取数据 ******************************************/
		$data = $this
		->field('a.*,b.*')
		->alias('a')
		->join('LEFT JOIN __CLA__ b ON b.id=a.classid')
		->where($where)
		->group('a.id')
		->select();
		return $data;
	}
 
}