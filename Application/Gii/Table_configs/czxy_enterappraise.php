<?php
return array(
	'tableName' => 'czxy_enterappraise',    // 表名
	'tableCnName' => '企业评价',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('appraisenum','tucao','username','enterpriseid')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','appraisenum','tucao','username','enterpriseid')",
	'validate' => "
		array('appraisenum', 'number', '星级数总体评级必须是一个整数！', 2, 'regex', 3),
		array('tucao', '1,100', '吐槽内容的值最长不能超过 100 个字符！', 2, 'length', 3),
		array('username', '1,12', '用户的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('enterpriseid', 'number', '企业id必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'appraisenum' => array(
			'text' => '星级数总体评级',
			'type' => 'text',
			'default' => '',
		),
		'tucao' => array(
			'text' => '吐槽内容',
			'type' => 'text',
			'default' => '',
		),
		'username' => array(
			'text' => '用户',
			'type' => 'text',
			'default' => '',
		),
		'enterpriseid' => array(
			'text' => '企业id',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('appraisenum', 'normal', '', 'eq', '星级数总体评级'),
		array('enterpriseid', 'normal', '', 'eq', '企业id'),
	),
);