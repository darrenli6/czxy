<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<title>企业个人中心</title>
		<link rel="stylesheet" href="company.css" tppabs="http://suibianservice.52funnet.com/zhaopin/css/company.css" />
		<style>
		   .content .list{float: left;width:90%;font-size: 14px;color: #272727;margin-left:5%;margin-top: 10px;border-bottom:1px solid #ECECEC ;}
			.content .list span{float: left;width:25%;line-height:30px;padding: 2px 2%;}
			.content .list mark{float: left;width:20%;padding: 2px 2%;line-height: 30px;margin-left:45%;background: transparent;}
		</style>
	</head>
	<body>
		<header>
			<div class="com" id="com_name">
				
			</div>
		</header>
		<footer>
			<nav>
				<ul>
	                <a href="index.jsp.htm" tppabs="http://suibianservice.52funnet.com/zhaopin/index.jsp">
						<li>
							企业招聘会
						</li>
	                </a>
	                <a href="company_center.html" tppabs="http://suibianservice.52funnet.com/zhaopin/company_center.html">
						<li>
							企业个人中心
						</li>
					</a>
				</ul>	
			</nav>
		</footer>
		<div class="content">
			<div class="company"></div>
			<div class="company_cont">
				<a href="apply_person.html" tppabs="http://suibianservice.52funnet.com/zhaopin/apply_person.html">
				<div class="list">
					
					<span>已投简历</span>
					<mark id="apply_num"><input value="0" type="text" id="jianlinum"/></mark>
				</div>
				</a>
				
				<a href="send_txt.html" tppabs="http://suibianservice.52funnet.com/zhaopin/send_txt.html">
					<div class="list">
						<span>招聘发布</span>
						<mark id="send_num"><input value="0" type="text" id="enternum"/></mark>
					</div>
				<a>
			</div>
		</div>
		<script type="text/javascript" src="jquery-1.8.3.min.js" tppabs="http://suibianservice.52funnet.com/zhaopin/js/jquery-1.8.3.min.js" ></script>
		   <script>
			   $(function(){
			  		if(localStorage.getItem("enterphonenum")!=null){
			  			$.ajax({
			   			url:"http://suibianservice.52funnet.com/EnterpriseAction!qiyelist?phonenum="+localStorage.getItem("enterphonenum"),
			   			dataType:"json",
			   			success:function(data){
			   				$("#jianlinum").attr("disabled",true); 
			   				$("#jianlinum").val(data.jianlinum);
			   				$("#enternum").attr("disabled",true); 
			   				$("#enternum").val(data.enternum);
			   				$("#com_name").empty();
			   				$("#com_name").append("<p class='com_nam'>"+data.name+"</p>");
			   			},
			   			error:function(data){
			   				alert("this is a error!");
			   			}
			   		});
			  	}	
			});
		   </script>
	</body>
</html>