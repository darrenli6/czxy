<?php
return array(
	'tableName' => 'czxy_broadcast',    // 表名
	'tableCnName' => '校园行广播',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('title','filepath','filecontent','leader','author','adddate')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','title','filepath','filecontent','leader','author','adddate')",
	'validate' => "
		array('title', '1,40', '标题的值最长不能超过 40 个字符！', 2, 'length', 3),
		array('filepath', '1,60', '文件路径的值最长不能超过 60 个字符！', 2, 'length', 3),
		array('leader', '1,30', '主办方的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('author', '1,15', '作者的值最长不能超过 15 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'title' => array(
			'text' => '标题',
			'type' => 'text',
			'default' => '',
		),
		'filepath' => array(
			'text' => '文件路径',
			'type' => 'file',
			'default' => '',
		),
		'filecontent' => array(
			'text' => '文字内容',
			'type' => 'html',
			'default' => '',
		),
		'leader' => array(
			'text' => '主办方',
			'type' => 'text',
			'default' => '',
		),
		'author' => array(
			'text' => '作者',
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
		array('title', 'normal', '', 'like', '标题'),
		array('leader', 'normal', '', 'like', '主办方'),
		array('author', 'normal', '', 'like', '作者'),
		array('adddate', 'betweenTime', 'adddatefrom,adddateto', '', '发布时间'),
	),
);