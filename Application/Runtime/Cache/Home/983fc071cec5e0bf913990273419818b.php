<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>校园行</title>
<!-- Bootstrap -->
<link href="/Test4/czxy/Public/Home/css/bootstrap.min.css" rel="stylesheet">
<link href="/Test4/czxy/Public/Home/css/main.css" rel="stylesheet">
<link href="/Test4/czxy/Public/Home/css/enter.css" rel="stylesheet">
<script src="/Test4/czxy/Public/Home/js/jquery.min.js"></script>
<script src="/Test4/czxy/Public/Home/js/bootstrap.min.js"></script>
<script src="/Test4/czxy/Public/Home/js/jquery.particleground.min.js"></script>
<script>
    $(function(){
    	 
    		 $('#chuli').css('display','none'); 
    	 
    		var ischeck= $('#check').prop('checked');
        	if(!ischeck){
        		$('#submit_button').attr("disabled", true); 
        	}
    });
    function change(){
    	var ischeck= $('#check').prop('checked');
    	if(ischeck){
    		$('#submit_button').attr("disabled", false); 
    	}
    }
    function likai(){
       var p=$('#password').val();
       
       var rp=$('#repeat_password').val();
       if(p==rp)
    	{
    	   $('#validator-tips').html('密码验证通过');
    	}else{
    		
    	   $('#validator-tips').html('密码输入不一致');
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
          <form method="post" id="register-form" autocomplete="off" action="/Test4/czxy/index.php/Home/LogReg/reg/phone/15135580287.html" class="nice-validator n-default" novalidate>
             <input type="password"  id="chuli"      >
            <div class="form-group">
              <input type="password" value=""   class="form-control" id="password" name="password" placeholder="密码" aria-required="true" data-tip="请设置您的密码（6-16个字符）">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" value="" onchange="likai()" id="repeat_password" name="repeat_password" placeholder="再次输入密码" aria-required="true" data-tip="请再输入一次密码">
            </div>
            <div id="validator-tips" class="validator-tips"></div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="check" onchange="change()" name="ag">
                同意 </label>
              <a href="javascript:void(0)" id="userAgreement" style="text-decoration:none">用户协议</a> </div>
            <div class="form-center-button">
              <button type="submit" id="submit_button" class="btn btn-primary btn-current">注册</button>
              <a href="<?php echo U('LogReg/index'); ?>" class="btn btn-default">返回</a> </div>
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