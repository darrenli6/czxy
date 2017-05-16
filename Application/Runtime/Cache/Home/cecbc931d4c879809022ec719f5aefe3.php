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
	<script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
</head>
 <script>
   function refresh()
   {
	   
	   location.href="<?php echo U('signstatebanji'); ?>";
   }
   $(function(){
	  var total= $("#timeTable tr td ").children('span').length;
	  var yes= $("#timeTable tr td ").children('span:contains(已签到)').length;
	  var no= $("#timeTable tr td ").children('span:contains(未签到)').length;
	  
	  $("#total").text(total);
	  $("#real").text(yes);
	  $("#empty").text(no);
   });
   
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
		<h1 class="mui-title">校园行,签到情况.</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
  
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			<div class="class">
				<label id="classResult" >应到
				<span id="total"></span>人,实到<span id="real"></span>人,缺<span id="empty"></span>人</label>
				</a>
			</div>
		</section>
		 
		<input id="refresh" type="button" onclick="refresh();" value="刷新" />
	    <br />
	    <br />
	     
		<section class="query">
				<table id="timeTable" >
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>签到状态</th>
					 
				</tr>
				 <?php foreach($uData as $k=>$v): ?>
				<tr >
					<td class="timetable-course"><?php echo $v['nickname']; ?></td>
					<td class="timetable-course"><?php echo $v['sex']; ?></td>
					<td class="timetable-course" >
					<?php  if($data): foreach($data as $k1=>$v1) { if($v['nickname']==$v1['remark'] ) { echo '<span id="hassign" style="color:red;">已签到</span>'; exit; } else{ echo '<span id="notsign" style="color:black;">未签到</span>'; exit; } } else: echo '<span id="notsign" style="color:black;">未签到</span>'; endif; ?>
					</td>
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