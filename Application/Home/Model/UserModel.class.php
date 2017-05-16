<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model 
{
     
    protected $insertFields = array('id','username','password','yancode','email','xuehao','classid','departmentid','face','nickname','qq','sex');
	protected $updateFields = array('id','username','password','yancode','xuehao','email','classid','departmentid','face','nickname','qq','sex');
	protected $_validate = array(
		array('username', '1,12', '用户名手机号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('xuehao', '1,8', '学号的值最长不能超过 8 个字符！', 1, 'length', 3),
		array('classid', 'require', '班级请进行选择！', 1, 'regex', 3),
		array('departmentid', 'require', '系请进行选择！', 1, 'regex', 3),
		array('email', 'email', 'Email填写不正确！', 1, 'regex', 3),
	);
	 
  
}