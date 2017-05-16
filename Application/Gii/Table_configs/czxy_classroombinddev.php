<?php
return array(
	'tableName' => 'czxy_classroombinddev',    // 表名
	'tableCnName' => '教室绑定探针设备',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('devid','classroomaddr','roomcapacity')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','devid','classroomaddr','roomcapacity')",
	'validate' => "
		array('devid', '1,50', '设备id的值最长不能超过 50 个字符！', 2, 'length', 3),
		array('classroomaddr', '1,100', '教室位置的值最长不能超过 100 个字符！', 2, 'length', 3),
		array('roomcapacity', 'number', '教室容纳人数必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'devid' => array(
			'text' => '设备id',
			'type' => 'text',
			'default' => '',
		),
		'classroomaddr' => array(
			'text' => '教室位置',
			'type' => 'text',
			'default' => '',
		),
		'roomcapacity' => array(
			'text' => '教室容纳人数',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('devid', 'normal', '', 'like', '设备id'),
		array('classroomaddr', 'normal', '', 'like', '教室位置'),
	),
);