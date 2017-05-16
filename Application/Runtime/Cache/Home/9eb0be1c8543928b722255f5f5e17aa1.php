<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行 -你就行</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/czxy/Public/Home/css/css/style.css">
</head>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">真实.公开.公正</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('votelst'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
	<!-- 右上角弹出菜单 -->
	<div id="topPopover" class="mui-popover">
			<div class="mui-popover-arrow"></div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view">
						<li class="mui-table-view-cell">
							 <?php echo $data['info']; ?>
						</li>
					</li>
					</ul>
				</div>
			</div>
		</div>
	</div> 
	<!-- 主内容部分 -->
	<div class="content">
		<section class="xueqi">
			<div class="class">
				<label id="classResult"> <?php echo $data['title']; ?></label>
			</div>
		</section>
		<form  action="/czxy/index.php/Home/Vote/index/voteid/1.html"  method="post" >
	    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" /> 
		<section class="vote_group">
		   <?php foreach($info as $k=>$v): ?>
			<div class="group">
				<div class="group_img">
					 <?php showImage($v['big_pic']); ?>
					<div class="group_title"><label><?php echo $v['title']; ?></label></div>
				</div>
				<div class="group_vote_count">
					<label>校园行总票数<span><?php echo $v['count'] ?></span>票</label>
					<div class="vote"><input type="radio" name="vote" value="<?php echo $v['id']; ?>"/>投票</div>
				</div>
			</div>
		   <?php endforeach; ?>
			<button type="submit" class="mui-btn mui-btn-success mui-btn-block mui-btn-margin">确认投票</button>
		</section>
		</form>
	</div>
	<script src="/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>