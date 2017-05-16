<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
  <script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$("#button").click(function() {
			 
			$("#retData").html('loading...');
			var astroidno = $("#select1  option:selected").val();
			 
			$.get("<?php echo U('xingzuo'); ?>", {
				astroid: astroidno
			}, function(data) {
				$("#retData").html(data);
			});

			return false;
		});
	});
</script> 
</head>
  
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">数据由校园行APP提供</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
	<!-- 右上角弹出菜单 -->
 
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			 <select id="select1">
			 <option id="astroidno" value="1">白羊座</option>
			 <option id="astroidno" value="2">金牛座</option>
			 <option id="astroidno" value="3">双子座</option>
			 <option id="astroidno" value="4">巨蟹座</option>
			 <option id="astroidno" value="5">狮子座</option>
			 <option id="astroidno" value="6">处女座</option>
			 <option id="astroidno" value="7">天秤座</option>
			 <option id="astroidno" value="8">天蝎座</option>
			 <option id="astroidno" value="9">射手座</option>
			 <option id="astroidno" value="10">魔蝎座</option>
			 <option id="astroidno" value="11">水瓶座</option>
			 <option id="astroidno" value="12">双鱼座</option>
			 </select>
		     <input type="submit"    id="button" value="查询" />
		     <div id="retData" style="color:#0000;border:1px solid #ccc;">
			</div>
		</section>
    
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>