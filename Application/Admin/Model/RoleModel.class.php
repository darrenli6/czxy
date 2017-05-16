<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model 
{
	protected $insertFields = array('role_name');
	protected $updateFields = array('id','role_name');
	protected $_validate = array(
		array('role_name', '1,30', '角色名称的值最长不能超过 30 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this
		->alias('a')
		->field('a.*,GROUP_CONCAT(c.pri_name) pri_name')
		->join('LEFT JOIN __ROLE_PRI__ b ON a.id=b.role_id
		        LEFT JOIN __PRIVILEGE__ c ON b.pri_id=c.id
		    ')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
	}
	
	//添加后
	protected function _after_insert($data, $options)
	{
	    $priId=I('post.pri_id');
	    $rpModel=D('role_pri');
	    foreach($priId as $v)
	    {
	       $rpModel->add(array(
	           'pri_id'=>$v,
	           'role_id'=>$data['id'],
	       )); 
	        
	    }
	    
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
	    //处理拥有的权限id
	    $priId=I('post.pri_id');
	    $rpModel=D('role_pri');
	    $rpModel->where(array(
	        'role_id'=>array('eq',$option['where']['id']),
	    ))->delete();
	    foreach($priId as $v)
	    {
	        $rpModel->add(array(
	            'pri_id'=>$v,
	            'role_id'=>$option['where']['id'],
	        ));
	    }
	    
	}
	// 删除前
	protected function _before_delete($option)
	{   
	    $rpModel=D('role_pri');
	    $rpModel->where(array(
	        'role_id'=>array('eq',$option['where']['id']),
	    ))->delete();
	    
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/
}