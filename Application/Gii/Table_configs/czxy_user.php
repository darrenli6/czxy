<?php
return array(
	'tableName' => 'czxy_user',    // 表名
	'tableCnName' => '用户信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('username','password','yancode','xuehao','classid','departmentid')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','username','password','yancode','xuehao','classid','departmentid')",
	'validate' => "
		array('username', '1,12', '用户名手机号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('password', '1,40', '密码的值最长不能超过 40 个字符！', 2, 'length', 3),
		array('yancode', 'number', '验证码必须是一个整数！', 2, 'regex', 3),
		array('xuehao', '1,8', '学号的值最长不能超过 8 个字符！', 2, 'length', 3),
		array('classid', 'number', '班级代号必须是一个整数！', 2, 'regex', 3),
		array('departmentid', 'number', '系代号必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'username' => array(
			'text' => '用户名手机号',
			'type' => 'text',
			'default' => '',
		),
		'password' => array(
			'text' => '密码',
			'type' => 'password',
			'default' => '',
		),
		'yancode' => array(
			'text' => '验证码',
			'type' => 'text',
			'default' => '',
		),
		'xuehao' => array(
			'text' => '学号',
			'type' => 'text',
			'default' => '',
		),
		'classid' => array(
			'text' => '班级代号',
			'type' => 'text',
			'default' => '',
		),
		'departmentid' => array(
			'text' => '系代号',
			'type' => 'text',
			'default' => '',
		),
		'face' => array(
			'text' => '头像',
			'type' => 'file',
			'thumbs' => array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			),
			'save_fields' => array('face', 'big_face', 'mid_face', 'sm_face'),
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('username', 'normal', '', 'like', '用户名手机号'),
		array('xuehao', 'normal', '', 'like', '学号'),
		array('classid', 'normal', '', 'eq', '班级代号'),
		array('departmentid', 'normal', '', 'eq', '系代号'),
	),
);