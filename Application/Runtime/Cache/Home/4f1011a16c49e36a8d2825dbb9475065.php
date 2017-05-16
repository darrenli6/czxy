<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>校园行-你就行</title>
		<link rel="stylesheet" href="/Test4/czxy/Public/Home/css/company.css"  />
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
		<header>
		
		</header>
		<a id="back" class="a_btn bottL01" href="apply_person.html"  >
		<img src="/Test4/czxy/Public/Home/images/a_back.png"  />
		</a>
		<form action="/Test4/czxy/index.php/Home/Job/apply_write.html" method="post">
		<div class="content">
		
			<div class="list">
				<label for="company_name">姓名：</label>
				<input type="text" name="name" id="company_name" required="required" maxlength="30" placeholder="如：张三"/>
			</div>
			<div class="list">
				<label for="company_name">性别：</label>
                <select name="sex">
                   <option value="男">男</option>
                   <option value="女">女</option>
                </select>
			</div>
			<div class="list">
				<label for="job">职位：</label>
				<input type="text" id="job" name="position" required="required"  maxlength="20" placeholder="如：美工"/>
			</div>
			<div class="list">
				<label for="job_num">学历：</label>
				<input type="text" id="job_num" name="education" required="required"   placeholder="如：本科" maxlength="3"/>
			</div>
	 
			<div class="list">
				<label for="company_call">联系电话：</label>
				<input type="text" id="company_call" required="required" name="enterprise.phonenum" placeholder="如：手机号" pattern="(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$"/>
			</div>
		    <div class="list">
				<label for="company_call">qq：</label>
				<input type="text" id="company_call" required="required" name="qq" placeholder="如：qq" />
			</div>
               
            <div class="list">
				<label for="company_call">邮箱：</label>
				<input type="text" id="company_call" required="required" name="email" placeholder="如：xxx@qq.com" />
			</div>   
            <div class="list">
				<label for="company_call">工作经验：</label>
				<input type="text" id="company_call" required="required" name="exprience" placeholder="如：做过某种工作" />
			</div>   
			 
			<div class="list">
				<label for="job_infor">自我描述：</label>
				<textarea rows="6" id="job_infor" maxlength="125" name="apply_info" placeholder="如：100字以内"></textarea>
			</div>
			
			<div class="btn">
				<button type="submit" id="tijiao">
					申请职位
				</button>
			</div>
			
			
		</div>
		</form>
		<script type="text/javascript" src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"   ></script>
		    <script>
		   </script>
	</body>
</html>