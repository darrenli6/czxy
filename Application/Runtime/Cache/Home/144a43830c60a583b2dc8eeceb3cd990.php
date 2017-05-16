<?php if (!defined('THINK_PATH')) exit();?> <!doctype html>
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

</head>

<body   >
<div class="header">
    <a class="back"><p></p></a>
    <a href="#"></a>
    <a class="contect">
    </a>
    <a class="links"><p></p></a>
</div>
<div data-role="listview" class="list-content">
   <?php foreach($data as $k=>$v ): ?>
    <a href="<?php echo U('detail?id='.$v['id']); ?>">
            <div class="text-img"><?php echo $v['title']; ?></div>
            <div class="pic" style="background:url(<?php echo $viewPath.$v['sm_logo']; ?>) no-repeat;background-size:cover;"></div>
            <p></p>
   </a>     
	<?php endforeach; ?>	
<div class="button">
<p>
<?php echo $page; ?>
 </p>
</div>

</div>
<div class="footer">
     &COPY;计科1302技术支持 
 
</div>




<div class="sidebar">
    <a href="<?php echo U('Index/index'); ?>">
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