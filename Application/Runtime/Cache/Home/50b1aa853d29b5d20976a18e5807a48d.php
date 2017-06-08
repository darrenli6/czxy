<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height, user-scalable=no,initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>校园行</title>
    <link rel="stylesheet" href="/czxy/Public/Home/er/css/nydg.css">
    <link rel="stylesheet" href="/czxy/Public/Home/er/css/Up.css">
    <script type="text/javascript" src="/czxy/Public/Home/er/js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="/czxy/Public/Home/er/js/xlmenu.js"></script>
   	<script type="text/javascript" src="/czxy/Public/Home/er/js/touch.js"></script>
    <script type="text/javascript" src="/czxy/Public/Home/er/js/srcolltop.js"></script>
    <!-- 隐藏菜单 -->
    <script>
        $(function(){
            var titleName=$(".ycmenu a");
            for(var i =0;i<titleName.length;i++){
                titleName[i].id=i;
                titleName[i].onmouseover=function(){
                    for(var j =0;j<titleName.length;j++){
                        titleName[j].className="";
                    }
                    this.className = "a";
                }
            }

        });
    </script>
</head>
<body>
<div class="body">
    <div class="tour">
        <a href="<?php echo U('Index/index'); ?>" class="tour1"><img src="/czxy/Public/Home/er/img/back.png" alt="" style="height: 26px;width: 20px"></a>
        <p>二手街<i class="xlmenu"></i></p>
       
    </div>
    <div class="ycmenu">
        <ul>
            <li><a href="<?php echo U('index'); ?>" class="a">全部商品</a></li>
         <?php foreach($tData as $k=>$v):?>    
            <li><a href="<?php echo U('index',array('catid'=>$v['id'])); ?>"><?php echo $v['name']; ?></a></li>
         <?php endforeach; ?>
        </ul>
    </div>
    <div class="allsp">
       <?php foreach($data as $k=>$v): ?>
        <figure>
            <a href="<?php echo U('detail?secondid='.$v['id']); ?>"><?php  if(!$v['middle_title_pic']) { echo '<img src="/czxy/Public/Home/images/165149.jpg" />'; }else{ showImage($v['middle_title_pic']); } ?></a>
            <p><?php echo $v['title']; ?></p>
            <div class="info">
                <em class="old" style="text-decoration: line-through;">￥<?php echo $v['old_price']; ?></em>
                &nbsp;&nbsp;&nbsp;
                <em class="now">￥<?php echo $v['now_price']; ?></em>
            </div>
        </figure>
     <?php endforeach; ?>
     
   
        <div style="clear: both"></div>
    </div>
     <div class="zshlogo">
            
            <p style="color: #b2b2b2">计科1302技术支持</p>
        </div>
    <div class="wx_nav" id="wx_nav">
        <a href="<?php echo U('write_second');?>" class="nav_index" id="nav_index">发布二手信息</a>
    </div>    
    
</div>
<div class="actGotop"><a href="javascript:;" title="返回顶部"></a> <img src="/czxy/Public/Home/er/img/fanhui.png" alt=""></div>
<div class="theme-popover-mask"></div>
</body>
</html>