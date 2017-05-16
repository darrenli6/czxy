<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>职位详情</title>
		<link rel="stylesheet" href="/Test4/czxy/Public/Home/css/company.css" />
	</head>
	<body>
		<header>
		</header>
		<a id="back" class="a_btn bottL01" href="<?php echo U('index'); ?>"><img src="/Test4/czxy/Public/Home/images/a_back.png"></a>
		<a href="<?php echo U('enterappraise','enterpriseid='.$eData['id']); ?>"   class="a_btn bott">
		<img src="/Test4/czxy/Public/Home/images/a_send.png"   />
	    </a>
		<div class="jobcontent">
			<div class="job">
				<div class="list tit">
					招聘： <?php echo $eData["com_position"]; ?>
				</div>
			   <div class="list cont">
					<a class="company" href="#"> 
						<span>单  位：</span><mark><?php echo $eData['com_name']; ?></mark>
					</a>
					<ul>
						<li>
							<span>校园行认证:</span> <p><?php  if($eData['checkenter']=='企业认证') { echo '企业认证   '.'&nbsp;&nbsp;&nbsp;<img src="/Test4/czxy/Public/Home/images/v.gif"   />'; }else{ echo '企业未认证'; } ?></p>
                               
						</li>
						<li>
							<span>企业热度:</span> <p style="color:red;"><?php echo $eData['com_like']; ?></p>
						</li>
						<li>
							<span>薪资待遇:</span> <p><?php echo $eData['com_salary']; ?></p>
						</li>
						<li>
							<span>招聘人数:</span> <p><?php echo $eData['com_num']; ?></p>
						</li>
						<li>
							<span>学历要求:</span> <p><?php echo $eData['education']; ?></p>
						</li>
						<li>
						     <span>福利待遇:</span> <p><?php echo $eData['fuli']; ?></p>
						</li>
						<li>
							<span>联系电话:</span> <p><?php echo $eData['com_tel']; ?></p>
						</li>
						<li>
							<span>工作地点:</span> <p><?php echo $eData['com_address']; ?></p>
						</li>
						<li>
							<span>简历投放:</span> <p><?php echo $eData['com_email']; ?></p>
						</li>
					</ul>
					
					<div class="job_detail">
						<span>职位描述：</span>
						<p class="job_detailtxt">
							   <?php echo $eData['com_desc']; ?>
						</p>
					</div>
					
				</div>
				
				<div class="btn">
					<button id="apply">
						申请职位
					</button>
				    <!-- <a href=”tel:+13293709664” mce_href=”tel:+13293709664”> <button id="call">
						一键咨询
					</button></a> -->
					<a href="tel:<?php echo $eData['com_tel']; ?>" mce_href="tel:<?php echo $eData['com_tel']; ?>"> <button id="call">
						一键咨询
					</button></a>
					
			</div>
			  
		<p id="us" style="position: fixed;bottom:5px;left:0px;font-size:14px;line-height:1.5;width: 100%;text-align: center;color: #434343;z-index:9;">@计科1302技术支持</p>
		<script type="text/javascript" src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js" ></script>
		<script>
			$("button#apply").click(function(){
			 
					location.href="<?php echo U('apply_write'); ?>";
				 
			});
		</script>
	</body>
</html>