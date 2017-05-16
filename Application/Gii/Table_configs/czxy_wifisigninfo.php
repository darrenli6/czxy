<?php
return array(
	'tableName' => 'czxy_wifisigninfo',    // 表名
	'tableCnName' => '探针签到信息录入',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('mobilephone','phonemac')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','mobilephone','phonemac')",
	'validate' => "
		array('mobilephone', '1,11', 'MAC绑定手机号的值最长不能超过 11 个字符！', 2, 'length', 3),
		array('phonemac', '1,18', 'MAC地址的值最长不能超过 18 个字符！', 2, 'length', 3),
		array('phonemac', 'require', '必须录入该信息'),
		array('mobilephone', 'require', '必须录入该信息'),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'mobilephone' => array(
			'text' => 'MAC绑定手机号',
			'type' => 'text',
			'default' => '',
		),
		'phonemac' => array(
			'text' => 'MAC地址',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('mobilephone', 'normal', '', 'like', 'MAC绑定手机号'),
	),
);