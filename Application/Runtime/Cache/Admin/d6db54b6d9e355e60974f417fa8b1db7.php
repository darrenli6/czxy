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




<div class="main-div">
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Faoffer/edit/id/4.html" enctype="multipart/form-data" >
    	<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">单位名称</td>
                <td>
                    <input  type="text" name="com_name" value="<?php echo $data['com_name']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">职位</td>
                <td>
                    <input  type="text" name="com_position" value="<?php echo $data['com_position']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">需求人数</td>
                <td>
                    <input  type="text" name="com_num" value="<?php echo $data['com_num']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">薪水</td>
                <td>
                    <input  type="text" name="com_salary" value="<?php echo $data['com_salary']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">联系方式</td>
                <td>
                    <input  type="text" name="com_tel" value="<?php echo $data['com_tel']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">邮箱</td>
                <td>
                    <input  type="text" name="com_email" value="<?php echo $data['com_email']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">要求学历</td>
                <td>
                  <select name="education">
                    <option value="本科" <?php if($data['education'] == '本科') echo 'selected="selected"'; ?>>本科</option>
                    <option value="高中" <?php if($data['education'] == '高中') echo 'selected="selected"'; ?> >高中</option>
                    <option value="初中" <?php if($data['education'] == '初中') echo 'selected="selected"'; ?>>初中</option>
                    <option value="大专" <?php if($data['education'] == '大专') echo 'selected="selected"'; ?>>大专</option>
                 </select>
                </td>
            </tr>
            <tr>
                <td class="label">福利</td>
                <td>
                    <input  type="text" name="fuli" value="<?php echo $data['fuli']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">认证</td>
                <td>
                 <select name="checkenter">
                    <option value="企业认证" <?php if($data['checkenter'] == '企业认证') echo 'selected="selected"'; ?>>企业认证</option>
                    <option value="企业未认证"<?php if($data['checkenter'] == '企业未认证') echo 'selected="selected"'; ?> >企业未认证</option>
                 </select>
                </td>
            </tr>
            <tr>
                <td class="label">公司地址</td>
                <td>
                    <input  type="text" name="com_address" value="<?php echo $data['com_address']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">公司描述</td>
                <td>
                    <input  type="text" name="com_desc" value="<?php echo $data['com_desc']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">点赞数</td>
                <td>
                    <input  type="text" name="com_like" value="<?php echo $data['com_like']; ?>" />
                </td>
            </tr>
             <tr>
                <td class="label">是否通过审核</td>
                <td>
                  <input type="radio" name="state" value="是" <?php if($data['state']=='是') echo 'checked="checked"'; ?>  >是
				  <input type="radio" name="state" value="否" <?php if($data['state']=='否') echo 'checked="checked"'; ?>>否
                    
                </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="submit" class="button" value="确定 " />
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