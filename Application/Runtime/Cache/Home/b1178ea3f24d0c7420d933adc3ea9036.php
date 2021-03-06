<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
     <script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
</head>
    <script>
       var xmldom=null; //声明一个全局变量 储存第一次请求回来的xml信息
       //获取并显示省份
       function  showdepartment(){
            $.ajax({
            	url:"/Test4/czxy/xi.xml",
            	dataType:'xml',  
            	type:'get',
            	success:function(msg){
            		xmldom=msg;
            		var departments=$(msg).find('department');
            		departments.each(function(k,v){
            			var nm=$(this).attr('department');  //系名称
            			var id=$(this).attr('departmentID');  //系id
            			$('#department').append("<option value='"+id+"'>"+nm+"</option>");
            		});
            	}
            });
       }
       
       
       $(function(){
    	   showdepartment();
    	   
       });
       
       function showclass(){
    	   var did=$('#department option:selected').val();
    	   var xml_department=$(xmldom).find('department[departmentID='+did+']');
    	   var cs=xml_department.find('clas');
    	   $('#clas').empty();
    	   cs.each(function(){
    		   var nm=$(this).attr('clas');
    		   var id=$(this).attr('id');
    		   $('#clas').append("<option value='"+id+"'>"+nm+"</option>");
    	   });
       }
     
       
    </script>
<style >

</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		<h1 class="mui-title">校园行-个人中心</h1>
		<a class="mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('personCenter'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
		<a class="mui-icon mui-icon-bars mui-pull-right" href="#topPopover"></a>
	</header>
	<!-- 右上角弹出菜单 -->
	<div id="topPopover" class="mui-popover">
			<div class="mui-popover-arrow"></div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view">
					    <li class="mui-table-view-cell"><a href="<?php echo U('News/lst'); ?>">新闻中心</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Job/index'); ?>">兼职中心</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Teaching/index'); ?>">教学小助手</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Vote/index'); ?>">风云人物</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Other/index'); ?>">生活百宝箱</a></li>
					    <li class="mui-table-view-cell"><a href="<?php echo U('Secondhand/index'); ?>">二手街</a></li>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 主内容部分 -->
	<div class="content">
		 <form action="/Test4/czxy/index.php/Home/PersonCenter/edit.html" method="post"  >
		<section class="personData">
			<ul class="mui-table-view mui-table-view-chevron">
				<li class="mui-table-view-cell mui-media">
					<a class="mui-navigate-right" href="#">
					    <br />
						<label class="name">
						  昵称:
						<input type="text" placeholder="请输入你的昵称" name="nickname" value="<?php echo $uData['nickname']; ?> " />
						</label>
					</a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
				    	 <span class="mui-pull-left">系级</span>
					 <span class="mui-pull-right">
					 <select onchange="showclass()"  name="departmentid"  id="department">
                      <option value="">--请选择--</option>
                    </select>
					 </span>
					 <span style="color:red;">*</span>
				</li>
				<li class="mui-table-view-cell">
					<span class="mui-pull-left">班级</span>
					 <span class="mui-pull-right">
					 <select id="clas"  class="mui-input-clear select" name="classid" id="classid"  >
                        <option value="">--请选择--</option>
                    </select>
					 </span>
					 <span style="color:red;">*</span>
				</li>
				<li class="mui-table-view-cell">
				<span class="mui-pull-left">学号</span>
					<span class="mui-pull-right"><input type="text" name="xuehao" id="xuehao" value="<?php echo $uData['xuehao']; ?>" /> </span>
				    <span style="color:red;">*</span>
				</li>
				<li class="mui-table-view-cell">
					 <span class="mui-pull-left">性别</span>
					 <span class="mui-pull-right">
					 <select name="sex">
					         <option value="男">男</option>
					         <option value="女">女</option>
					      </select>
					 </span>
				</li>
				<li class="mui-table-view-cell">
					<span class="mui-pull-left">QQ号码</span>
					<span class="mui-pull-right">
					<input type="text" name="qq" value="<?php echo $uData['qq']; ?>" />
					</span>
				</li>
				<li class="mui-table-view-cell">
					<span class="mui-pull-left">Email</span>
					<span class="mui-pull-right">
					<input type="text" name="email" id="email" value="<?php echo $uData['email']; ?>" />
					</span><span style="color:red;">*</span>
				</li>
				<li class="mui-table-view-cell">
					<a>手机号<span class="mui-pull-right"> 
					
					<?php echo $mobile; ?> </span></a>
				</li>
				<li class="mui-table-view-cell">
					<input type="submit"     value="确认修改" /> 
					<input type="button"     value="返回" /> 					
				</li>
			</ul>
		</section>
		</form>
	</div>
	<script src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
</body>
</html>