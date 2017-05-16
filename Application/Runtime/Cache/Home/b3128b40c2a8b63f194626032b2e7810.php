<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行-签到</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
</head>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行,任我行.</h1>
	</header>
 
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			<div class="class">
			    <a href="##">
				<label id="classResult">签到签退失败</label>
				</a>
			</div>
		</section>
		    <section class="query">
			<table>
			    <tr style="width:100%;">
				  <td style="width:16%;">原因:</td>
				  <td style="width:84%;text-overflow:clip;white-space: pre-wrap;overflow: auto;"><?php echo $_GET['reason']; ?></td>
				</tr>	
			</table>
		</section> 
	</div>
	<div class="author" style="text-align:center;" >
	  <span>技术支持:计科1302</span>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>