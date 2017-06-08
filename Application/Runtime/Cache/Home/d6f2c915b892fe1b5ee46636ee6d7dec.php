<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>校园行-你就行</title>
		<link rel="stylesheet" href="/czxy/Public/Home/css/company.css"  />
		<style>
			.content .list{float: left;width: 90%;margin: 5px 5%;}
			.content .list label{float: left;width:26%;text-align: left;padding:2px 3%;line-height: 26px;font-size: 14px;}
			.content .list input{float: left;width: 90%;margin: 5px 5%;background: transparent;border-bottom:1px solid #CECECE;}
			.content .list textarea{float: left;width: 90%;margin: 5px 5%;border: 1px solid #CECECE;background: transparent;color: #474747;line-height: 24px;resize: none;}
			.content .btn{float: left;width: 90%;margin: 5px 5%;}
			.content .btn button{float: left;width:80%;margin: 5px 10%;line-height: 28px;padding: 2px 0px;background: #F66E09;color: #fff;border: 1px solid #F66E09;}
		</style>
	</head>
	<body>
		<header></header>
		 
		<a id="back" class="a_btn bottL01" href="index.html"  >
		<img src="/czxy/Public/Home/images/a_back.png"  />
		</a>
		<form action="/czxy/index.php/Home/Job/job_write.html" method="post">
		<div class="content">
		
			<div class="list">
				<label for="company_name">单位名称：</label>
				<input type="text" name="com_name" id="company_name" required="required" maxlength="30" placeholder="如：XX科技有限公司"/>
			</div>
			<div class="list">
				<label for="job">招聘职位：</label>
				<input type="text" id="job" name="com_position" required="required"  maxlength="20" placeholder="如：美工"/>
			</div>
			<div class="list">
				<label for="job">学历要求：</label>
				<select name="education" >
				   <option value="本科">本科</option>
				   <option value="大专">大专</option>
				   <option value="博士">博士</option>
				   <option value="高中">高中</option>
				   <option value="初中">初中</option>
				</select>
			</div>
			<div class="list">
				<label for="job_num">招聘人数：</label>
				<input type="text" id="job_num" name="com_num" required="required" pattern="[0-9]?[0-9]?[0-9]?" placeholder="如：0-999" maxlength="3"/>
			</div>
			<div class="list">
				<label for="job_num">福利：</label>
				<input type="text" id="job_num" name="fuli" required="required"   placeholder="如：五险一金" />
			</div>
			
			<div class="list">
				<label for="job_money">招聘薪资：</label>
				<input type="text" id="job_money" required="required"name="com_salary" maxlength="20" placeholder="如：5000 或  薪资面议"/>
			</div>
			 	
		 
			<div class="list">
				<label for="company_call">联系电话：</label>
				<input type="text" id="company_call" required="required" name="com_tel" placeholder="如：手机号" pattern="(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$"/>
			</div>
		

			<div class="list">
				<label for="job_add">工作地点：</label>
				<input type="text" id="job_add" required="required" name="com_address" placeholder="如：长治学院" maxlength="20"/>
			</div>
			<div class="list">
				<label for="job_infor">职位描述：</label>
				<textarea rows="6" id="job_infor" maxlength="125" name="com_desc" placeholder="如：100字以内"></textarea>
			</div>
			
			<div class="btn">
				<button type="submit" id="tijiao">
					发布招聘
				</button>
			</div>
			
			
		</div>
		</form>
		<script type="text/javascript" src="/czxy/Public/Home/js/jquery-1.8.3.min.js"   ></script>
		    <script>
		   </script>
	</body>
</html>