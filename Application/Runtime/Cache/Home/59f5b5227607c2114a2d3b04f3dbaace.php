<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>公交路线规划</title>
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main.css?v=1.0"/>
     
    <script type="text/javascript"
            src="http://webapi.amap.com/maps?v=1.3&key=95874d8ff8cb988804b924431ae3543b"></script>
    
    <style type="text/css">
        #panel {
            position: absolute;
            background-color: white;
            max-height: 80%;
            overflow-y: auto;
            top: 10px;
            right: 10px;
            width: 200px;
            border: solid 1px silver;
        }
        
td {
	cursor: hand;
	font-family: Tahoma;
	width:100%; 
	font-size: 10pt
}

li {
 
	font-family: Tahoma;
 
	font-size: 9pt
}

.up {
	background-color: #48D1CC;
	border-left: 1 solid #A6C1DF;
	border-right: 1 solid #002200;
	border-top: 1 solid #A6C1DF;
	border-bottom: 1 solid #002200
}  
span{
	font-size:8pt;
}        
         
    </style>

</head>
<script> 
function show(c_Str) 
{if(document.all(c_Str).style.display=='none') 
{document.all(c_Str).style.display='block';} 
else{document.all(c_Str).style.display='none';}} 


</script>
<body>
<div id="mapContainer"></div>
<div id="panel">
   出发地<input type="text" id="start" placeholder="填写:如长治学院" /><br />
   目的地<input type="text" id="end" placeholder="填写:如长治医学院" />
     <input type="button" onclick="getData();" value="确定" />
     <input type="button" onclick="javascript:location.href='<?php echo U('index'); ?>'" value="返回" />
     <div id="result"  align="left">
     
     </div>
  </div>
     
  
<script type="text/javascript">
 
   
    var map = new AMap.Map("mapContainer", {
        resizeEnable: true,
        center: [113.08,36.18],//地图中心点
        zoom: 13 //地图显示的缩放级别
    });
    /*
     * 调用公交换乘服务
     */
    function getData(){ 
    var start=document.getElementById('start').value;	
    var end=document.getElementById('end').value;	
    //console.log(start+"---"+end);
    //加载公交换乘插件
    AMap.service(["AMap.Transfer"], function() {
        var transOptions = {
            map: map,
            city: '长治',
            //cityd:'乌鲁木齐',
            policy: AMap.TransferPolicy.LEAST_TIME //乘车策略
        };
        //构造公交换乘类
        var trans = new AMap.Transfer(transOptions);
        //根据起、终点坐标查询公交换乘路线
        trans.search([{keyword:start},{keyword:end}], function(status, result){
        	 
        	if(result.info=='OK')
        	{   var num=result.plans.length;
        		var str='<span >校园行APP温馨提示:一共有'+num+'种方案:</span>';
        		str+='<div align="left"><table border="0" width="100%" cellspacing="0" cellpadding="0">';
        		
        		var obj=result.plans;
        		for(var i=0;i<result.plans.length;i++)
                {   
        			str+='<tr><td><div class=up onclick=show("a'+i+'")>花费'+obj[i].cost+'元,用时'+parseInt(obj[i].time/60)+'分钟.</div><div  id="a'+i+'" style="display: none">';
                	console.log(obj[i]);
                	 var obj1=obj[i].segments;
                    for(var j=0;j<obj1.length;j++)
                    	{
                    	 
                    	str+='<li class=k>'+obj1[j].instruction+'</li>';
                    	console.log(""+obj1[j].instruction);
                    	
                    	}
                    str+="</div></td></tr>";
                 
                    
                } 
        		str+="</table></div>";
                document.getElementById('result').innerHTML=str;
        		console.log(str);
        	}	
        	 	
        	
        });
    });
    
    }
</script>
 <script type="text/javascript" src="http://webapi.amap.com/demos/js/liteToolbar.js"></script>
  
</body>
</html>