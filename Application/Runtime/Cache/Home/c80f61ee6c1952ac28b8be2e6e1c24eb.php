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
</style>
<body>
    
	<div class="content">
		<ul>
		    <?php foreach($vData as $k=>$v):?>
			<li>
				<div class="applyperson_list">
					<div class="applyperson_img">
					   <a href="<?php echo U('index','voteid='.$v['id'])?>">
						<img src="/czxy/Public/Home/images/ping.png"  />
						</a>
					</div>
					<div class="applyperson_txt">
						<p >标题：<a href="#">
						     <?php echo $v['title']; ?></a></p>
						<p class="job_company">描述：
						   <?php echo $v['info']; ?>
						</p>
						  
					</div>
				</div>
			</li>
	    <?php endforeach; ?>
		</ul>
	</div>
	<a id="back"     href="<?php echo U('Index/index'); ?>"  >
		<img src="/czxy/Public/Home/images/a_back.png"  />
		</a>
   <script type="text/javascript" src="/czxy/Public/Home/js/jquery-1.8.3.min.js"  ></script>
   <script>
   	  
   </script>
</body>
</html>