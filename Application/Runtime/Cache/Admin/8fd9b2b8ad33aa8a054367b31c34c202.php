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



<meta charset="utf-8" />
<!-- 搜索 -->
<div class="form-div search_form_div">
    <form action="/czxy/index.php/Admin/Signin/lst" method="GET" name="search_form">
		<p>
			签到签退：
			<input type="radio" value="-1" name="signstate" <?php if(I('get.signstate', -1) == -1) echo 'checked="checked"'; ?> /> 全部 
			<input type="radio" value="签到" name="signstate" <?php if(I('get.signstate', -1) == '签到') echo 'checked="checked"'; ?> />  签到
			<input type="radio" value="签退" name="signstate" <?php if(I('get.signstate', -1) == '签退') echo 'checked="checked"'; ?> />  签退
		</p>
		<p>
			昵称：
	   		<input type="text" name="nickname" size="30" value="<?php echo I('get.nickname'); ?>" />
		</p>
		<p>
			用户备注信息：
	   		<input type="text" name="remark" size="30" value="<?php echo I('get.remark'); ?>" />
		</p>
		<p>
			签到时间：
	   		从 <input id="signdatefrom" type="text" name="signdatefrom" size="15" value="<?php echo I('get.signdatefrom'); ?>" /> 
		    到 <input id="signdateto" type="text" name="signdateto" size="15" value="<?php echo I('get.signdateto'); ?>" />
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >openid</th>
            <th >昵称</th>
            <th >头像</th>
            <th >用户备注信息</th>
            <th >签到时间</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['openid']; ?></td>
				<td><?php echo $v['nickname']; ?></td>
				<td><?php echo $v['headimgurl']; ?></td>
				<td><?php echo $v['remark']; ?></td>
				<td><?php echo $v['signdate']; ?></td>
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
$('#signdatefrom').datetimepicker(); $('#signdateto').datetimepicker(); </script>

<script src="/czxy/Public/Admin/Js/tron.js"></script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>