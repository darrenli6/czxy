<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>校园行注册</title>
<!-- Bootstrap -->
<link href="/Test4/czxy/Public/Home/css/bootstrap.min.css" rel="stylesheet">
<link href="/Test4/czxy/Public/Home/css/main.css" rel="stylesheet">
<link href="/Test4/czxy/Public/Home/css/enter.css" rel="stylesheet">
<script src="/Test4/czxy/Public/Home/js/jquery.min.js"></script>
<script src="/Test4/czxy/Public/Home/js/bootstrap.min.js"></script>
<script src="/Test4/czxy/Public/Home/js/jquery.particleground.min.js"></script>
<script type="text/javascript"> 
var countdown=60; 
function settime(obj) { 
	 
    if (countdown == 0) { 
        obj.removeAttribute("disabled");    
        obj.value="免费获取验证码"; 
        countdown = 60; 
        return;
    } else { 
    
        obj.setAttribute("disabled", true); 
        obj.value="重新发送(" + countdown + ")"; 
        countdown--; 
    } 
setTimeout(function() { 
    settime(obj) }
    ,1000) 
}
function isphone(inputString)
{
     var partten = /^1\d{10}$/;
     var fl=false;
     if(partten.test(inputString))
     {
          //alert('是手机号码');
          return true;
     }
     else
     {
          return false;
          //alert('不是手机号码');
     }
}
function checkm(){
	var mobilephone=$('#mobilephone').val();
    var fl=isphone(mobilephone);
    if(fl){
    	$("#btn").attr('disabled',false);
    	$('#ret').html('手机格式正确');
    	$('#ret').css('color','#ccc');
    }else{
    	$("#btn").attr('disabled',true);
    	$('#ret').html('手机格式不正确');
    	$('#ret').css('color','red');
    	return false;
    }
	
}
function send(){
	var mobilephone=$('#mobilephone').val();
    var fl=isphone(mobilephone);
    if(fl)
    {
    	$.get("<?php echo U('LogReg/index'); ?>", {
			 mobilephone:mobilephone,
		     }, function(data) {
		    	$('#return1').html(data);
	        	$('#return1').css('color','red');
		     });
    	 
    	
    }else{
    	$('#ret').html('手机格式不正确');
    	$('#ret').css('color','red');
    	return false;
    } 	
    	
	
	
}
</script>
</head>
<body>
<div id="particles">
  <canvas class="pg-canvas" width="1920" height="911" style="display: block;"></canvas>
  <div class="intro" style="margin-top: -256.5px;">
    <div class="container">
      <div class="row" style="padding:30px 0;">
        <div class="col-md-3 col-centered tac">  
              <img src="/Test4/czxy/Public/Home/images/logo.png"  />
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-8 col-centered">
          <form method="post"  id="register-form" autocomplete="off" action="/Test4/czxy/index.php/Home/LogReg/index.html" class="nice-validator n-default" novalidate>
            <div class="form-group">
              <input type="text" class="form-control" id="mobilephone" name="mobilephone" onchange="checkm();" placeholder="手机号" autocomplete="off" aria-required="true" data-tip="英文字母数字或下划线">
              <span id="ret" ></span>
            </div>
            <div id="validator-tips" class="validator-tips"></div>
            <div class="form-group">
              <input type="text" class="form-control" id="yanzhenma" name="yancode" placeholder="验证码" autocomplete="off" aria-required="true" data-tip="英文字母数字或下划线">
              <input type="button" id="btn" value="免费获取验证码" onclick="send();settime(this);" />
              <span id="return1"></span>  
            </div>
              
            <div class="form-center-button">
              <button type="submit" id="submit_button" class="btn btn-primary btn-current">确定</button>
              <a href="<?php echo U('Index/index'); ?>" class="btn btn-default">返回</a> </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" style="text-align: left" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            <h4 class="modal-title">用户协议</h4>
          </div>
          <div class="modal-body" id="agreementContent"></div>
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="/Test4/czxy/Public/Home/css/jquery.validator.css">
    <script src="images/zh-CN.js"></script><script src="/Test4/czxy/Public/Home/js/jquery.validator.min.js"></script> 
  </div>
</div>
<script>
    $(document).ready(function () {
        var intro = $('.intro');
        $('#particles').particleground({
            dotColor: 'rgba(52, 152, 219, 0.36)',
            lineColor: 'rgba(52, 152, 219, 0.86)',
            density: 130000,
            proximity: 500,
            lineWidth: 0.2
        });
        intro.css({
            'margin-top': -(intro.height() / 2 + 100)
        });
    });
</script>
<div style="text-align:center;">
</div>
</body>
</html>