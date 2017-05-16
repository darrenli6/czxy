<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
      <script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
</head>
<script type="text/javascript">
function tip()
{      
	   var val=$('input[type=button]#tip').val();
	    
	   if($.trim($("em#classid").text()).length==0 || $.trim($("em#email").text()).length==0 )
	   {   
		   alert('请完善资料');
	       return false;
	   }else{
		   $.ajax({
			url:"<?php echo U('saveCourseTip');?>",
			data:"username=<?php echo $mobile; ?>&classid=<?php echo $uData['classid'];?>&email=<?php echo $uData['email']; ?>&state="+val,
			type:'post',
			success:function(msg){
				if(msg=='提醒成功,提醒时间将在19点左右.')
			    {
					$('input[type=button]#tip').attr('value','否');	
					location.href="<?php echo U('personCenter'); ?>";
			    }else
			    {	
				$('input[type=button]#tip').attr('value','是');
				location.href="<?php echo U('personCenter'); ?>";
			    }
				alert(msg);
			},
			
		   });
		   
	   }
	   
}
   
  
</script>
<style >

</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行-个人中心</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('Index/index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
	<!-- 右上角弹出菜单 -->
	<div id="topPopover" class="mui-popover">
			<div class="mui-popover-arrow"></div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell"><a href="<?php echo U('News/lst'); ?>">新闻中心</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Job/index'); ?>">兼职中心</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Teaching/index'); ?>">教学小助手</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Vote/index'); ?>">风云人物</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Other/index'); ?>">生活百宝箱</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Secondhand/index'); ?>">二手街</a></li>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 主内容部分 -->
	<div class="content">
		 
		<section class="personData">
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell mui-media">
					<a class="mui-navigate-right" href="#">
					    <?php if(empty($uData['face'])): ?>
						<img class="mui-media-object mui-pull-left head-img" id="
						head-img" src="/Test4/czxy/Public/Home/images/blankface.jpg">
						<?php else: ?>
						<img class="mui-media-object mui-pull-left head-img" id="
						head-img" src="<?php echo $uData['face']; ?>">
						<?php endif; ?>
						<label class="name">
						<?php echo $uData['nickname']; ?> 
						 
						</label>
					</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a>系级<span class="mui-pull-right" id="departmentid">
					<?php foreach($dData as $k=>$v): if($v['id']==$uData['departmentid']) $department=$v['name']; ?>
					<?php endforeach; ?>
						<?php echo $department; ?> </span></a>
				</li>
				<li class="mui-table-view-cell"  >
					<a>班级<span class="mui-pull-right" >
					<?php foreach($cData as $k=>$v): if($v['id']==$uData['classid']) $class=$v['name']; ?>
					<?php endforeach; ?>
						<em id="classid" > <?php echo $class; ?>
						</em></span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>学号<span class="mui-pull-right"><?php echo $uData['xuehao']; ?> </span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>性别<span class="mui-pull-right"><?php echo $uData['sex']; ?> </span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>qq<span class="mui-pull-right"><?php echo $uData['qq']; ?> </span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>Email<span class="mui-pull-right">
					<em id="email"><?php echo $uData['email']; ?>
					</em>
					 </span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>手机号<span class="mui-pull-right"> <?php echo $mobile; ?> </span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>上课提醒状态<span class="mui-pull-right"> 
                    <input type="button" onclick="tip();" id="tip" value="<?php echo $tip; ?>" />
                    </span></a> 
				</li>
				
				<li class="mui-table-view-cell">
					<input type="button"    onclick="javascript:location.href='edit.html'"   value="修改个人信息" /> 
					<input type="button"    onclick="javascript:location.href='modifypwd.html'"   value="修改密码" /> 
				</li>
			</ul>
		</section>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>