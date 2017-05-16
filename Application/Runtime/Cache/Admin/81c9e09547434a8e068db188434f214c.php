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
    <form action="/czxy/index.php/Admin/User/lst" method="GET" name="search_form">
		<p>
			用户名手机号：
	   		<input type="text" name="username" size="30" value="<?php echo I('get.username'); ?>" />
		</p>
		<p>
			学号：
	   		<input type="text" name="xuehao" size="30" value="<?php echo I('get.xuehao'); ?>" />
		</p>
		<p>
			班级代号：
	   		<input type="text" name="classid" size="30" value="<?php echo I('get.classid'); ?>" />
		</p>
		<p>
			系代号：
	   		<input type="text" name="departmentid" size="30" value="<?php echo I('get.departmentid'); ?>" />
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >用户名手机号</th>
            <th >真实姓名</th>
            <th >角色</th>
            <th >学号</th>
            <th >班级代号</th>
            <th >系代号</th>
            <th >头像</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['username']; ?></td>
				<td><?php echo $v['nickname']; ?></td>
				<td>
                  <?php echo $v['rolename']; ?>
                 </td>
				<td><?php echo $v['xuehao']; ?></td>
				<td><?php echo $v['classid']; ?></td>
				<td><?php echo $v['departmentid']; ?></td>
				<td><?php echo $v['face']; ?></td>
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

<script>
</script>

<script src="/czxy/Public/Admin/Js/tron.js"></script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>