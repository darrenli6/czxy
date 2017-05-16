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
  <script type="text/javascript">
	$(document).ready(function() {
		$("#button").click(function() {
			 
			$("#retData").html('loading...');

			var stuno = $("#stuno").val();
			var periodno = $("option:selected").val();
			 
			$.get("<?php echo U('getgradeinfo'); ?>", {
				stuno:stuno,
				periodno:periodno,
			}, function(data) {
				
				$("#retData").html(data);
			});

			return false;
		});
	});
	
</script>
</head>
<style type="text/css">

</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">查询成绩</h1>
		<a class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
	<!-- 右上角弹出菜单 -->
 
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			 <input name="stuno" class="tip" type="text" id="stuno" value="" placeholder="请输入学号" />	 
		     <select name="periodno"  >
		     <?php foreach($pData as $k=>$v ): ?>
		     <option   value="<?php echo $v['id']; ?>"><?php echo $v['periodname']; ?></option>
		     <?php endforeach; ?>
		     </select>
		     <input type="submit"    id="button" value="查询" />
			<br />
			<br />
			 <div id="retData" style="color:#000;">
		    
			 
			</div>
		 
		</section>
       
			 
		
		
		 
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>