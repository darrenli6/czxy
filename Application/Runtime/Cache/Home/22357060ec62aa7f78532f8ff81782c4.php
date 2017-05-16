<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>校园行</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- loading mui -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/mui.min.css">
	
 
	<!-- custorm style -->
	<link rel="stylesheet" type="text/css" href="/Test4/czxy/Public/Home/css/css/style.css">
    <script src="/Test4/czxy/Public/Home/js/jquery-1.8.3.min.js"></script>
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
    		   var id=$(this).attr('clasID');
    		   $('#clas').append("<option value='"+id+"'>"+nm+"</option>");
    	   });
       }
    </script>
</head>
<style>
  .exit{
	margin-top:35px;
  }
</style>
<body>
	<!-- 导航栏 -->
	<header id="header" class="mui-bar mui-bar-nav">
		 
		<a class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-btn-nav mui-pull-left" href="<?php echo U('Index/index'); ?>"><span class="mui-icon mui-icon-left-nav"></span></a>
	</header>
 
	 <!-- 内容 -->
	<!-- 主内容部分 -->
	
	
	<div class="content">
	   <div class="teacherC">
			<!-- 查询 -->
			<form class="mui-input-group" method="get" action="/Test4/czxy/index.php/Home/Teaching/index1" name="czxy">
				<div class="mui-input-row">
					<label>
                       系别
                    </label>
                    <select onchange="showclass()"  name="departmentid"  id="department">
                      <option value="0">--请选择--</option>
                    </select>
					 
				</div>
					<div class="mui-input-row">
					<label>
                 班级
                    </label>
                   <select id="clas"  class="mui-input-clear select" name="classid"   >
                        <option value="0">--请选择--</option>
                    </select>
				 
					
				</div>	
				<a  href='javascript:document.czxy.submit();'  class="select_button">查询</a>		
			</form>
		</div>
	 
		<section class="query">
				<table id="timeTable">
				<tr>
					<th></th>
					<th>一</th>
					<th>二</th>
					<th>三</th>
					<th>四</th>
					<th>五</th>
					 
				</tr>
				<?php if($data): foreach($data as $k=>$v): ?>
				<tr>
					<td><?php echo $v['xingqi']; ?></td>
					<td class="timetable-course"><?php echo handler_row($v['diyi']); ?></td>
					<td class="timetable-course"><?php echo $v['dier']; ?></td>
					<td class="timetable-course"><?php echo $v['disan']; ?></td>
					<td class="timetable-course"><?php echo $v['disi']; ?></td>
					<td class="timetable-course"><?php echo $v['diwu']; ?></td>
				</tr>
			 <?php endforeach; else: ?>
                  <tr>
					<td colspan="6">对不起,没有数据. </td>
				</tr> 	 
		       <?php endif; ?> 	 
			</table>
		</section>
	</div>
	
	<div class="cover_table">
		<div class="exit">
			<img src="/Test4/czxy/Public/Home/images/exit.png" height="50" width="50">
		</div>
		<table>
			<tr>
				<th>科目</th>
				<th >地点</th>
			</tr>
			<tr>
				<td id="subject"></td>
				<td id="area"></td>
			</tr>
		</table>
	</div>

	<!-- loading jquery -->
	<script type="text/javascript" src="/Test4/czxy/Public/Home/js/jquery-1.12.1.min.js"></script>
	<!-- loading mui -->
	<script type="text/javascript" src="/Test4/czxy/Public/Home/js/mui.min.js"></script>
	 
	 
	<!-- loading class-data -->
	<script type="text/javascript" src="/Test4/czxy/Public/Home/js/time-data.js"></script>
	<script type="text/javascript">
		(function($, doc) {
			$.init();
			$.ready(function() {
				var cityPicker = new $.PopPicker({
					layer: 3
				});
				cityPicker.setData(classData);
				var showCityPickerButton = doc.getElementById('showCityPicker');
				var cityResult = doc.getElementById('classResult');
				showCityPickerButton.addEventListener('tap', function(event) {
					cityPicker.show(function(items) {
					cityResult.innerText = items[0].text + " " + items[1].text + " " + items[2].text;
						//返回 false 可以阻止选择框的关闭
						//return false;
					});
				}, false);
			});
		})(mui, document);
		window.onload = function(){
			// 便利获取表格中所有的值
			$('.timetable-course').each(function() {
				if ($(this).text() != '') {
					var re=$(this).text();
					
					$(this).css({"background-color":"#5cb85c", "color":"#ffffff"});
					$(this).on('click', function(event){
						var str=$(this).text();
						var arr=str.split('@');
						$('#subject').html(arr[0]);
						
						 $('#area').html(arr[1]);
						
						
						$('.cover_table').show();
					});
				}
			});
			$('.exit').on('click', function(event) {
				$('.cover_table').hide();
				$('#area').html('');
			});
		}
	</script>
</body>
</html>