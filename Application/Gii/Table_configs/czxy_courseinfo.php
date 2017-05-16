<?php
return array(
	'tableName' => 'czxy_courseinfo',    // 表名
	'tableCnName' => '学生课程信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'courseid',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('coursename','courseid')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('courseid','coursename')",
	'validate' => "
		array('coursename', '1,20', '课程名的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('courseid', '1,5', '课程号的值最长不能超过5个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'courseid' => array(
			'text' => '课程号码',
			'type' => 'text',
			'default' => '',
		),
	),
	'fields' => array(
		'coursename' => array(
			'text' => '课程名',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('coursename', 'normal', '', 'like', '课程名'),
	),
);