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



<div class="main-div">
    <form name="main_form" method="POST" action="/czxy/index.php/Admin/Faoffer/add.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">公司名称：</td>
                <td>
                    <input  type="text" name="com_name" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">公司职位：</td>
                <td>
                    <input  type="text" name="com_position" value="保密" />
                </td>
            </tr>
            <tr>
                <td class="label">人数：</td>
                <td>
                    <input  type="text" name="com_num" value="1" />
                </td>
            </tr>
            <tr>
                <td class="label">薪水：</td>
                <td>
                    <input  type="text" name="com_salary" value="1000" />
                </td>
            </tr>
            <tr>
                <td class="label">联系方式：</td>
                <td>
                    <input  type="text" name="com_tel" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">公司邮箱：</td>
                <td>
                    <input  type="text" name="com_email" value="503102319@qq.com" />
                </td>
            </tr>
            <tr>
                <td class="label">公司地点：</td>
                <td>
                    <input  type="text" name="com_address" value="长治市" />
                </td>
            </tr>
            <tr>
                <td class="label">职位描述：</td>
                <td>
                    <input  type="text" name="com_desc" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">点赞：</td>
                <td>
                    <input  type="text" name="com_like" value="100" />
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