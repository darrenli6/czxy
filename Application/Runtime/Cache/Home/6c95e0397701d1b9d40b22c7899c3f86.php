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

			var who= $.trim($("#who").val());
			var where =  $.trim($("#where").val());
			var con =  $.trim($("#congratulation").val());
			var phone = $.trim($("#phone").val()); 
			$.get("<?php echo U('congratulation'); ?>", {
			    who:who,
			    where:where,
				con:con,
				phone,phone,
			}, function(data) {
				if($.trim(data)=='ok')
				{	
				$("#retData").html("发送成功!");
				$("#button").attr('disabled',true);
				setTimeout("$(\"#button\").attr('disabled',false)",5000);
				}else{
				 $("#retData").html(data);	
				}
		});

			return false;
		});
	});
	function checkphone()
	{
		var phone = $.trim($("#phone").val());
		var reg=/^1[0-9]{10}$/;
		if(phone!=''  )
		 	{
			if(phone.match(reg))
				{
				$("#ret").text('');
			 	$("#button").attr('disabled',false);
				}else{
				 $("#ret").text('手机号格式不正确');	
				 $("#button").attr('disabled',true);
				 $("#phone").focus(); 
				}
		 
		 	}else{
			 	$("#ret").text('请认真填写手机号');
			 	$("#button").attr('disabled',true);
			 	$("#phone").focus(); 
		 	}	      
}
</script>
</head>
<style type="text/css">

</style>
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
		     <input name="phone" class="tip" type="text" id="phone" onblur="checkphone();" value="" placeholder="请输入手机号" />	 
			 <span style="color:red" id="ret"></span> 
			 <input name="who" class="tip" type="text" id="who" value="" placeholder="请输入姓名" />	 
			 在<input name="where" class="tip" type="text" id="where" value="" placeholder="请输入领域:如考研" />	 
		      <textarea rows="5" cols="12" placeholder="祝福语" id="congratulation"></textarea> 
		     <input type="submit"     id="button" value="发送" />
				
			 <div id="retData" style="color:#000;">
		    
			 
			</div>
		 
		</section>
       
			 
		
		
		 
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>