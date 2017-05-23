<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园行-与你行 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/czxy/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/czxy/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/czxy/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
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



<meta http-equiv="text/html"  charset="utf-8"  />
<!-- 搜索 -->
<div class="form-div search_form_div">
    <form action="/czxy/index.php/Admin/Secondthing/lst" method="GET" name="search_form">
		<p>
			二手主题：
	   		<input type="text" name="title" size="30" value="<?php echo I('get.title'); ?>" />
		</p>
		<p>
			发布人名字：
	   		<input type="text" name="public_name" size="30" value="<?php echo I('get.public_name'); ?>" />
		</p>
		<p>
			交易方式：
			<input type="radio" value="自取" name="deal_type" <?php if(I('get.deal_type', -1) == '自取') echo 'checked="checked"'; ?> /> 自取 
			<input type="radio" value="上门取货" name="deal_type" <?php if(I('get.deal_type', -1) == '上门取货') echo 'checked="checked"'; ?> />上门取货  
		</p>
		<p>
			发布时间：
	   		从 <input id="public_timefrom" type="text" name="public_timefrom" size="15" value="<?php echo I('get.public_timefrom'); ?>" /> 
		    到 <input id="public_timeto" type="text" name="public_timeto" size="15" value="<?php echo I('get.public_timeto'); ?>" />
		</p>
		<p>
			二手交易物品种类：
	   		<input type="text" name="categoryid" size="30" value="<?php echo I('get.categoryid'); ?>" />
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >二手主题</th>
            <th >主题图片</th>
            <th >原来价格</th>
            <th >现在价格</th>
            <th >发布人名字</th>
            <th >手机号</th>
            <th >qq号</th>
            <th >交易方式</th>
            <th >发布时间</th>
            <th >二手交易物品种类</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['title']; ?></td>
				<td><?php showImage($v['little_title_pic']); ?></td>
				<td><?php echo $v['old_price']; ?></td>
				<td><?php echo $v['now_price']; ?></td>
				<td><?php echo $v['public_name']; ?></td>
				<td><?php echo $v['phone']; ?></td>
				<td><?php echo $v['qq']; ?></td>
				<td><?php echo $v['deal_type']; ?></td>
				<td><?php echo $v['public_time']; ?></td>
				<td><?php echo $v['categoryid']; ?></td>
		 
		        <td align="center">
		        	<a href="<?php echo U('edit?id='.$v['id'].'&p='.I('get.p')); ?>" title="编辑">编辑</a> |
	                <a href="<?php echo U('delete?id='.$v['id'].'&p='.I('get.p')); ?>" onclick="return confirm('确定要删除吗？');" title="移除">移除</a> 
		        </td>
	        </tr>
        <?php endforeach; ?> 
		<?php if(preg_match('/\d/', $page)): ?>  
        <tr><td align="right" nowrap="true" colspan="99" height="30"><?php echo $page; ?></td></tr> 
        <?php endif; ?> 
	</table>
</div>

<link href="/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/czxy/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/czxy/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script>$.timepicker.setDefaults($.timepicker.regional['zh-CN']);</script>
		<script>
$('#public_timefrom').datetimepicker(); $('#public_timeto').datetimepicker(); </script>

<script src="/czxy/Public/Admin/Js/tron.js"></script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>