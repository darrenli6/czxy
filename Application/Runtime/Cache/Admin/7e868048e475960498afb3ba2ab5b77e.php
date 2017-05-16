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
<div class="main-div">
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Cla/edit/id/5.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
           <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
            <tr>
                <td class="label">班级id：</td>
                <td>
                    <input  type="text" name="nameid" value="<?php echo $data['nameid'] ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">班名：</td>
                <td>
                    <input  type="text" name="name" value="<?php echo $data['name'] ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">班主任姓名：</td>
                <td>
                    <input  type="text" name="tea_name" value="<?php echo $data['tea_name'] ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">自习室地点：</td>
                <td>
                    <input  type="text" name="zixiarea" value="<?php echo $data['zixiarea'] ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">系id：</td>
                <td>
                     <select name="departmentid">
                    <?php foreach($dData as $k=>$v): if($v['id']==$data['departmentid']) $select='selected="selected"'; else $select=''; ?>
                    <option <?php echo $select; ?> value="<?php echo $v['id']; ?>" ><?php echo $v['name']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>


<script>
</script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>