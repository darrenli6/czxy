<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title></title>

<link rel="stylesheet" href="/Test4/czxy/Public/Home/music/css/datouwang.css" />
<link rel="stylesheet" href="/Test4/czxy/Public/Home/music/css/jquery.equalizer.css" />
<style>

#back img {
    margin: 4px;
    position: absolute;
    right: 10px;
    top: 10px;
    width: 32px;
}

#like img{
	width:30px;
	height:px;
	margin-left:70%;
}
</style>
</head>
<body>
   <a id="back"  href="<?php echo U('index'); ?>"  >
		<img src="/Test4/czxy/Public/Home/images/a_back.png"  />
   </a>
<br>
 
<section id="main_section">
	<div class="relative_left" style="width: 600px;margin: 30px 0px;height: 300px;left : 50%;margin-left: -300px;">
		<h2 id="title"><?php echo $bData['title'] ?></h2>
		<div id="equalizer">
			<audio autoplay controls loop>
				<source src="<?php echo $realpath; ?>" type='audio/ogg'>
				<source src="<?php echo $realpath; ?>" type='audio/mpeg'>	
			</audio>
		</div>
	</div>
	 
</section>

<script type="text/javascript" src="/Test4/czxy/Public/Home/music/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/Home/music/js/jquery.reverseorder.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/Home/music/js/jquery.equalizer.js"></script>
<script>
	$(document).ready(function(){
		
		$("#ad_container span").click(function(){
			$("#ad_container").fadeOut(400);
		});
		
		
		
		
	});
	function likeit(){
		$.ajax({
			Type:'GET',
			url:"<?php echo U('likebroadcast','likeid='.$bData['id']); ?>",
			success:function(msg){
				if(msg!='点赞失败')
					{
					$('#likenum').text(msg);
					$('#like img').attr('src',"/Test4/czxy/Public/Home/images/likeafter.png");
					}else{
					 $('#likenum').text('系统繁忙');
					}
				 
			},
		});
		
	}
	
</script>
<a id="like"  onclick="likeit()"  >
		<img src="/Test4/czxy/Public/Home/images/likebefore.png"  />
		<span id="likenum"><?php echo $bData['likeit']; ?></span>
 </a>
<div style="text-align:center;">
<p><a href="#" >计科1302技术支持</a></p> 
</div>
</body>
</html>