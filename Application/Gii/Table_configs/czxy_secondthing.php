<?php
return array(
	'tableName' => 'czxy_secondthing',    // 表名
	'tableCnName' => '二手交易信息',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('title','content','old_price','now_price','public_name','phone','qq','deal_type','public_time','categoryid')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','title','content','old_price','now_price','public_name','phone','qq','deal_type','public_time','categoryid')",
	'validate' => "
		array('title', '1,30', '二手主题的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('old_price', 'currency', '原来价格必须是货币格式！', 2, 'regex', 3),
		array('now_price', 'currency', '现在价格必须是货币格式！', 2, 'regex', 3),
		array('public_name', '1,20', '发布人名字的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('phone', '1,12', '手机号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('qq', '1,12', 'qq号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('deal_type', '自取,上门取货', \"交易方式的值只能是在 '自取,上门取货' 中的一个值！\", 2, 'in', 3),
		array('categoryid', 'number', '二手交易物品种类必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'title' => array(
			'text' => '二手主题',
			'type' => 'text',
			'default' => '',
		),
		'content' => array(
			'text' => '填写的内容',
			'type' => 'html',
			'default' => '',
		),
		'title_pic' => array(
			'text' => '主题图片',
			'type' => 'file',
			'thumbs' => array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			),
			'save_fields' => array('title_pic', 'big_title_pic', 'mid_title_pic', 'sm_title_pic'),
			'default' => '',
		),
		'old_price' => array(
			'text' => '原来价格',
			'type' => 'text',
			'default' => '',
		),
		'now_price' => array(
			'text' => '现在价格',
			'type' => 'text',
			'default' => '',
		),
		'public_name' => array(
			'text' => '发布人名字',
			'type' => 'text',
			'default' => '',
		),
		'phone' => array(
			'text' => '手机号',
			'type' => 'text',
			'default' => '',
		),
		'qq' => array(
			'text' => 'qq号',
			'type' => 'text',
			'default' => '',
		),
		'deal_type' => array(
			'text' => '交易方式',
			'type' => 'radio',
			'values' => array(
				'自取' => '自取',
				'上门取货' => '上门取货',
			),
			'default' => '',
		),
		'public_time' => array(
			'text' => '发布时间',
			'type' => 'text',
			'default' => '',
		),
		'categoryid' => array(
			'text' => '二手交易物品种类',
			'type' => 'text',
			'default' => '',
		),
		'pic_id' => array(
			'text' => '商品对应的商品',
			'type' => 'file',
			'thumbs' => array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			),
			'save_fields' => array('pic_id', 'big_pic_id', 'mid_pic_id', 'sm_pic_id'),
			'default' => '',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('title', 'normal', '', 'like', '二手主题'),
		array('public_name', 'normal', '', 'like', '发布人名字'),
		array('deal_type', 'in', '自取,上门取货', '', '交易方式'),
		array('public_time', 'betweenTime', 'public_timefrom,public_timeto', '', '发布时间'),
		array('categoryid', 'normal', '', 'eq', '二手交易物品种类'),
	),
);