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



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 搜索 -->
<div class="form-div search_form_div">
    <form action="/czxy/index.php/Admin/Faoffer/lst" method="GET" name="search_form">
		<p>
			公司名称：
	   		<input type="text" name="com_name" size="30" value="<?php echo I('get.com_name'); ?>" />
		</p>
		<p>
			公司职位：
	   		<input type="text" name="com_position" size="30" value="<?php echo I('get.com_position'); ?>" />
		</p>
		 
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >公司名称</th>
            <th >公司职位</th>
            <th >人数</th>
            <th >薪水</th>
            <th >联系方式</th>
            <th >公司邮箱</th>
            <th >公司地点</th>
            <th >职位描述</th>
            <th >是否认证</th>
            <th >点赞</th>
            <th >是否审核</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['com_name']; ?></td>
				<td><?php echo $v['com_position']; ?></td>
				<td><?php echo $v['com_num']; ?></td>
				<td><?php echo $v['com_salary']; ?></td>
				<td><?php echo $v['com_tel']; ?></td>
				<td><?php echo $v['com_email']; ?></td>
				<td><?php echo $v['com_address']; ?></td>
				<td><?php echo $v['com_desc']; ?></td>
				<td><?php echo $v['checkenter']; ?></td>
				<td><?php echo $v['com_like']; ?></td>
				<td><a href="<?php echo U('lst?state='.$v['state'].'id='.$v['id']); ?>"><?php echo $v['state']; ?></a></td>
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