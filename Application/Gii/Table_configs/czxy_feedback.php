<?php
return array(
	'tableName' => 'czxy_feedback',    // 表名
	'tableCnName' => '反馈表 ',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('link','info','adddate')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','link','info','adddate')",
	'validate' => "
		array('link', '1,30', '联系的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('info', '1,200', '描述信息的值最长不能超过 200 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'link' => array(
			'text' => '联系',
			'type' => 'text',
			'default' => '',
		),
		'info' => array(
			'text' => '描述信息',
			'type' => 'text',
			'default' => '',
		),
		'adddate' => array(
			'text' => '发布时间',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('link', 'normal', '', 'like', '联系'),
		array('adddate', 'betweenTime', 'adddatefrom,adddateto', '', '发布时间'),
	),
);