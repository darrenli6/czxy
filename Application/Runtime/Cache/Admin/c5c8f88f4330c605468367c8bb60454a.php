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



<meta charset="utf-8" />
<div class="main-div">
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/User/edit/id/3.html" enctype="multipart/form-data" >
    	<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
		<input type="hidden" name="old_face" value="<?php echo $data['face']; ?>" />
		<input type="hidden" name="old_big_face" value="<?php echo $data['big_face']; ?>" />
		<input type="hidden" name="old_mid_face" value="<?php echo $data['mid_face']; ?>" />
		<input type="hidden" name="old_sm_face" value="<?php echo $data['sm_face']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">用户名手机号：</td>
                <td>
                    <input  type="text" name="username" value="<?php echo $data['username']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">密码：</td>
                <td>
                    <input type="password" size="25" name="password" />
                </td>
            </tr>
           <tr>
                <td class="label">角色：</td>
                <td>
                     <select name="roleid">
                       <?php foreach($urData as $k=>$v): if($v['id']==$data['roleid']){ $check='checked="checked"'; } ?>
                        <option <?php echo $check; ?> value="<?php echo $v['id']; ?>">
                        <?php echo $v['rolename']; ?>
                        </option>
                       <?php endforeach;?>
                     </select>
                </td>
            </tr>
            <tr>
                <td class="label">学号：</td>
                <td>
                    <input  type="text" name="xuehao" value="<?php echo $data['xuehao']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">班级代号：</td>
                <td>
                    <input  type="text" name="classid" value="<?php echo $data['classid']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">系代号：</td>
                <td>
                    <input  type="text" name="departmentid" value="<?php echo $data['departmentid']; ?>" />
                </td>
            </tr>
            <!--
            <tr>
                <td class="label">头像：</td>
                <td>
                	<input type="file" name="face" /><br /> 
                	<?php showImage($data['face'], 100); ?>                </td>
            </tr>
              -->
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