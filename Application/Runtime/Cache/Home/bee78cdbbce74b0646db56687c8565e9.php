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
		    <?php foreach($bData as $k=>$v):?>
			<li>
				<div class="applyperson_list">
					<div class="applyperson_img">
					   <a href="<?php echo U('detail','bid='.$v['id'])?>">
						<img src="/czxy/Public/Home/images/broadcast.png"  />
						</a>
					</div>
					<div class="applyperson_txt">
						<p >标题：<a href="<?php echo U('detail','bid='.$v['id'])?>">
						     <?php echo $v['title']; ?></a></p>
						<p class="job_company">主办方：
						   <?php echo $v['leader']; ?>
						</p>
						<p class="job_company" style="font-size:12pt;">发布时间：
						   <?php echo substr($v['adddate'],0,10); ?>
						</p>  
					</div>
					<div class="tip_look">
						<img src="/czxy/Public/Home/images/visited.png"   /><span id="look_num">
						    <?php echo $v['visited']; ?>
						</span>
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