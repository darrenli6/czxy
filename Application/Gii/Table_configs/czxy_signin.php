<?php
return array(
	'tableName' => 'czxy_signin',    // 表名
	'tableCnName' => '签到记录',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('openid','signstate','nickname','remark','signdate')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','openid','signstate','nickname','remark','signdate')",
	'validate' => "
		array('openid', '1,50', 'openid的值最长不能超过 50 个字符！', 2, 'length', 3),
		array('signstate', '签到,签退', \"签到签退的值只能是在 '签到,签退' 中的一个值！\", 2, 'in', 3),
		array('nickname', '1,30', '昵称的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('remark', '1,30', '用户备注信息的值最长不能超过 30 个字符！', 2, 'length', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'openid' => array(
			'text' => 'openid',
			'type' => 'text',
			'default' => '',
		),
		'signstate' => array(
			'text' => '签到签退',
			'type' => 'radio',
			'values' => array(
				'签到' => '签到',
				'签退' => '签退',
			),
			'default' => '',
		),
		'nickname' => array(
			'text' => '昵称',
			'type' => 'text',
			'default' => '',
		),
		'headimgurl' => array(
			'text' => '头像',
			'type' => 'file',
			'thumbs' => array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			),
			'save_fields' => array('headimgurl', 'big_headimgurl', 'mid_headimgurl', 'sm_headimgurl'),
			'default' => '',
		),
		'remark' => array(
			'text' => '用户备注信息',
			'type' => 'text',
			'default' => '',
		),
		'signdate' => array(
			'text' => '签到时间',
			'type' => 'text',
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('signstate', 'in', '签到,签退', '', '签到签退'),
		array('nickname', 'normal', '', 'like', '昵称'),
		array('remark', 'normal', '', 'like', '用户备注信息'),
		array('signdate', 'betweenTime', 'signdatefrom,signdateto', '', '签到时间'),
	),
);