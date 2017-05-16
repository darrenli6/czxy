<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园行-与你行 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Test4/czxy/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Test4/czxy/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
</head>
<body>
<h1> 
    <?php if($_page_btn_name): ?> 
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"> 
    <?php echo $_page_btn_name; ?>
    </span>
    <?php endif; ?>
    <span class="action-span1">
    <a href="#">校园行 管理中心 >
    <?php echo $_page_title; ?>
    </a></span>
    <div style="clear:both"></div>
</h1>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="form-div">
    <form action="/Test4/czxy/index.php/Admin/Vote/lst" method="get" name="searchForm">
        <img src="/Test4/czxy/Public/Admin/Images/icon_search.gif" width="26" height="22" border="0" alt="search" />
    
        
        <!-- 关键字 -->
        标题模糊搜 <input type="text" name="title" size="15" />
         
    
        <input type="submit" value=" 搜索 " class="button" />
    </form>
</div>

<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>编号</th>
                <th>主题</th>
                <th>说明</th>
                <th>是否前台显示</th>
                <th>子项目操作</th>
                <th>操作</th>
            </tr>
            <?php foreach($data as $k=>$v): ?>
            <tr class="tron">
                <td align="center"><?php echo $v['id']; ?> </td>
                <td align="center"><?php echo $v['title']; ?> </td>
                <td align="center"> <?php echo $v['info']; ?></td>
                <td align="center"> <?php echo $v['state']; ?></td>
                <td align="center">
               <a href="<?php echo U('itemlst?id='.$v['id']); ?>"> 查看项目 </a>
                | 
              <a href="<?php echo U('itemadd?id='.$v['id']); ?>">  增加项目</a></td>
                <td align="center"> 
                   <a href="<?php echo U('edit?id='.$v['id']); ?>">修改</a> |
                   <a onclick="return confirm('确定删除吗?');"  href="<?php echo U('delete?id='.$v['id']); ?>">删除</a>
                </td>
            
            </tr>
          <?php endforeach; ?>            
        </table>
<!-- 分页开始 -->
        <table id="page-table" cellspacing="0">
            <tr>
                <td width="80%">&nbsp;</td>
                <td align="center" nowrap="true">
                     <?php echo $page; ?>
                </td>
            </tr>
        </table>
    <!-- 分页结束 -->
    </div>
</form>
<!-- 引入时间插件 -->

<link href="/Test4/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/Test4/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/Test4/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script>
// 添加时间插件
$.timepicker.setDefaults($.timepicker.regional['zh-CN']);  // 设置使用中文 

$("#fa").datetimepicker();
$("#ta").datetimepicker();
</script>
<script type="text/javascript" src="/Test4/czxy/Public/Admin/Js/tron.js"></script>
 

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>