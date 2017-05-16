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
<!-- 搜索 -->
<div class="form-div search_form_div">
    <form action="/Test4/czxy/index.php/Admin/Coursetable/lst" method="GET" name="search_form">
		<p>
			
	   	 星期	<select name="xingqi">
	   	          <option selected="selected" value="">--请选择--</option>
	   	          <option value="星期一">星期一</option>
	   	          <option value="星期二">星期二</option>
	   	          <option value="星期三">星期三</option>
	   	          <option value="星期四">星期四</option>
	   	          <option value="星期五">星期五</option>
	   	          <option value="星期六">星期六</option>
	   	          <option value="星期日">星期日</option>
	   	    </select>
		</p>
		<p>
			
	   	  班级<select name="classid">
	   	     <option  selected="selected" value="">--请选择--</option>
	   	     <?php foreach($cData as $k=>$v): ?>
	   	          <option value="<?php echo $v['id']; ?>">
	   	            <?php echo $v['nameid'].'-'.$v['name']; ?>
	   	          </option>
	   	     <?php endforeach; ?>
	   	    </select> 
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
   
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >编号</th>
            <th >星期</th>
            <th >第一节课</th>
            <th >第二节课</th>
            <th >第三节课</th>
            <th >第四节课</th>
            <th >第五节课</th>
            <th >班级</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['id']; ?></td>
				<td><?php echo $v['xingqi']; ?></td>
				<td><?php echo $v['diyi']; ?></td>
				<td><?php echo $v['dier']; ?></td>
				<td><?php echo $v['disan']; ?></td>
				<td><?php echo $v['disi']; ?></td>
				<td><?php echo $v['diwu']; ?></td>
				<td><?php  foreach($cData as $k1=>$v1): if($v1['id']==$v['classid']) echo $v1['nameid'].'-'.$v1['name']; else continue; endforeach; ?></td>
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

<script src="/Test4/czxy/Public/Admin/Js/tron.js"></script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>