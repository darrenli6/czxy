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
     <script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
</head>
    <script>
     function checkold(){
    	 var oldpassword=$('#oldpassword').val();
    	  
    	 $.ajax({
    		 url:"checkoldpwd",
    		 type:"POST",
    		 data:"oldpassword="+oldpassword,
    		 success:function(msg){
    			 $('#feedback').html(msg);
    		 }
    	 });
    	 
     }
     
     function checkagain(){
    	 
    	 var pwd1=$('#newpassword1').val();
    	 var pwd2=$('#newpassword2').val();
    	 if(pwd1==pwd2){
    		 $('#result').html('密码一致');
    	 }else{
    		 $('#result').html('密码不一致');
    	 }
     }
       
    </script>
<style >

</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行-个人中心</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('personCenter'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
	<!-- 右上角弹出菜单 -->
	<div id="topPopover" class="mui-popover">
			<div class="mui-popover-arrow"></div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell"><a href="<?php echo U('News/lst'); ?>">新闻中心</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Job/index'); ?>">兼职中心</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Teaching/index'); ?>">教学小助手</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Vote/index'); ?>">风云人物</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Other/index'); ?>">生活百宝箱</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Secondhand/index'); ?>">二手街</a></li>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 主内容部分 -->
	<div class="content">
		 <form action="/Test4/czxy/index.php/Home/PersonCenter/modifypwd.html" method="post"  >
		<section class="personData">
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell mui-media">
					<a class="mui-navigate-right" href="#">
					    <br />
						<label class="name">
					   旧密码
						<input type="password" placeholder="请输入你的旧密码"  id="oldpassword"  onblur="checkold();" name="oldpassword" value="" />
						</label>
					</a>
					<span id="feedback" style="color:red;" ></span>
				</li>
			</ul>
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell mui-media">
					<a class="mui-navigate-right" href="#">
					    <br />
						<label class="name">
					  新密码
						<input type="password" placeholder="请输入你的新密码" id="newpassword1" name="newpassword1" value="" />
						</label>
					</a>
				</li>
			</ul>
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell mui-media">
					<a class="mui-navigate-right" href="#">
					    <br />
						<label class="name">
					   再次输入
						<input type="password" onblur="checkagain();" placeholder="再次输入新密码" id="newpassword2" name="newpassword2" value="" />
						</label>
					</a>
					<span id="result" style="color:red;"></span>
				</li>
			</ul>
		 
			<ul>	 
				<li class="mui-table-view-cell">
					<input type="submit"     value="确认修改" /> 
					<input type="button"  onclick="javascript:location.href='personCenters'"     value="返回" /> 					
				</li>
			</ul>
		</section>
		</form>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>