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
    <form action="/czxy/index.php/Admin/Applyjob/lst" method="GET" name="search_form">
		<p>
			姓名：
	   		<input type="text" name="name" size="30" value="<?php echo I('get.name'); ?>" />
		</p>
		<p>
			想要申请的职位：
	   		<input type="text" name="position" size="30" value="<?php echo I('get.position'); ?>" />
		</p>
		<p>
			学历：
			<input type="radio" value="-1" name="education" <?php if(I('get.education', -1) == -1) echo 'checked="checked"'; ?> /> 全部 
			<input type="radio" value="高中" name="education" <?php if(I('get.education', -1) == '高中') echo 'checked="checked"'; ?> />高中  
			<input type="radio" value="小学" name="education" <?php if(I('get.education', -1) == '小学') echo 'checked="checked"'; ?> />小学  
			<input type="radio" value="保密" name="education" <?php if(I('get.education', -1) == '保密') echo 'checked="checked"'; ?> /> 保密 
			<input type="radio" value="本科" name="education" <?php if(I('get.education', -1) == '本科') echo 'checked="checked"'; ?> />本科  
			<input type="radio" value="大专" name="education" <?php if(I('get.education', -1) == '大专') echo 'checked="checked"'; ?> />大专  
			<input type="radio" value="初中" name="education" <?php if(I('get.education', -1) == '初中') echo 'checked="checked"'; ?> />初中  
			<input type="radio" value="博士" name="education" <?php if(I('get.education', -1) == '博士') echo 'checked="checked"'; ?> />博士  
			<input type="radio" value="硕士" name="education" <?php if(I('get.education', -1) == '硕士') echo 'checked="checked"'; ?> />硕士  
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >姓名</th>
            <th >性别</th>
            <th >想要申请的职位</th>
            <th >学历</th>
            <th >应聘宣言</th>
            <th >电话</th>
            <th >邮箱</th>
            <th >qq</th>
            <th >审核</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['name']; ?></td>
				<td><?php echo $v['sex']; ?></td>
				<td><?php echo $v['position']; ?></td>
				<td><?php echo $v['education']; ?></td>
				<td><?php echo $v['apply_info']; ?></td>
				<td><?php echo $v['tel']; ?></td>
				<td><?php echo $v['email']; ?></td>
				<td><?php echo $v['qq']; ?></td>
				<td><?php echo $v['state']; ?></td>
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