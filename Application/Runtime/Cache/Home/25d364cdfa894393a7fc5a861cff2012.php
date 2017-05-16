<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>学生签到系统</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
</head>
<script type="text/javascript">
    function suggestion(){
    	var remark=$('#remark').val();
    	var suggestion=$.trim($('#suggestion').val());
    	$.ajax({
    		type:'post',
    		data:'remark='+remark+'&suggestion='+suggestion,
    		url:'<?php echo U('sign_success'); ?>',
    		success:function(msg){
    			alert(msg);
    		},
    	});
    	
    }
</script>
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
				<label id="classResult">签到签退成功</label>
				</a>
			</div>
		</section>
    <section class="query">
			<table>
			    <tr>
				  <td colspan="2"><img src="<?php echo $info['headimgurl']; ?>" /></td>
				</tr>
				<tr>
				  <td>姓名</td>
				  <td><?php echo $info['remark']; ?></td>
				</tr>
				<tr>
				  <td>昵称</td>
				  <td><?php echo $info['nickname']; ?></td>
				</tr>
				<tr>
				  <td>签到时间</td>
				  <td><?php echo $info['signdate']; ?></td>
				</tr>	
			</table>
		</section>   
		 
		<section>
		 
		 <label>随意吐槽,如给代课老师的建议</label>
		   <textarea rows="5" cols="30" id="suggestion" name="suggestion">
		   </textarea>
		 <input type="hidden" name="remark" id="remark" value="<?php echo $info['remark']; ?>"  />  
		</section>
		<input  type="submit" onclick="suggestion();" value="一键提建议" />
	</div>
	<div class="author"  style="text-align:center;" >
	  <span>技术支持:计科1302</span>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>