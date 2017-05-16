<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height, user-scalable=no,initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>二手货物详情</title>
    <link rel="stylesheet" href="/Test4/czxy/Public/Home/er/css/spxq.css"/>
    <link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/er/css/swipe.css">
   	<script type="text/javascript" src="/Test4/czxy/Public/Home/er/js/touch.js"></script>
    <script src="/Test4/czxy/Public/Home/js/jquery.min.js"></script>
</head>
<script>
   function send(){
	   
	   var phone=$('.phone').text();
	   
	   $.get("<?php echo U('sendmsg'); ?>", {
			 phone:phone,
			 secondid:<?php echo $sData['id']; ?>,
		     username:<?php echo session('username');?>,			 
		     }, function(data) {
		    	if(data=='发送成功')
		        {
		    		$('#sendmsg').attr('disabled',true);
		        }
		    	$('#return1').html(data);
	        	$('#return1').css('color','red');
		     });
   }
   
   $(function(){
       var phone=$('.phone').text();
	   
	   $.get("<?php echo U('issend'); ?>", {
			 phone:phone,
			 secondid:<?php echo $sData['id']; ?>,
		     username:<?php echo session('username');?>,			 
		     }, function(data) {
		    	if(data=='1')
		        {
		    		$('#sendmsg').attr('disabled',true);
		    		$('#sendmsg').val('短信已经发送过');
		        }else{
		        	$('#sendmsg').attr('disabled',false);
		        }
		     
		});
	   
   });
   
   //取消显示
   function cancel(secondid){
	   var sid=secondid;
	   $.get("<?php echo U('cancelsecond'); ?>", {
			  sid:sid,
		     }, function(data) {
		    	 
		    	$('#return1').html(data);
	        	$('#return1').css('color','red');
		     });
	   
   }
  
</script>
 
<body>
<div class="body">
    <div class="tour">
        <a href="<?php echo U('index'); ?>" class="tour1"><img src="/Test4/czxy/Public/Home/er/img/back.png" alt="" style="height: 26px;width: 20px"></a>
        <p>二手货物详情</p>
    </div>
    <figure>
        <div class="addWrap">
            <div class="swipe" id="mySwipe">
                <div class="swipe-wrap">
                  <?php  if(!$sData['big_title_pic']) { echo '<div><img class="img-responsive" src="/Test4/czxy/Public/Home/images/393355.jpg"/></div>'; }else { echo '<div>'; showImage($sData['big_title_pic']); echo '</div>'; } ?>
                     
                </div>
            </div>
            <ul id="position">
                <li class="cur"></li>
                <li class=""></li>
                <li class=""></li>
            </ul>
        </div>
        <!-- 轮播 -->
        <script src="/Test4/czxy/Public/Home/er/js/swipe.js"></script>
        <script type="text/javascript">
            var bullets = document.getElementById('position').getElementsByTagName('li');
            var banner = Swipe(document.getElementById('mySwipe'), {
                auto: 3000,
                continuous: true,
                disableScroll:false,
                callback: function(pos) {
                    var i = bullets.length;
                    while (i--) {
                        bullets[i].className = ' ';
                    }
                    bullets[pos].className = 'cur';
                }
            });
        </script>
        <p><?php echo $sData['title']; ?></p>
        <div class="info">
          <em class="old" style="text-decoration: line-through;">￥<?php echo $sData['old_price']; ?></em>
                &nbsp;&nbsp;&nbsp;
            <em class="now">￥<?php echo $sData['now_price']; ?></em>
        </div>
    </figure>
    <hr/>
    <div class="sjxx">
        <p class="pclass1">详细信息:
        <?php echo $sData['content']; ?>
        </p>
        
    </div>
    
    <hr/>
    <div class="sjxx">
        <p class="pclass2">发布时间：<?php echo $sData['public_time']; ?></p>
        <p class="pclass2">QQ号码： <?php echo $sData['qq']; ?>
        </p>
        <p class="pclass2">联系方式
              <?php
 if(session('username')==$sData['phone']) { echo $sData['phone']; echo '--是自己的东西'; echo '<br />'; echo '<input type="button" id="cancel" style="width:150px;height:40px;" onclick="cancel('.$sData['id'].')" value="已经卖光"  />'; }else if(session('username')==null) { echo '<span class="phone">'.$sData['phone'].'            </span>'; echo '<a style="color:red;font-size:20pt;" href="'.U('LogReg/login').'">登录</a>,进行操作'; }else{ echo '<span class="phone">'.$sData['phone'].'</span>'; echo '<input type="button" style="width:150px;height:40px;" id="sendmsg" onclick="send();" value="短信沟通" />'; } ?>
             
         </p>
         <div id="return1" style="font-size:14pt;"></div> 
    </div>
     <br />
     <br />
     <br />
     <br />
     <br />
     <br />
     <br />
     <br />
     <div class="zshlogo">
            <p style="color: #b2b2b2">计科1302技术支持</p>
        </div>
    <div class="wx_nav" id="wx_nav">
        <a href="<?php echo U('write_second');?>" class="nav_index" id="nav_index">发布二手信息</a>
    </div>
    </div>
</body>
</html>