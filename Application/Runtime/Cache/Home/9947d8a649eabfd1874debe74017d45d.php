<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>签到情况</title>
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
 <script>
   function refresh()
   {
	   
	   location.href="<?php echo U('signstate'); ?>";
   }
 </script>
 <style type="text/css">
  #refresh{
	position: absolute;
  	top:120px;
  	left:250px;
  	background: #40E0D0;
  }
</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行,任我行.</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
  
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			<div class="class">
				<label id="classResult">签到状态:签到人数<?php echo $num['num']; ?></label>
				</a>
			</div>
		</section>
		 
		<input id="refresh" type="button" onclick="refresh();" value="刷新" />
	    <br />
	    <br />
	     
		<section class="query">
				<table id="timeTable">
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>头像</th>
					 
				</tr>
				 <?php foreach($data as $k=>$v): ?>
				<tr>
					<td class="timetable-course"><?php echo $v['remark']; ?></td>
					<td class="timetable-course"><?php  if($v['sex']==1) echo '男'; else if($v['sex']==2) echo '女'; else echo '未知'; ?></td>
					<td class="timetable-course"><img src="<?php echo $v['headimgurl']; ?>" /></td>
				</tr>
			    <?php endforeach; ?>
                <!--  
                  <tr>
					<td colspan="6">对不起,没有数据. </td>
				</tr> 	 
		       	 -->
			</table>
		</section>
	</div>
	
	
	<div class="author" style="text-align:center;margin-top:100px;" >
	  <span>技术支持:计科1302</span>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>