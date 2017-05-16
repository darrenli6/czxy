<?php
return array(
	'tableName' => 'czxy_gradeinfo',    // 表名
	'tableCnName' => '成绩信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'stuno',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('stuno','periodno','gradeinfo')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('stuno','periodno','gradeinfo')",
	'validate' => "
		array('stuno', 'number', '学期编号必须是一个整数！', 2, 'regex', 3),
		array('periodno', 'number', '学期编号必须是一个整数！', 2, 'regex', 3),
		array('gradeinfo', '1,300', '学生成绩信息的值最长不能超过 300 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'stuno' => array(
			'text' => '学号',
			'type' => 'text',
			'default' => '',
		),
		'periodno' => array(
			'text' => '学期编号',
			'type' => 'text',
			'default' => '',
		),
		'gradeinfo' => array(
			'text' => '学生成绩信息',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('stuno', 'normal', '', 'eq', '学号'),
		array('periodno', 'normal', '', 'eq', '学期编号'),
	),
);