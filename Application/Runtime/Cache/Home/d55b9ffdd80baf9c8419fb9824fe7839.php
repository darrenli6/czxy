<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<title>个人简历</title>
		<link rel="stylesheet" href="/czxy/Public/Home/css/company.css" />
		<style>
			.person_list{float: left;width: 90%;margin:0px 5%;border-top: 1px solid #ECECEC;padding:5px 0px 2px 0px;color: #474747;}
			.person_list h3{float: left;width:100%;line-height:32px;text-align: center;margin: 4px 0px;} 
			.person_list span{float: left;width: 30%;line-height: 28px;margin-left: 0;font-size: 14px;}
			.person_list p{float: left;width:60%;padding: 0px 2px;line-height: 28px;text-align: left;font-size: 14px;}
		</style>
	 
	</head>
	<body>
		<header>
		</header>
		<!-- <a id="back" class="a_btn bottL01" href="apply_person.html"><img src="/czxy/Public/Home/images/a_back.png"></a> -->
		<a id="back" class="a_btn bottL01" href="<?php echo U('apply_person'); ?>"><img src="/czxy/Public/Home/images/a_back.png"></a> 
		<div class="content">
			<div class="person_list">
				<h3>个人简历</h3>
			</div>
			<div class="person_list">
				<span>姓名：</span>
				<p><?php  echo $aData['name']; ?></p>
			</div>
			<div class="person_list">
				<span>性别：</span>
				<p><?php  echo $aData['sex']; ?></p>
			</div>
			<div class="person_list">
				<span>学历：</span>
				<p><?php  echo $aData['education']; ?></p>
			 </div>
			<div class="person_list">
				<span>期望职位：</span>
				<p><?php  echo $aData['position']; ?></p>
			 </div>
			<div class="person_list">
				<span>Email：</span>
				<p><?php  echo $aData['email']; ?></p>
			 </div>
			<div class="person_list">
				<span>联系电话：</span>
				<p><?php  echo $aData['tel']; ?></p>
			</div>
			<div class="person_list">
				<span>自我介绍：</span>
				<p><?php  echo $aData['apply_info']; ?></p>
			</div>
			<div class="person_list">
				<span>工作经验：</span>
				<p><?php  echo $aData['exprience']; ?>  </p>
			</div>
		</div>
		<div class="btn">
			<a href="tel:13546515976" mce_href="tel:13546515976"> <button class="call" id="call">
				一键联系
			</button></a>
		</div>
	</body>
</html>