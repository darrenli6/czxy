<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>校园行-你就行</title>
    <link rel="stylesheet" href="/Test4/czxy/Public/Home/css/company.css"    />
    <script type="text/javascript">
    </script>
</head>
<style>
 #back img{
 	position:absolute;
 	top:10px;
    right:10px;
	 
    margin: 4px;
    width: 32px;
 }
</style>
<body>
 
	<header></header>
	 
	<footer>
		<nav>
			<ul>
				<li>
                    <a href="index.html"  >
						工作信息
                    </a>
				</li>
                <a href="apply_person.html"  >
					<li>
						个人展示
					</li>
				</a>
			</ul>	
		</nav>
	</footer>
	<a href="apply_write.html"   class="a_btn bott">
		<img src="/Test4/czxy/Public/Home/images/a_send.png"   />
	</a>
	<div class="content">
		<ul>
		   <?php foreach($ajData as $k=>$v) : ?>
			<li>
				<div class="applyperson_list">
					<div class="applyperson_img">
					   <a href="<?php echo U(resume,'positionid='.$v['id']);?>">
						<img src="/Test4/czxy/Public/Home/images/yingpin.jpg"  />
						</a>
					</div>
					<div class="applyperson_txt">
						<p >姓名：<a href="<?php echo U(resume,'positionid='.$v['id']);?>">
						<?php echo $v['name']; ?></a></p>
						<p class="job_company">学历：<?php echo $v['education']; ?></p>
						<p class="job_address">招聘职位：<?php echo $v['position']; ?></p>
						<p class="apply_me">自我介绍： <?php echo $v['apply_info']; ?></p>
					</div>
				</div>
			</li>
	    <?php endforeach; ?>
		</ul>
	</div>
	<a id="back"     href="<?php echo U('Index/index'); ?>"  >
		<img src="/Test4/czxy/Public/Home/images/a_back.png"  />
		</a>
   <script type="text/javascript" src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"  ></script>
   <script>
   	  
   </script>
</body>
</html>