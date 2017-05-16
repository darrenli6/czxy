<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>教学小助手</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.min.css">
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/style.css">
</head>
<style type="text/css">
 
  .author span{
	 
  	margin:30% 30%;
  }
</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行,任我行.</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('Index/index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
	<!-- 右上角弹出菜单 -->
	<div id="topPopover" class="mui-popover">
			<div class="mui-popover-arrow"></div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view">
						<li class="mui-table-view-cell">
							<a href="<?php echo U('Index/index'); ?>">首页</a>
						</li>
						<li class="mui-table-view-cell">
							<a href="<?php echo U('LogReg/login'); ?>">登陆</a>
						</li>
						<li class="mui-table-view-cell">
							<a href="<?php echo U('Broadcast/index'); ?>">校园广播</a>
						</li>
						<li class="mui-table-view-cell">
							<a href="<?php echo U('News/lst'); ?>">新闻中心</a>
						</li>
						<li class="mui-table-view-cell">
							<a href="<?php echo U('Other/index'); ?>">生活百宝箱</a>
						</li>
						 
						<li class="mui-table-view-cell">
							<a href="<?php echo U('FeedBack/index'); ?>">反馈</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 主内容部分 -->
	<div class="content">
		 

		<section class="query">
			<table>
				<tr>
					<td>
						<a href="<?php echo U('teach'); ?>">
							<img src="/czxy/Public/Home/images/timetable.png">
							<p>课表查询</p>
						</a>
					</td>
				<?php if(session('roleid')==2): ?>	
					<td>
						<a href="<?php echo U('signstate'); ?>">
							<img src="/czxy/Public/Home/images/classroom.png">
							<p>签到情况</p>
						</a>
					</td>
				<?php endif; ?>
				<?php if(session('roleid')==3): ?>	
					<td>
						<a href="<?php echo U('signstatebanji'); ?>">
							<img src="/czxy/Public/Home/images/classroom.png">
							<p>签到情况</p>
						</a>
					</td>
				<?php endif; ?>
				
				</tr>
			 <tr>
			   	<?php if(session('roleid')): ?>	
					<td>
						<a href="<?php echo U('gradeinfo'); ?>">
							<img src="/czxy/Public/Home/images/chengji.png">
							<p>查询成绩</p>
						</a>
					</td>
				<?php endif; ?>
			 <?php if(session('username')=='15135580287'): ?>	
					<td>
						<a href="<?php echo U('sendmessage'); ?>">
							<img src="/czxy/Public/Home/images/fankui.png">
							<p>祝福短信</p>
						</a>
			 </td>
			 <?php endif; ?>
			 </tr>
			 <tr>
					<td>
						<a href="<?php echo U('wifisignin'); ?>">
							<img src="/czxy/Public/Home/images/wifisign.png">
							<p>探针签到</p>
						</a>
					</td>
					
			 </tr>	
			 <tr>
			 <td>
						<a href="<?php echo U('classroomdev'); ?>">
							<img src="/czxy/Public/Home/images/wififindjs.jpg">
							<p>查找教室</p>
						</a>
					</td>
			 </tr>	
			</table>
		</section>
	</div>
	<div class="author" >
	  <span>技术支持:计科1302</span>
	</div>
	<script src="/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>