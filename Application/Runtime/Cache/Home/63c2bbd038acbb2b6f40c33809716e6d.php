<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行-签到</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.min.css">
	<script src="/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/style.css">
</head>
<script type="text/javascript">
   $(document).ready(function(){
	    $.ajax({
	    	type:'GET',
	    	url:'wificheckmac',
	    	data:'phone=<?php echo session('username'); ?>',
	    	success:function(msg)
	    	{
	    		if(msg=='ok')
	    		{
	    			$('#signin').attr('disabled',false);
	    			$('#result').html('探针检查到您的设备，请进行签到');
	    		}else{
	    			$('#signin').attr('disabled',true);
	    			$('#result').html(msg);
	    		}
	    	},
	    		
	    });
   });
   
   function wifisign(){
	   window.location.href="<?php echo U('Teaching/wifisign_success');?>";
	   return false;
   }
   function shuaxin(){
	   window.location.href="<?php echo U('Teaching/wifisignin');?>";
	   return false;
   } 
</script>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行,任我行.</h1>
	     <a class=" mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
  
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			 <span id="result" ></span>
		</section>
		<section class="xueqi">
				<input type="submit" disabled="disabled" id="signin" onclick="wifisign()" value="一键签到签退"/>
		</section>
		<section >
		 <span style="color:red;">*  注意:</span>
		 <ul>
		  <li>请通知管理员，用你的手机号绑定手机MAC地址</li>
		  <li>尽量打开无线WLAN</li>
		  <li>尝试刷新</li>
		 </ul>
		</section>
		<section class="xueqi">
				<input type="submit"  id="button" onclick="shuaxin()" value="刷新"/>
		</section>
	</div>
	<div class="author" style="text-align:center;margin-top:200px;" >
	  <span>技术支持:计科1302</span>
	</div>
	<script src="/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>