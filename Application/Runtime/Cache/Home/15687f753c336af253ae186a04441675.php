<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
</head>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行-个人中心</h1>
		<a class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="javascript:history.go(-1)"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
	<!-- 右上角弹出菜单 -->
	<div id="topPopover" class="mui-popover">
			<div class="mui-popover-arrow"></div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view">
						<li class="mui-table-view-cell">
							<a href="query.html">我要查询</a>
						</li>
						<li class="mui-table-view-cell"><a href="vote.html">我要投票</a>
						</li>
						 
						<li class="mui-table-view-cell"><a href="personCenter.html">个人中心</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 主内容部分 -->
	<div class="content">
		 
		<section class="personData">
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell mui-media">
					<a class="mui-navigate-right" href="#">
						<img class="mui-media-object mui-pull-left head-img" id="
						head-img" src="/Test4/czxy/Public/Home/images/timg.jpeg">
						<label class="name">老丸子</label>
					</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a>班级<span class="mui-pull-right">2016级机电1班</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>学号<span class="mui-pull-right">20163325239</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>性别<span class="mui-pull-right">男</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>宿舍<span class="mui-pull-right">B19-12</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>手机号<span class="mui-pull-right">11111111111</span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>邮箱地址<span class="mui-pull-right">xiaowanzi@163.com</span></a>
				</li>
				<li class="mui-table-view-cell">
					<input type="button"    onclick="javascript:location.href='#'"   value="修改" /> 
					<input type="button"     value="签到" /> 
				</li>
			</ul>
		</section>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>