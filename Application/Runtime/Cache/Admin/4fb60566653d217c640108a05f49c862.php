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



<meta http-equiv="text/html"  charset="utf-8"  />
<div class="main-div">
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Secondthing/edit/id/4.html" enctype="multipart/form-data" >
    	<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
		<input type="hidden" name="old_title_pic" value="<?php echo $data['title_pic']; ?>" />
		<input type="hidden" name="old_big_title_pic" value="<?php echo $data['big_title_pic']; ?>" />
		<input type="hidden" name="old_mid_title_pic" value="<?php echo $data['mid_title_pic']; ?>" />
		<input type="hidden" name="old_sm_title_pic" value="<?php echo $data['sm_title_pic']; ?>" />
		<input type="hidden" name="old_pic_id" value="<?php echo $data['pic_id']; ?>" />
		<input type="hidden" name="old_big_pic_id" value="<?php echo $data['big_pic_id']; ?>" />
		<input type="hidden" name="old_mid_pic_id" value="<?php echo $data['mid_pic_id']; ?>" />
		<input type="hidden" name="old_sm_pic_id" value="<?php echo $data['sm_pic_id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">二手主题：</td>
                <td>
                    <input  type="text" name="title" value="<?php echo $data['title']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">填写的内容：</td>
                <td>
                	<textarea id="content" name="content"><?php echo $data['content']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="label">主题图片：</td>
                <td>
                	<input type="file" name="title_pic" /><br /> 
                	<?php showImage($data['title_pic'], 100); ?>                </td>
            </tr>
            <tr>
                <td class="label">原来价格：</td>
                <td>
                    <input  type="text" name="old_price" value="<?php echo $data['old_price']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">现在价格：</td>
                <td>
                    <input  type="text" name="now_price" value="<?php echo $data['now_price']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">发布人名字：</td>
                <td>
                    <input  type="text" name="public_name" value="<?php echo $data['public_name']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">手机号：</td>
                <td>
                    <input  type="text" name="phone" value="<?php echo $data['phone']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">qq号：</td>
                <td>
                    <input  type="text" name="qq" value="<?php echo $data['qq']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">交易方式：</td>
                <td>
                	<input type="radio" name="deal_type" value="自取" <?php if($data['deal_type'] == '自取') echo 'checked="checked"'; ?> />自取 
                	<input type="radio" name="deal_type" value="上门取货" <?php if($data['deal_type'] == '上门取货') echo 'checked="checked"'; ?> />上门取货 
                </td>
            </tr>
            <tr>
                <td class="label">发布时间：</td>
                <td>
                    <input id="public_time" type="text" name="public_time" value="<?php echo $data['public_time']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">二手交易物品种类：</td>
                <td>
                  <select name="categoryid" >
                     <?php foreach($cData as $k=>$v): if($v['id']==$data['categoryid']) $select='selected="selected"'; else $select=''; ?>
                      <option <?php echo $select; ?> value="<?php echo $v['id']; ?>">
                      <?php echo $v['name']; ?>
                      </option>
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

<link href="/Test4/czxy/Public/umeditor1_2_2-utf8-php/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/umeditor.min.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js"></script>
<link href="/Test4/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="/Test4/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="/Test4/czxy/Public/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>
<script>
$("#public_time").datepicker(); 
var um = UM.getEditor('content', {
	initialFrameWidth:"100%"
});
</script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>