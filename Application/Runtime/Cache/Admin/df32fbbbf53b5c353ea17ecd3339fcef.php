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




<!-- 搜索 -->
<div class="form-div search_form_div">
    <form action="/Test4/czxy/index.php/Admin/Signsuggestion/lst" method="GET" name="search_form">
		<p>
			姓名：
	   		<input type="text" name="remark" size="30" value="<?php echo I('get.remark'); ?>" />
		</p>
		<p>
			发表意见时间：
	   		从 <input id="suggestiondatefrom" type="text" name="suggestiondatefrom" size="15" value="<?php echo I('get.suggestiondatefrom'); ?>" /> 
		    到 <input id="suggestiondateto" type="text" name="suggestiondateto" size="15" value="<?php echo I('get.suggestiondateto'); ?>" />
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >姓名</th>
            <th >发表意见时间</th>
            <th >意见</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['remark']; ?></td>
				<td><?php echo $v['suggestiondate']; ?></td>
				<td><?php echo $v['suggestion']; ?></td>
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

<link href="/Test4/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/Test4/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/Test4/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script>$.timepicker.setDefaults($.timepicker.regional['zh-CN']);</script>
		<script>
$('#suggestiondatefrom').datetimepicker(); $('#suggestiondateto').datetimepicker(); </script>

<script src="/Test4/czxy/Public/Admin/Js/tron.js"></script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>