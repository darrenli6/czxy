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
		<a id="back" class="a_btn bottL01" href="<?php echo U('index'); ?>"  >
		<img src="/Test4/czxy/Public/Home/images/a_back.png"  />
		</a>
		<form action="/Test4/czxy/index.php/Home/Secondhand/write_second.html" method="post" enctype="multipart/form-data">
		<div class="content">
		
			<div class="list">
				<label for="company_name">标题：</label>
				<input type="text" name="title" id="company_name" required="required" maxlength="30" placeholder="如：一件很漂亮的衣服"/>
			</div>
			<div class="list">
				<label for="job">图片：</label>
				<input type="file"  name="title_pic"/>
			</div>
			<div class="list">
				<label for="job_num">原价：</label>
				<input type="text" id="job_num" name="old_price" required="required"   placeholder="如：88" maxlength="4" pattern="[\d]{1,10}" />
			</div>
	 
			<div class="list">
				<label for="company_call">现在价格：</label>
				<input type="text" id="company_call" required="required" name="now_price" placeholder="如：66" maxlength="4" pattern="[\d]{1,10}"/>
			</div>
		    <div class="list">
				<label for="company_call">发布人姓名：</label>
				<input type="text" id="company_call" required="required" name="public_name" placeholder="如：张三" />
			</div>
               
            <div class="list">
				<label for="company_call">qq：</label>
				<input type="text" id="company_call" required="required" name="qq" placeholder="如：你的qq号" pattern="[\d]{5,10}" />
			</div>   
            <div class="list">
				<label for="company_call">二手货种类：</label>
				<br />
				<select name="categoryid">
				<?php  foreach($tData as $k=>$v): ?>
				 <option value="<?php echo $v['id'] ?>">
				    <?php  echo $v['name']; ?>
				 </option>
				<?php endforeach; ?>
				</select> 
			</div>   
			<div class="list">
				<label for="job_infor">二手货描述：</label>
				<textarea rows="6" id="job_infor" maxlength="125" name="content" placeholder="如：100字以内,详细描述你的货物属性,周期."></textarea>
			</div>
			
			<div class="btn">
				<button type="submit" id="tijiao">
					发布信息
				</button>
			</div>
			
		</div>
		</form>
		<script type="text/javascript" src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"   ></script>
		    <script>
		   </script>
	</body>
</html>