<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<title>申请人简历</title>
		<link rel="stylesheet" href="company.css" tppabs="http://suibianservice.52funnet.com/zhaopin/css/company.css" />
		<!--百度流量统计-->	
		<script>
					var _hmt = _hmt || [];
					(function() {
					  var hm = document.createElement("script");
					  hm.src = "hm.js-4f2d04c1252e61c7099713f3552b7aa3"/*tpa=http://hm.baidu.com/hm.js?4f2d04c1252e61c7099713f3552b7aa3*/;
					  var s = document.getElementsByTagName("script")[0]; 
					  s.parentNode.insertBefore(hm, s);
					})();
		</script>
	</head>
	<body>
		<header></header>
		<!-- <a id="back" class="a_btn bottL01" href="company_center.html"><img src="img/a_back.png"></a> -->
		<div class="content">
		<ul id="content">
			<!-- <li>
				<div class="applyperson_list">
					<div class="applyperson_img">
						<img src="img/apply_img.jpg"/>
					</div>
					<div class="applyperson_txt">
						<p >姓名：鲁肃</p>
						<p class="job_company">学历：本科</p>
						<p class="job_address">招聘职位：文秘</p>
						<p class="apply_me">自我介绍：我是来应聘的，哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</p>
					</div>
				</div>
			</li> -->
	    </ul>
	    </div>
	    <footer>
		<nav>
			<ul>
				<li>
                    <a href="index.jsp.htm" tppabs="http://suibianservice.52funnet.com/zhaopin/index.jsp">
						企业招聘会
                    </a>
				</li>
                <a href="apply_personlist.html" tppabs="http://suibianservice.52funnet.com/zhaopin/apply_personlist.html">
					<li>
						人才专区
					</li>
				</a>
			</ul>	
		</nav>
	</footer>
	    <script type="text/javascript" src="jquery-1.8.3.min.js" tppabs="http://suibianservice.52funnet.com/zhaopin/js/jquery-1.8.3.min.js" ></script>
	    <script>
				$.ajax({
		   			url:"http://suibianservice.52funnet.com/EnterpriseAction!listjianliall",
		   			dataType:"json",
		   			success:function(data){
		   				$("#content").empty();
		   				var result = data.result;
		   				
		   				$(result).each(function(i){
		   				$("#content").append(
		   					"<li><div class='applyperson_list'><input value='"+result[i].id+"' type='hidden'/><div class='applyperson_img'><img src='apply_img.jpg'/*tpa=http://suibianservice.52funnet.com/zhaopin/img/apply_img.jpg*//></div>"
		   					+"<div class='applyperson_txt'><p>姓名："+result[i].name+"<p class='job_company'>学历："+result[i].xueli+"</p>"
		   					+"<p class='job_address'>性别："+result[i].sex+"</p><p class='apply_me'>自我介绍："+result[i].jianjie+"</p>"
		   					+"</div></div></li>"
		   					);
		   				});
		   			},
		   			error:function(data){
		   				alert("this is a error!");
		   			}
		   		});
	    	$(".applyperson_list").live("click",function(){	
	    		location.href="EnterpriseAction!listjianlione-id=.htm"/*tpa=http://suibianservice.52funnet.com/zhaopin/EnterpriseAction!listjianlione?id=*/+$(this).find("input").val();
	    	});
	    </script>
	</body>
</html>