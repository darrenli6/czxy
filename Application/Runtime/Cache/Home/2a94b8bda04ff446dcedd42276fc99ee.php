<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>校园行</title>
<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1">
<link type="text/css" rel="stylesheet" href="/czxy/Public/Home/css/index.css" />
<script type="text/javascript" src="/czxy/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/g.base.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/iscroll.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/alert.js"></script>
<script type="text/javascript" src="/czxy/Public/Home/js/common.js"></script>
<script type="text/javascript">
    var myScroll;
    function loaded() {
        myScroll = new iScroll('wrapper', {
            snap: true,
            momentum: false,
            hScrollbar: false,
            onScrollEnd: function() {
                document.querySelector('#indicator > li.active').className = '';
                document.querySelector('#indicator > li:nth-child(' + (this.currPageX + 1) + ')').className = 'active';
            }
        });
    }
    document.addEventListener('DOMContentLoaded', loaded, false);
</script>
</head>

<body style="background:#fff;">
<header>
    <div class="banner">
        <div id="wrapper" style="overflow: hidden; ">
            <div id="scroller">
                <ul id="thelist">
                    <li><p></p><a href="#"><img src="/czxy/Public/Home/images/2.png" /></a></li>
                    <li><p></p><a href="#"><img src="/czxy/Public/Home/images/1.png" /></a></li>              
                    <li><p></p><a href="#"><img src="/czxy/Public/Home/images/3.png" /></a></li>                
                    <li><p></p><a href="#"><img src="/czxy/Public/Home/images/4.png" /></a></li>         
                    <li><p></p><a href="#"><img src="/czxy/Public/Home/images/5.png" /></a></li>          
                    </ul>
            </div>
        </div>
    </div>
    <div id="nav">
        <div id="prev" onClick="javascript:myScroll.scrollToPage('prev', 0);"></div>
        <ul id="indicator">
            <li class="active"></li><li ></li>        </ul>
        <div id="next" onClick="javascript:myScroll.scrollToPage('next', 0, 400, 2);"></div>
    </div>
    <div class="clr"></div>
</header>
<script>
    var count = document.getElementById("thelist").getElementsByTagName("img").length;
    for (i = 0; i < count; i++) {
        document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:" + document.body.clientWidth + "px";
    }
    document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";
    setInterval(function() {
        myScroll.scrollToPage('next', 0, 400, count);
    }, 3500);
    window.onresize = function() {
        for (i = 0; i < count; i++) {
            document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:" + document.body.clientWidth + "px";
        }
        document.getElementById("scroller").style.cssText = " width:" + document.body.clientWidth * count + "px";
    };
</script>
<div class="main">
    <div>
        <a href="<?php echo U('News/lst'); ?>">
            <p class="img" style="background:url(/czxy/Public/Home/images/1383014031703.png) no-repeat; background-size:contain;"></p>
            <p class="text"> 新闻中心</p> 
        </a>    </div>
    <div>            <a href="<?php echo U('Teaching/index'); ?>">
                <p class="img" style="background:url(/czxy/Public/Home/images/13830140047187.png) center no-repeat; background-size:contain;"></p>
                <p class="text">教学小助手</p>
            </a>
                        <a href="<?php echo U('Job/index'); ?>">
                <p class="img" style="background:url(/czxy/Public/Home/images/13830140513607.png) center no-repeat; background-size:contain;"></p>
                <p class="text">兼职中心</p>
      </a>
  </div>
    <div>            <a href="<?php echo U('Vote/votelst'); ?>">
                <p class="img" style="background:url(/czxy/Public/Home/images/13830140766638.png) center no-repeat; background-size:contain;"></p>
                <p class="text">风云人物</p>
            </a>
                        <a href="<?php echo U('Broadcast/index'); ?>">
                <p class="img" style="background:url(/czxy/Public/Home/images/13830141096885.png) center no-repeat; background-size:contain;"></p>
                <p class="text">校园广播</p>
      </a>
  </div>
    <div>            <a href="<?php echo U('Other/index'); ?>">
                <p class="img" style="background:url(/czxy/Public/Home/images/13830141383823.png) center no-repeat; background-size:contain;"></p>
                <p class="text">生活百宝箱</p>
            </a>
                        <a href="<?php echo U('Secondhand/index'); ?>">
                <p class="img" style="background:url(/czxy/Public/Home/images/ershou.png) center no-repeat; background-size:contain;"></p>
                <p class="text">二手街</p>
      </a>
  </div>    
  
</div>
<div class="footer">
<p class="footer-bottom" data-role="none">
   计科1302技术支持  
</p>
</div>
 
</body>
</html>