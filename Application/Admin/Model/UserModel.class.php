<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model 
{
	protected $insertFields = array('username','password','yancode','xuehao','classid','departmentid','roleid');
	protected $updateFields = array('id','username','password','yancode','xuehao','classid','departmentid','roleid');
	protected $_validate = array(
		array('username', '1,12', '用户名手机号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('password', '1,40', '密码的值最长不能超过 40 个字符！', 2, 'length', 3),
		array('yancode', 'number', '验证码必须是一个整数！', 2, 'regex', 3),
		array('xuehao', '1,8', '学号的值最长不能超过 8 个字符！', 2, 'length', 3),
		array('classid', 'number', '班级代号必须是一个整数！', 2, 'regex', 3),
		array('departmentid', 'number', '系代号必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($username = I('get.username'))
			$where['username'] = array('like', "%$username%");
		if($xuehao = I('get.xuehao'))
			$where['xuehao'] = array('like', "%$xuehao%");
		if($classid = I('get.classid'))
			$where['classid'] = array('eq', $classid);
		if($departmentid = I('get.departmentid'))
			$where['departmentid'] = array('eq', $departmentid);
		/************************************* 翻页 ****************************************/
		$count = $this->field('a.*,b.rolename')->alias('a')
		->join('LEFT JOIN __USERROLE__ b ON b.id=a.roleid')
		->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this
		->field('a.*,b.rolename')
		->alias('a')
		->join('LEFT JOIN __USERROLE__ b ON b.id=a.roleid')
		->where($where)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{   
	    
	    $data['password']=md5($data['password']);
		if(isset($_FILES['face']) && $_FILES['face']['error'] == 0)
		{
			$ret = uploadOne('face', 'User', array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			));
			if($ret['ok'] == 1)
			{
				$data['face'] = $ret['images'][0];
				$data['big_face'] = $ret['images'][1];
				$data['mid_face'] = $ret['images'][2];
				$data['sm_face'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
		}
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{   
	    //修改密码
	    if($data['password'])
	    $data['password']=md5($data['password']);
		else 
		    unset($data['password']);
		
		
		if(isset($_FILES['face']) && $_FILES['face']['error'] == 0)
		{
			$ret = uploadOne('face', 'User', array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			));
			if($ret['ok'] == 1)
			{
				$data['face'] = $ret['images'][0];
				$data['big_face'] = $ret['images'][1];
				$data['mid_face'] = $ret['images'][2];
				$data['sm_face'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
			deleteImage(array(
				I('post.old_face'),
				I('post.old_big_face'),
				I('post.old_mid_face'),
				I('post.old_sm_face'),
	
			));
		}
	}
	// 删除前
	protected function _before_delete($option)
	{   
	    
	    
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
		$images = $this->field('face,big_face,mid_face,sm_face')->find($option['where']['id']);
		deleteImage($images);
	}
	/************************************ 其他方法 ********************************************/
}