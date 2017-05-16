<?php
return array(
	'tableName' => 'czxy_department',    // 表名
	'tableCnName' => '系级信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('name','director')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','name','director')",
	'validate' => "
		array('name', '1,30', '系名字的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('director', '1,30', '系主任的值最长不能超过 30 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'name' => array(
			'text' => '系名称',
			'type' => 'text',
			'default' => '',
		),
		'director' => array(
			'text' => '系主任',
			'type' => 'text',
			'default' => '',
		),
	),
 
);