<?php
return array(
	'tableName' => 'czxy_faoffer',    // 表名
	'tableCnName' => '企业发布',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('com_name','com_position','com_num','com_salary','com_tel','com_email','com_address','com_desc','com_like')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','com_name','com_position','com_num','com_salary','com_tel','com_email','com_address','com_desc','com_like')",
	'validate' => "
		array('com_name', '1,20', '公司名称的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('com_position', '1,30', '公司职位的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('com_num', 'number', '人数必须是一个整数！', 2, 'regex', 3),
		array('com_salary', '1,20', '薪水的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('com_tel', '1,20', '联系方式的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('com_email', '1,30', '公司邮箱的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('com_address', '1,50', '公司地点的值最长不能超过 50 个字符！', 2, 'length', 3),
		array('com_desc', '1,100', '职位描述的值最长不能超过 100 个字符！', 2, 'length', 3),
		array('com_like', 'number', '点赞必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'com_name' => array(
			'text' => '公司名称',
			'type' => 'text',
			'default' => '',
		),
		'com_position' => array(
			'text' => '公司职位',
			'type' => 'text',
			'default' => '保密',
		),
		'com_num' => array(
			'text' => '人数',
			'type' => 'text',
			'default' => '1',
		),
		'com_salary' => array(
			'text' => '薪水',
			'type' => 'text',
			'default' => '1000',
		),
		'com_tel' => array(
			'text' => '联系方式',
			'type' => 'text',
			'default' => '',
		),
		'com_email' => array(
			'text' => '公司邮箱',
			'type' => 'text',
			'default' => '503102319@qq.com',
		),
		'com_address' => array(
			'text' => '公司地点',
			'type' => 'text',
			'default' => '长治市',
		),
		'com_desc' => array(
			'text' => '职位描述',
			'type' => 'text',
			'default' => '',
		),
		'com_like' => array(
			'text' => '点赞',
			'type' => 'text',
			'default' => '100',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('com_name', 'normal', '', 'like', '公司名称'),
		array('com_position', 'normal', '', 'like', '公司职位'),
		array('com_tel', 'normal', '', 'like', '联系方式'),
		array('com_email', 'normal', '', 'like', '公司邮箱'),
		array('com_address', 'normal', '', 'like', '公司地点'),
	 
	),
);