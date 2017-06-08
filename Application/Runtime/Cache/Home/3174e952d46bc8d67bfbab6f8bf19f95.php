<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>校园行-你就行</title>
    <link rel="stylesheet" href="/czxy/Public/Home/css/company.css"    />
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
 #pat{width:200px;margin-top:65px;margin-left:35px;height:21px;border:1px solid blue;}
 #son{height:100%;background-color:lightblue;}
</style>
<body>
    
	<header></header>
		
	 
	<a href="classroomdev.html"   class="a_btn bott">
		<img src="/czxy/Public/Home/images/refresh.png"   />
	</a>
	<div class="content">
		<ul>
		 <?php foreach($devInfo as $k=>$v): ?>
			<li>
				<div class="company_joblist">
					<div class="company_img"  >
					    <a href="<?php echo U(enterprise,'jobid='.$v['id']); ?>">
						<img src="/czxy/Public/Home/images/classroomlogo.png"   />
					    </a>
					</div>
					<div class="company_jobtxt">
						<p class="job_position">教室地点:<?php echo $v['classroomaddr']; ?></p>
						<p class="job_company">教室容纳人数:<?php echo $v['roomcapacity']; ?></p>
						<p class="job_address">流量:
						<?php  foreach($macinfo as $k1=>$v1){ if($k1==$v['devid']) { $per=$v['roomcapacity']/count($v1); } } ?>
						<div id="pat" >
					       <div id="son" style="width:<?php echo $per; ?>%;">
                           </div>
						</div>
						</p>
					</div>
					 
				</div>
			</li>
	    <?php endforeach; ?>
		</ul>
	</div>
	<a id="back"     href="<?php echo U('Teaching/index'); ?>" >
		<img src="/czxy/Public/Home/images/a_back.png"  />
		</a>
   <script type="text/javascript" src="/czxy/Public/Home/js/jquery-1.8.3.min.js"  ></script>
   <script>
  
   </script>
</body>
</html>