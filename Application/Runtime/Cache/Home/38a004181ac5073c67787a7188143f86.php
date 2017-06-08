<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.min.css">
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<script src="/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/style.css">
</head>
    <script language="javascript">
	$(document).ready(function() {
		$("#button").click(function() {
			 
			$("#retData").html('loading...');

			var keywordc = $("#answer").val();
			 
			$.get("<?php echo U('getanswer'); ?>", {
				keyword1 : keywordc
			}, function(data) {
				$("#retData").html(data);
			});

			return false;
		});
	});
</script>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行</h1>
		<a class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
	<!-- 右上角弹出菜单 -->
 
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			 <input name="keywordc" class="tip" type="text" id="answer" value="" placeholder="你想要问智能机器人什么呢?比如某地天气状况" />	 
		     <input type="submit"    id="button" value="提问" />
			 <div id="retData" style="color:#000;">
		  
			</div>
		 
		</section>
       
			 
		
		
		 
	</div>
	<script src="/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>