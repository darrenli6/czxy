<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>签到</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
</head>
<script type="text/javascript">
   function sign(){
	    
	   window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx403bd0f3aa5f5fc3&redirect_uri=http://www.51pinqu.com/Test4/czxy/index.php/Home/Teaching/signin&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
	   return false;
   }
   //https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx403bd0f3aa5f5fc3&redirect_uri=http://www.51pinqu.com/Test4/czxy/index.php/Home/Teaching/signin&response_type=code&scope=snsapi_base&state=1#wechat_redirect
</script>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行,任我行.</h1>
		<a class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="javascript:history.go(-1)"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
  
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
		    
		    
			<div class="class">
				<label id="classResult" onclick="sign();">一键签到签退</label>
			</div>
		</section>
	</div>
	<div class="author" style="text-align:center;margin-top:200px;" >
	  <span>技术支持:计科1302</span>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>