<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>公司评价</title>
		<link rel="stylesheet" href="/czxy/Public/Home/css/company.css" />
	</head>
 
		<style type="text/css">
			*{
				margin: 0;
			}
			.box{
				width: 100%;
				 
			}
			.list{
				margin: 0 50px;
				width: 30%;
				float: left;
			}
			a{
				font-size: 15px;
				text-decoration: none;
				color: lightgray;
			}
			span{
				font-size:15px;
				padding-top: 10px;
				margin-left: 50px;
			}
			.c1{
				color: crimson;
			}
			.c2{
				color: goldenrod;
			}
			.c3{
				color: yellow;
			}
			.c4{
				color: orange;
			}
			.c5{
				color: limegreen;
			}
			.job_detailtxt{
	           margin:0 auto;
			}
		</style>
		 <script type="text/javascript" src="/czxy/Public/Home/js/jquery-1.8.3.min.js"  ></script>
		 <script type="text/javascript" src="/czxy/Public/Home/js/my.js"  ></script>
   
	<body>
		<header>
		</header>
		<a id="back" class="a_btn bottL01" href="<?php echo U('index'); ?>"><img src="/czxy/Public/Home/images/a_back.png"></a>
		 
		<div class="jobcontent">
		<form action="/czxy/index.php/Home/Job/enterappraise/enterpriseid/1.html" method="post">
		<input name="appraisenum" id="appraisenum" value="" type="hidden" />
		<input name="enterpriseid"  value="<?php echo $fData['id']; ?>" type="hidden" />
			<div class="job">
				<div class="list tit">
					企业"<?php echo $fData['com_name']; ?>"评价
				</div>
				
			   <div class="list cont">
				 
					<ul>
					 
						<li>
							<span>整体评价</span> <p >
                             	<div class="box">
			<div class="list">
				<a href="#" class="star1">★</a>
				<a href="#" class="star2">★</a>
				<a href="#" class="star3">★</a>
				<a href="#" class="star4">★</a>
				<a href="#" class="star5">★</a>
			</div>
			<span class="remark">亲，请客观给出评价</span>
		</div>
                            </p>
						</li>
					 
					 
					</ul>
					
					
					
				</div>
				 <div class="job_detail">
						<span>吐一下槽吧:</span>
						<p class="job_detailtxt">
							<textarea name="tucao" placeholder="我们将不断改进" rows="7" cols="35" >
							 
							</textarea> 
						</p>
					</div>
				 
					 <input type="submit" value="提交" class="submit" />
			    
	</div>
			</form>	    
					
			</div>
			  
		<p id="us" style="position: fixed;bottom:5px;left:0px;font-size:14px;line-height:1.5;width: 100%;text-align: center;color: #434343;z-index:9;">@计科1302技术支持</p>
		<script type="text/javascript" src="/czxy/Public/Home/js/jquery-1.8.3.min.js" ></script>
		 
	</body>
</html>