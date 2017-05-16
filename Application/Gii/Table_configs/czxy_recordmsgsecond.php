<?php
return array(
	'tableName' => 'czxy_recordmsgsecond',    // 表名
	'tableCnName' => '二手货购买痕迹',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('fromusername','secondid','tousername','msgdate')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','fromusername','secondid','tousername','msgdate')",
	'validate' => "
		array('fromusername', '1,12', '你的卖家的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('secondid', 'number', '购买二手物品的id必须是一个整数！', 2, 'regex', 3),
		array('tousername', '1,12', '记录买家的值最长不能超过 12 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'fromusername' => array(
			'text' => '你的卖家',
			'type' => 'text',
			'default' => '',
		),
		'secondid' => array(
			'text' => '购买二手物品的id',
			'type' => 'text',
			'default' => '',
		),
		'tousername' => array(
			'text' => '记录买家',
			'type' => 'text',
			'default' => '',
		),
		'msgdate' => array(
			'text' => '购买时间',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('fromusername', 'normal', '', 'like', '你的卖家'),
		array('tousername', 'normal', '', 'like', '记录买家'),
		array('msgdate', 'betweenTime', 'msgdatefrom,msgdateto', '', '购买时间'),
	),
);