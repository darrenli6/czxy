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
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Applyjob/edit/id/5/p/1.html" enctype="multipart/form-data" >
    	<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">姓名：</td>
                <td>
                    <input  type="text" name="name" value="<?php echo $data['name']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">性别：</td>
                <td>
                     <select name="sex">
                       <option  value="男" <?php if($data['sex'] == '男') echo 'selected="selected"'; ?> >男</option>
                       <option value="女"  <?php if($data['sex'] == '女') echo 'selected="selected"'; ?>>女</option>
                       <option  value="保密"<?php if($data['sex'] == '保密') echo 'selected="selected"'; ?> >保密</option>
                     </select>
                </td>
            </tr>
            <tr>
                <td class="label">想要申请的职位：</td>
                <td>
                    <input  type="text" name="position" value="<?php echo $data['position']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">学历：</td>
                <td>
                	<input type="radio" name="education" value="高中" <?php if($data['education'] == '高中') echo 'checked="checked"'; ?> />高中 
                	<input type="radio" name="education" value="小学" <?php if($data['education'] == '小学') echo 'checked="checked"'; ?> />小学 
                	<input type="radio" name="education" value="保密" <?php if($data['education'] == '保密') echo 'checked="checked"'; ?> />保密 
                	<input type="radio" name="education" value="本科" <?php if($data['education'] == '本科') echo 'checked="checked"'; ?> />本科 
                	<input type="radio" name="education" value="大专" <?php if($data['education'] == '大专') echo 'checked="checked"'; ?> />大专 
                	<input type="radio" name="education" value="初中" <?php if($data['education'] == '初中') echo 'checked="checked"'; ?> />初中 
                	<input type="radio" name="education" value="硕士" <?php if($data['education'] == '硕士') echo 'checked="checked"'; ?> />硕士 
                </td>
            </tr>
            <tr>
                <td class="label">应聘宣言：</td>
                <td>
                    <input  type="text" name="apply_info" value="<?php echo $data['apply_info']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">电话：</td>
                <td>
                    <input  type="text" name="tel" value="<?php echo $data['tel']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">邮箱：</td>
                <td>
                    <input  type="text" name="email" value="<?php echo $data['email']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">qq：</td>
                <td>
                    <input  type="text" name="qq" value="<?php echo $data['qq']; ?>" />
                </td>
            </tr>
             <tr>
                <td class="label">是否</td>
                <td>
                    <input type="radio" name="state" value="是" <?php if($data['state']=='是') echo 'checked="checked"'; ?>  >是
				  <input type="radio" name="state" value="否" <?php if($data['state']=='否') echo 'checked="checked"'; ?>>否
                     
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