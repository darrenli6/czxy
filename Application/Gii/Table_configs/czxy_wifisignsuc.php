<?php
return array(
	'tableName' => 'czxy_wifisignsuc',    // 表名
	'tableCnName' => '探针签到信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('username','nickname','macaddr','signtime')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','username','nickname','macaddr','signtime')",
	'validate' => "
		array('username', '1,11', '用户名的值最长不能超过 11 个字符！', 2, 'length', 3),
		array('nickname', '1,20', '姓名的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('macaddr', '1,17', 'mac地址的值最长不能超过 17 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'username' => array(
			'text' => '用户名',
			'type' => 'text',
			'default' => '',
		),
		'nickname' => array(
			'text' => '姓名',
			'type' => 'text',
			'default' => '',
		),
		'macaddr' => array(
			'text' => 'mac地址',
			'type' => 'text',
			'default' => '',
		),
		'signtime' => array(
			'text' => '签到时间',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('username', 'normal', '', 'like', '用户名'),
		array('nickname', 'normal', '', 'like', '姓名'),
		array('signtime', 'betweenTime', 'signtimefrom,signtimeto', '', '签到时间'),
	),
);