<?php
return array(
	'tableName' => 'czxy_cla',    // 表名
	'tableCnName' => '班级信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('nameid','name','tea_name','zixiarea','departmentid')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','nameid','name','tea_name','zixiarea','departmentid')",
	'validate' => "
		array('nameid', '1,5', '的值最长不能超过 5 个字符！', 2, 'length', 3),
		array('name', '1,30', '的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('tea_name', '1,10', '的值最长不能超过 10 个字符！', 2, 'length', 3),
		array('zixiarea', '1,30', '的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('departmentid', 'number', 'ϵid必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'nameid' => array(
			'text' => '班级id',
			'type' => 'text',
			'default' => '',
		),
		'name' => array(
			'text' => '班名',
			'type' => 'text',
			'default' => '',
		),
		'tea_name' => array(
			'text' => '班主任姓名',
			'type' => 'text',
			'default' => '',
		),
		'zixiarea' => array(
			'text' => '自习室地点',
			'type' => 'text',
			'default' => '',
		),
		'departmentid' => array(
			'text' => '系id',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('nameid', 'normal', '', 'like', ''),
		array('tea_name', 'normal', '', 'like', ''),
		array('departmentid', 'normal', '', 'eq', 'id'),
	),
);