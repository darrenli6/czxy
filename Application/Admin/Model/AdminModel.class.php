<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model 
{
	protected $insertFields = array('username','password','rpassword','chkcode');
	protected $updateFields = array('id','username','password');
	protected $_validate = array(
		array('username', 'require', '用户名不能为空', 1, 'regex', 3),
		array('username', '1,30', '用户名的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('password', 'require', '密码添加的时候不能为空!', 1, 'regex', 1),
		array('rpassword', 'password', '密码不一致', 0, 'confirm', 1),
		array('password', '1,50', '密码的值最长不能超过 50 个字符！', 2, 'length', 3),
	);
	
	//为登陆表单定义个验证规则
	public $_login_validate=array(
	    array('username','require','用户名不能为空',1),
	    array('password','require','密码不能为空',1),
	    array('chkcode','require','验证码不能为空',1),
	    array('chkcode','check_verify','验证码错误',1,'callback'),
	    
	);
	function check_verify($code,$id=""){
	    $verify=new \Think\Verify();
	    return $verify->check($code,$id);
	}
	
	public function login(){
	     $username=$this->username; 
	     $password=$this->password;
	     //先查看这个用户名是否存在
	     $user=$this->where(
	         array(
	           'username'=>array('eq',$username),
	         )
	         )->find();
	     if($user)
	     {
	         if($user['password']==md5($password))
	         {
	             //登陆成功时候存id
	             session('adminid',$user['id']);
	             session('adminusername',$user['username']);
	             return true;
	         }else{
	             $this->error='密码错误';
	             return false;
	         } 
	         
	     }else{
	          $this->error='用户不存在';
	          return false;
	     }    
	}

	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($username = I('get.username'))
			$where['username'] = array('like', "%$username%");
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
		->field('a.*,GROUP_CONCAT(c.role_name) role_name')
		->join('LEFT JOIN __ADMIN_ROLE__ b ON a.id=b.admin_id
		        LEFT JOIN __ROLE__ c ON b.role_id=c.id
		        ')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{  
	  
	    
	    $data['password']=md5($data['password']);
	}
	
	protected  function _after_insert($data, $options)
	{
	    $roleId=I('post.role_id');
	    $arModel=D('admin_role');
	    foreach($roleId as $v)
	    {
	        $arModel->add(array(
	            'admin_id'=>$data['id'],
	            'role_id'=>$v,
	        ));
	         
	    }
	    
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{      
	    //处理拥有的权限id
	    $roleId=I('post.role_id');
	    $arModel=D('admin_role');
	    $arModel->where(array(
	        'admin_id'=>array('eq',$option['where']['id']),
	    ))->delete();
	    foreach($roleId as $v)
	    {
	        $arModel->add(array(
	            'role_id'=>$v,
	            'admin_id'=>$option['where']['id'],
	        ));
	    } 
	    
	    
	    if($data['password'])
	          $data['password']=md5($data['password']);
	      else 
	          unset($data['password']);
	      //从表单中删除这个字段就不会修改了
	}
	
	
	
	// 删除前
	protected function _before_delete($option)
	{    
	    $arModel=D('admin_role');
	    $arModel->where(array(
	        'admin_id'=>array('eq',$option['where']['id']),
	    ))->delete();
		 if($option['where']['id']==1)
		 {
		     $this->error='超级管理员无法删除';
		     return false;
		 }
	}
	/************************************ 其他方法 ********************************************/
}