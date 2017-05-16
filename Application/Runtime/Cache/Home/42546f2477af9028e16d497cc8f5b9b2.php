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
	<a href="job_write.html"   class="a_btn bott">
		<img src="/Test4/czxy/Public/Home/images/a_send.png"   />
	</a>
	<div class="content">
		<ul>
		  <?php foreach($foData as $k=>$v): ?>
			<li>
				<div class="company_joblist">
					<div class="company_img"  >
					    <a href="<?php echo U(enterprise,'jobid='.$v['id']); ?>">
						<img src="/Test4/czxy/Public/Home/images/pin.jpg"   />
					    </a>
					</div>
					<div class="company_jobtxt">
						<p class="job_position">职位:<a href="<?php echo U(enterprise,'jobid='.$v['id']); ?>"><?php echo $v['com_position']; ?></a></p>
						<p class="job_company">单位:<?php echo $v['com_name']; ?></p>
						<p class="job_address">地址:<?php echo $v['com_address']; ?></p>
						<p class="job_tel">联系方式:<?php echo $v['com_tel']; ?></p>
					</div>
					<div class="tip_look">
						<img src="/Test4/czxy/Public/Home/images/heart.png" onclick="addlike(<?php echo $v['id']; ?>)" /><span id="look_num<?php echo $v['id']; ?>">
						  <?php echo $v['com_like']; ?>
						</span>
					</div>
				</div>
			</li>
	   <?php endforeach; ?>
		</ul>
	</div>
	<a id="back"     href="<?php echo U('Index/index'); ?>" >
		<img src="/Test4/czxy/Public/Home/images/a_back.png"  />
		</a>
   <script type="text/javascript" src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"  ></script>
   <script>
   	  function addlike(jobid){
   		  var jid=jobid;
   		   
   		  $.ajax({
   			  type:"GET",
   			  url:"<?php echo U('ajaxaddlike','',false); ?>/jobid/"+jid,
   		      success:function(data){
   		    	  $('#look_num'+jid).html(data); 
   		      }			  
   		  });
   	  }
   </script>
</body>
</html>