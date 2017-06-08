<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行 -和你行</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.min.css">
	<!-- loading picker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.picker.min.css"> -->
	<!-- loading popicker -->
	<!-- <link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.poppicker.css"> -->
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/style.css">
</head>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行-和你行</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('Index/index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
	 
	<!-- 主内容部分 -->
	<div class="content">
		<section class="query">
			<table>
			<tr>
					<td>
						<a href="<?php echo U('gongjiaoxianlu'); ?>">
							<img src="/czxy/Public/Home/images/xianlu.jpg">
							<p>公交线路查询</p>
						</a>
					</td>
					<td>
						<a href="<?php echo U('guihua'); ?>">
							<img src="/czxy/Public/Home/images/guihua.png">
							<p>出行规划</p>
						</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="<?php echo U('express'); ?>">
							<img src="/czxy/Public/Home/images/express.png">
							<p>快递查询</p>
						</a>
					</td>
					<td>
						<a href="<?php echo U('translate'); ?>">
							<img src="/czxy/Public/Home/images/translate.png">
							<p>英文翻译</p>
						</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="<?php echo U('bus'); ?>">
							<img src="/czxy/Public/Home/images/bus.png">
							<p>长途客运车</p>
						</a>
					</td>
					<td>
						<a href="<?php echo U('weather'); ?>">
							<img src="/czxy/Public/Home/images/weather.png">
							<p>全国天气预报</p>
						</a>
					</td>
					
			 </tr>
				<tr>
					<td>
						<a href="<?php echo U('train'); ?>">
							<img src="/czxy/Public/Home/images/train.png">
							<p>火车余票查询</p>
						</a>
					</td>
					<td>
						<a href="<?php echo U('trainprice'); ?>">
							<img src="/czxy/Public/Home/images/trainprice.png">
							<p>火车票价查询</p>
						</a>
					</td>
					
			 </tr>
				<tr>
				<td>
						<a href="<?php echo U('answer'); ?>">
							<img src="/czxy/Public/Home/images/answer.png">
							<p>聊天智能问答机器人</p>
						</a>
					</td>
				
					<td>
						<a href="<?php echo U('brain'); ?>">
							<img src="/czxy/Public/Home/images/brain.png">
							<p>脑筋急转弯大全</p>
						</a>
					</td>
			 </tr>
			<tr>
					<td>
						<a href="<?php echo U('smile'); ?>">
							<img src="/czxy/Public/Home/images/smile.png">
							<p>笑话</p>
						</a>
					</td>
				<td>
						<a href="<?php echo U('xingzuo'); ?>">
							<img src="/czxy/Public/Home/images/xingzuo.png">
							<p>星座预测</p>
						</a>
					</td>
					
					 
			 </tr>
			
			<tr>
					
					<td>
						<a href="<?php echo U('zhaocha'); ?>">
							<img src="/czxy/Public/Home/images/zhao.png">
							<p>找茬游戏</p>
						</a>
					</td>
					
					 <td>
						<a href="<?php echo U('baikuai'); ?>">
							<img src="/czxy/Public/Home/images/baikuai.jpg">
							<p>别踩白块游戏</p>
						</a>
					</td>
					 
			 </tr>	  
			 
			</table>
		</section>
	</div>
	<script src="/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>