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
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Gradeinfo/add.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">学号：</td>
                <td>
                    <input  type="text" name="stuno" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">学期：</td>
                <td>
                    <select name="periodno">
                        <?php foreach($gpData as $k=>$v):?>
                         <option value="<?php echo $v['id']; ?>" ><?php echo $v['periodname']; ?></option>
                        <?php endforeach; ?> 
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label">学生成绩信息：</td>
                <td>
                     <ul id="list">
            	       <li>
            	        科目成绩:<a onclick="addNewGrade(this);" href="#">[+]</a>
            	        <select name="gradeinfo[course][]">
            	         <?php foreach($cData as $k=>$v): ?>
            	          <option value="<?php echo $v['coursename'] ?>"><?php echo $v['coursename'] ?></option>
            	         <?php endforeach; ?>
            	        </select>
            	       <input name="gradeinfo[grade][]" type="text" required="required" value="" />分
            	       </li>
            	     </ul>
                     
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
function addNewGrade(a)
{   
	var li=$(a).parent();
	if($(a).text()=='[+]')
		{  
		  var newLi= li.clone();
		  newLi.find('a').text('[-]');
		  li.after(newLi);
		}else{
	      li.remove();
		}
	 
}
</script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>