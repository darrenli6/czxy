<?php
return array(
	'tableName' => 'czxy_coursetable',    // 表名
	'tableCnName' => '课程表',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('xingqi','diyi','dier','disan','disi','diwu','classid')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','xingqi','diyi','dier','disan','disi','diwu','classid')",
	'validate' => "
		array('xingqi', '1,10', '星期几的值最长不能超过 10 个字符！', 2, 'length', 3),
		array('diyi', '1,30', '第一节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('dier', '1,30', '第二节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('disan', '1,30', '第三节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('disi', '1,30', '第四节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('diwu', '1,30', '第五节课的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('classid', 'number', '必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'xingqi' => array(
			'text' => '星期',
			'type' => 'text',
			'default' => '',
		),
		'diyi' => array(
			'text' => '第一节课',
			'type' => 'text',
			'default' => '',
		),
		'dier' => array(
			'text' => '第二节课',
			'type' => 'text',
			'default' => '',
		),
		'disan' => array(
			'text' => '第三节课',
			'type' => 'text',
			'default' => '',
		),
		'disi' => array(
			'text' => '第四节课',
			'type' => 'text',
			'default' => '',
		),
		'diwu' => array(
			'text' => '第五节课',
			'type' => 'text',
			'default' => '',
		),
		'classid' => array(
			'text' => '班级id',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('xingqi', 'normal', '', 'like', ''),
		array('classid', 'normal', '', 'eq', ''),
	),
);