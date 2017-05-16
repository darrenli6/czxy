<?php
return array(
	'tableName' => 'czxy_applyjob',    // 表名
	'tableCnName' => '申请工作  ',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('name','position','education','apply_info','tel','email','qq')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','name','position','education','apply_info','tel','email','qq')",
	'validate' => "
		array('name', '1,10', '姓名的值最长不能超过 10 个字符！', 2, 'length', 3),
		array('position', '1,30', '想要申请的职位的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('education', '高中,小学,保密,本科,大专,初中,本科,硕士', \"学历的值只能是在 '高中,小学,保密,本科,大专,初中,本科,硕士' 中的一个值！\", 2, 'in', 3),
		array('apply_info', '1,200', '应聘宣言的值最长不能超过 200 个字符！', 2, 'length', 3),
		array('tel', '1,11', '电话的值最长不能超过 11 个字符！', 2, 'length', 3),
		array('email', 'email', '邮箱格式不正确！', 2, 'regex', 3),
		array('email', '1,30', '邮箱的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('qq', '1,20', 'qq的值最长不能超过 20 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'name' => array(
			'text' => '姓名',
			'type' => 'text',
			'default' => '',
		),
		'position' => array(
			'text' => '想要申请的职位',
			'type' => 'text',
			'default' => '',
		),
		'education' => array(
			'text' => '学历',
			'type' => 'radio',
			'values' => array(
				'高中' => '高中',
				'小学' => '小学',
				'保密' => '保密',
				'本科' => '本科',
				'大专' => '大专',
				'初中' => '初中',
				'本科' => '本科',
				'硕士' => '硕士',
			),
			'default' => '',
		),
		'apply_info' => array(
			'text' => '应聘宣言',
			'type' => 'text',
			'default' => '',
		),
		'tel' => array(
			'text' => '电话',
			'type' => 'text',
			'default' => '',
		),
		'email' => array(
			'text' => '邮箱',
			'type' => 'text',
			'default' => '',
		),
		'qq' => array(
			'text' => 'qq',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('name', 'normal', '', 'like', '姓名'),
		array('position', 'normal', '', 'like', '想要申请的职位'),
		array('education', 'in', '高中,小学,保密,本科,大专,初中,本科,硕士', '', '学历'),
		 
	),
);