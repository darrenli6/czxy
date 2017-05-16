<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>校园行-与你行</title>

<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1">

<link type="text/css" rel="stylesheet" href="/czxy/Public/Home/css/public.css" />
<link type="text/css" rel="stylesheet" href="/czxy/Public/Home/css/style.css" />

<script type="text/javascript" src="/czxy/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/alert.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/common.js"></script>
<script src="/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
<script>
$(document).ready(function() {
	$('.happy p').click(function(){
	     $(this).css("background","url('/czxy/Public/Home/css/happyy.png')");	
	     var newsid = $("#newsid").val();
			$.get("<?php echo U('likenews'); ?>", {
				 
				newsid : newsid
			}, function(data) {
				$('#feedback').html(data);
			});

			return false;
	});
	
	$('.cry p').click(function(){
	     $(this).css("background","url('/czxy/Public/Home/css/cryy.png')");	
	     var newsid = $("#newsid").val();
			$.get("<?php echo U('likenotnews'); ?>", {
				newsid : newsid
			}, function(data) {
				$('#feedback').html(data);
			});

			return false;
	});
	 
});
</script>
<style type="text/css">
  #textfooter{
	margin-top:30px;
  	padding:20px;
  }
</style>
</head>

<body>
<div class="header">
    <a class="back"><p></p></a>
    <a href="#" class="happy"><p></p></a>
    <a   class="cry"><p></p></a>
    <a class="links"><p></p></a>
</div>
<div class="content">
    <p><p><br/></p><p style="text-align: center;"><strong>标题:<?php echo $nData['title']; ?></strong>
    <span id="feedback" style="color:red"></span></p><p>
     </p><br /><br />
     <?php echo $nData['content']; ?>
     <br />
     
</div>
<input type="hidden" id="newsid" value="<?php  echo $nData['id']; ?>" />
<div id="textfooter">
   时间:<?php echo $nData['addtime']; ?>作者:<?php echo $nData['author']; ?>
</div>
<div class="footer">
    <p class="footer-top">&COPY;计科1302技术支持</p>
    <p class="footer-bottom">
    
    </p>
</div>



<div class="sidebar">
    <a href="<?php echo U('Index/index');?>">
        <p class="text">网站首页</p>
        <p class="pic"></p>
    </a>
     
       <?php foreach($ntData as $k=>$v): ?>
        </a><a href="<?php echo U('lst?type_id='.$v['id']); ?>">
            <p class="text"><?php echo $v['type_name']; ?></p>
            <p class="pic"></p>
        <?php endforeach; ?>
       
          <?php if(session('username')==null):?>
        <a href="<?php echo U('LogReg/login'); ?>">
            <p class="text">登陆</p>
            <p class="pic"></p>
        </a>
        <a href="<?php echo U('LogReg/index'); ?>">
            <p class="text">注册</p>
            <p class="pic"></p>
        </a>
      <?php else:?>
         <a href="<?php echo U('PersonCenter/personCenter'); ?>">
            <p class="text">个人中心</p>
            <p class="pic"></p>
        </a>
           <a href="<?php echo U('LogReg/logout'); ?>">
            <p class="text">退出</p>
            <p class="pic"></p>
        </a>
      <?php endif; ?>
       <a href="<?php echo U('FeedBack/index'); ?>">
            <p class="text">反馈意见</p>
            <p class="pic"></p>
        </a>

 
</body>
</html>