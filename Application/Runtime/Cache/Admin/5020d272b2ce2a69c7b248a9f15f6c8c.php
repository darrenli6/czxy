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
    <form name="main_form" method="POST" action="/czxy/index.php/Admin/Recordmsgsecond/edit/id/2.html" enctype="multipart/form-data" >
    	<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">你的卖家：</td>
                <td>
                    <input  type="text" name="fromusername" value="<?php echo $data['fromusername']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">购买二手物品的id：</td>
                <td>
                    <input  type="text" name="secondid" value="<?php echo $data['secondid']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">记录买家：</td>
                <td>
                    <input  type="text" name="tousername" value="<?php echo $data['tousername']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">购买时间：</td>
                <td>
                    <input id="msgdate" type="text" name="msgdate" value="<?php echo $data['msgdate']; ?>" />
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
$("#msgdate").datepicker(); 
</script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>