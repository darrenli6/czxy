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


<script type="text/javascript">
  window.onload=function(){
	  var fm=document.getElementsByTagName('form')[0]; 
	  var ub=document.getElementById('uploadbtn');
	  ub.onclick=function(evt){
		  //收集用户
		  var fd=new FormData(fm);
		 //普通表单域+上传文件域信息
		  var xhr=new XMLHttpRequest();
		 xhr.onreadystatechange=function(){
			 if(xhr.readyState==4)
				 {
				 
				 if(xhr.responseText!='上传失败')
				 {
				 	 
				 document.getElementById('filepath').setAttribute('value',xhr.responseText);
				 alert('上传成功!')
				 }else{
					 alert(xhr.responseText);
				 }
				 
				 }
			 
		 } 
		 xhr.upload.onprogress=function(evt)
		 {  // 时间每间隔100ms左右就执行一次
			 var lod=evt.loaded;
			 var tal=evt.total;
			 //上传的百分比
			 var per=Math.floor((lod/tal)*100)+"%";
			 document.getElementById('son').innerHTML=per;
			 document.getElementById('son').style.width=per;
			 
		 }
         xhr.open('post',"<?php echo U('uploadaudio'); ?>");
         xhr.send(fd);
	  }
	  
  }
</script>

<style type="text/css">
  #pat{width:230px;height:25px;border:1px solid blue;}
  #son{width:0px;height:100%;background-color:lightblue;}
</style>
<meta charset="utf-8" />
<div class="main-div">
    <form name="main_form" method="POST" action="/Test4/czxy/index.php/Admin/Broadcast/add.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">标题：</td>
                <td>
                    <input  type="text" name="title" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">上传进度</td>
                <td>
                    <input   id="filepath" type="hidden" value="" name="filepath"  />
                	<div id="pat"><div id="son"></div></div> 
                </td>
            </tr>
            <tr>
                <td class="label">文件路径：</td>
                <td>
                	<input type="file" id="file" name="file" /> 
                	<input type="button"  id="uploadbtn" value="上传" />
                </td>
            </tr>
            <tr>
                <td class="label">文字内容：</td>
                <td>
                	<textarea id="filecontent" name="filecontent"></textarea>
                </td>
            </tr>
            <tr>
                <td class="label">主办方：</td>
                <td>
                    <input  type="text" name="leader" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">作者：</td>
                <td>
                    <input  type="text" name="author" value="" />
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
    <script type="text/javascript" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
<link href="/Test4/czxy/Public/umeditor1_2_2-utf8-php/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/umeditor.min.js"></script>
<script type="text/javascript" src="/Test4/czxy/Public/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js"></script>

<script>
UM.getEditor('filecontent',{
	 initialFrameWidth:'100%',
	 initialFrameHeight:350,
});

</script>

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>