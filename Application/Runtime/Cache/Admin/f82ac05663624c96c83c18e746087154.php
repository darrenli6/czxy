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
<div class="tab-div">
   <div id="tabbar-div">
     <p>
       <span class="tab-front">二手货物基本信息</span>
       <span class="tab-back">二手货物相册</span>
     </p>
   </div>
</div>
<div class="tabbody-div">
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Secondthing/add.html" enctype="multipart/form-data">
       <!-- 基本信息 -->
        <table cellspacing="1" class="tab_table" cellpadding="3" width="100%">
            <tr>
                <td class="label">二手主题：</td>
                <td>
                    <input  type="text" name="title" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">填写的内容：</td>
                <td>
                	<textarea  name="content"></textarea>
                </td>
            </tr>
            <tr>
                <td class="label">主题图片：</td>
                <td>
                	<input type="file" name="title_pic" /> 
                </td>
            </tr>
            <tr>
                <td class="label">原来价格：</td>
                <td>
                    <input  type="text" name="old_price" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">现在价格：</td>
                <td>
                    <input  type="text" name="now_price" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">发布人名字：</td>
                <td>
                    <input  type="text" name="public_name" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">手机号：</td>
                <td>
                    <input  type="text" name="phone" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">qq号：</td>
                <td>
                    <input  type="text" name="qq" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">交易方式：</td>
                <td>
                	<input type="radio" name="deal_type" value="自取"  />自取 
                	<input type="radio" name="deal_type" value="上门取货"  />上门取货 
                </td>
            </tr>
            <tr>
                <td class="label">发布时间：</td>
                <td>
                    <input id="public_time" type="text" name="public_time" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">二手交易物品种类：</td>
                <td>
                    <select name="categoryid" >
                     <?php foreach($cData as $k=>$v): ?>
                      <option value="<?php echo $v['id']; ?>">
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
        
          <!-- 二手货物相册 -->
            <table style="display:none;" width="100%" class="tab_table" align="center">
            	<tr>
            	<td>
            		<input type="file" name="pic"  /> 
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
	initialFrameWidth:"60%",
	 initialFrameHeight:350
});
//切换菜单
   /*****************切换代码**********/
     $('#tabbar-div p span').click(function(){
    	 var i=$(this).index();
    	 //先隐藏所有的table
    	 $(".tab_table").hide();
    	 //显示第一个table
    	 $(".tab_table").eq(i).show();
    	 //先取消原来按钮的选中状态
    	 $(".tab-front").removeClass("tab-front").addClass("tab-back");
    	 //设置当前按钮选中
    	 $(this).removeClass("tab-back").addClass("tab-front");
     });
</script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>