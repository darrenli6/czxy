<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>校园行</title>
<!-- Bootstrap -->
<link href="/czxy/Public/Home/css/bootstrap.min.css" rel="stylesheet">
<link href="/czxy/Public/Home/css/main.css" rel="stylesheet">
<link href="/czxy/Public/Home/css/enter.css" rel="stylesheet">
<script src="/czxy/Public/Home/js/jquery.min.js"></script>
<script src="/czxy/Public/Home/js/bootstrap.min.js"></script>
<script src="/czxy/Public/Home/js/jquery.particleground.min.js"></script>
<script>

 $(function(){
	 $('#chuli').css('display','none'); 
	 //$('#submit_button').attr('disabled',true);
 });
 function isExists(){
		var mobilephone=$('#username').val();
		$.get("<?php echo U('LogReg/isExitst'); ?>", {
			 mobilephone:mobilephone,
		     }, function(data) {
		    	$('#validator-tips').html(data);
	       	$('#validator-tips').css('color','red');
		     });
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
                  <img src="/czxy/Public/Home/images/logo.png"  />
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-8 col-centered">
          <form method="post" id="register-form" autocomplete="off" action="/czxy/index.php/Home/LogReg/login.html" class="nice-validator n-default" novalidate>
            <div class="form-group">
              <input type="text"  class="form-control" id="username" onblur="isExists()" name="username" placeholder="账号" autocomplete="off" aria-required="true" data-tip="英文字母数字或下划线">
            </div>
             <input type="password"  id="chuli"      >
            <div class="form-group">
              <input type="password" class="form-control" id="password"    name="password" placeholder="密码"   >
            </div>
            
            <div id="validator-tips" class="validator-tips"></div>
             
       
            <div class="form-center-button">
              <button type="submit" id="submit_button"  class="btn btn-primary btn-current">登陆</button>
              <a href="<?php echo U('Index/index'); ?>" class="btn btn-default">返回</a> </div>
          </form>
        </div>
      </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <div><a href="<?php echo U('index'); ?>"><span>新用户注册</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo U('forget'); ?>"><span>忘记密码?</span></a>
    </div>
     
    <link rel="stylesheet" href="/czxy/Public/Home/css/jquery.validator.css">
    <script src="images/zh-CN.js"></script><script src="/czxy/Public/Home/js/jquery.validator.min.js"></script> 
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