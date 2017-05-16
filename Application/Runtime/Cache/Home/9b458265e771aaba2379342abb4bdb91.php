<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行 -你就行</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
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
						<li class="mui-table-view-cell"><a href="personCenter.html">
                          <?php echo $info['info']; ?>
                         </a>
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
				<label id="classResult"><?php echo $info['title']; ?>结果</label>
			</div>
		</section>
		<section class="vote_group">
	    
	<table cellspacing="1" style="font-size:8pt;">
	<tr>
	<th>标题</th>
	<th>缩略图</th>
	<th>图示比例</th>
	<th>百分比</th>
	<th>得票数</th>
	</tr>
	<?php foreach($voteinfo as $k=>$v): ?>
    <tr>
      <td><?php echo $v['title']; ?></td>
      <td><?php showImage($v['sm_pic']); ?></td>
      <td style="text-align:left;width:<?php echo $width; ?>px">
        <img src="/Test4/czxy/Public/Home/images/b1.jpg" 
        style="width:<?php echo ($v['count']/$sum*$width); ?>%;height:21px"; />
      </td>
      <td><?php echo ceil(($v['count']/$sum*100)); ?>%</td>
      <td><?php echo $v['count']; ?></td>
    </tr>
    <?php endforeach; ?>
	</table>
		</section>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>