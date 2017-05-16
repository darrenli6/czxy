<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>锅打灰太狼</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
				list-style: none;
			}
			.container{
				width: 480px;
				height: 720px;
				margin: 0 auto;
				position: relative;
			}
			.background{
				position: absolute;
				z-index: -100;
				width: 100%;
			}
			.pro{
				position: absolute;
				width:270px;
				height: 24px;
				border-radius: 10px; 
				left: 95px;
				top: 99px;
				background: url(/Test4/czxy/Public/Home/game/wolf/img/progress.png) 0 0 no-repeat;
				background-size: 100%;
				background-position-x: 0px;
			}
			.start{
				width: 250px;
				border: 0;
				border-radius: 30px;
				background: linear-gradient(#E55C3D,#C50000);
				margin: 0 auto;
				font-size: 40px;
				position: absolute;
				color: #fff;
				left: 0;
				right: 0;
				margin: 0 auto;
				top:400px;
			}
			.start:hover{
				background: linear-gradient(#C50000,#E55C3D);
			}
			.score{
				position: absolute;
				left: 100px;
				top: 20px;
				color: #fff;
			}
			.over{
				text-align: center;
				position: relative;
				top: 300px;
				font-weight: bold;
				display: none;
				font-size: 60px;
				text-shadow: 3px 3px 0 #fff;
				background: -webkit-gradient(linear, 0 0, 0 bottom, from(rgba(255, 0, 0, 1)), to(rgba(0, 0, 213, 1)));
			    -webkit-background-clip: text;
			    -webkit-text-fill-color: transparent;
			}
			.restart{
				width: 250px;
				border: 0;
				border-radius: 30px;
				background: linear-gradient(#74ACCF,#007DDC);
				margin: 0 auto;
				font-size: 40px;
				position: absolute;
				color: #fff;
				left: 0;
				right: 0;
				margin: 0 auto;
				top:400px;
				display: none;
			}
			.restart:hover{
				background: linear-gradient(#007DDC,#74ACCF);
			}
			.rules{
				border: 0;
				width: 100%;
				position: absolute;
				bottom: 0px;
				font-size: 20px;
			}
			.rule{
				position: absolute;
				width: 100%;
				height: 500px;
				text-align: center;
				background: #000;
				opacity: 0.8;
				padding-top: 200px;
			}
			.rule p{
				padding: 20px 0;
				font-size: 20px;
				color: #fff;
			}
			.rule{
				padding-bottom: 20px;
				display: none;
				position: absolute;
				z-index: 1000000000000;
			}
			a{
				font-size: 20px;
				color: red;
			}
		</style>
		<script type="text/javascript">
		var progress=document.querySelector('.pros');
		var start=document.querySelector('.start');
		var pros=document.getElementsByClassName('pro')[0];
		var over=document.getElementsByClassName('over')[0];
		var restart=document.getElementsByClassName('restart')[0];
		var container=document.querySelector('.container');
		var scores=document.querySelector('h1');
		var s=0;
		var rules=document.querySelector('.rules');
		var rule=document.querySelector('.rule');
		var close=document.querySelector('a');
		var url = "/Test4/czxy/Public/Home/game/wolf/img/";
		// 开始游戏
		start.onclick=function(){
			// 按钮移除
			this.remove();
			// 进度条
			var proLeft=0;
			var timer_pro=setInterval(function(){
				proLeft-=0.045;
				pros.style.backgroundPositionX=proLeft+'px';
				if (proLeft<=-270) {
					clearInterval(timer_pro);
					clearInterval(circle);
					over.style.display='block';
					restart.style.display='block';
				}
			},5)
			star();	// 第一次游戏的函数
			res();	// 调用重新开始的函数
		}

		// 游戏开始函数
		function star(){
			//=============================================================================游戏进行时
			circle=setInterval(function(){
			//灰太狼随机出现的位置
			var arrPos = [
				{left:"170px",top:"210px"},
				{left:"50px",top:"280px"},
				{left:"45px",top:"370px"},
				{left:"70px",top:"480px"},
				{left:"200px",top:"450px"},
				{left:"330px",top:"480px"},
				{left:"320px",top:"356px"},
				{left:"305px",top:"250px"},
				{left:"200px",top:"450px"}
			];
			// 将图片存进数组
			var wolf_1=[url+'h0.png',url+'h1.png',url+'h2.png',url+'h3.png',url+'h4.png',url+'h5.png',url+'h6.png',url+'h7.png',url+'h8.png',url+'h9.png'];
			var wolf_2=[url+'x0.png',url+'x1.png',url+'x2.png',url+'x3.png',url+'x4.png',url+'x5.png',url+'x6.png',url+'x7.png',url+'x8.png',url+'x9.png'];
			var appearWolf=[url+'h0.png',url+'x0.png'];
			var newImg=document.createElement('img');
			container.appendChild(newImg);
			var wfLocation=rand(0,8);	// 狼的随机位置
			newImg.style.left=arrPos[wfLocation].left;
			newImg.style.top=arrPos[wfLocation].top;
			newImg.style.position='relative';
			var X=rand(0,2);		// 选择灰太狼还是小灰灰
			if (X<2){
				X='h';
			}else{
				X='x';
			}
			var y=0;
				newImg.style.display='block';
				var appear0=setInterval(function(){
					newImg.src=url+''+X+y+'.png';
					y++;
					var indexs=0;
					newImg.onclick=function(){
						indexs++;
						if (indexs>1) {
							return false;		// 鼠标只能点击1次 而不能无限点
						}
						y=5;
						for (var i=0;i<4;i++) {
							y++;
							newImg.src=wolf_1[y];
							if(y>9){
								y--;
							}
						}
						if (X=='h') {
							s+=10;
							scores.innerHTML=s;
						}else if (X=='x'){
							s-=10;
							if (s<=0) {
								s=0;
							}
							scores.innerHTML=s;
						}
					}
					if (y>5) {
						clearInterval(appear0);
						setTimeout(function(){
							y=5;
							var appear1=setInterval(function(){
								newImg.src=url+''+X+y+'.png';
								console.log(y);
								y--;
								if (y<0) {
									clearInterval(appear1);
									// newImg.style.display='none';
									newImg.remove();
								}
							},50)
						},stay)
					}
				},50);
		},secs)
			s=0;
			scores.innerHTML=s;
		//=============================================================================游戏结束
		}
		// 重新开始函数
		function res(){
			restart.onclick=function(){
				// 按钮移除
				restart.style.display='none';
				over.style.display='none';
				var proLeft=0;
				var timer_pro=setInterval(function(){
					proLeft-=0.045;
					pros.style.backgroundPositionX=proLeft+'px';
					if (proLeft<=-270) {
						clearInterval(timer_pro);
						over.style.display='block';
						restart.style.display='block';
					}
				},5)
				star();
			}
		}
		rules.onclick=function(){
			rule.style.display='block';
		}
		close.onclick=function(){
			rule.style.display='none';
		}



		// 随机函数
		function rand(min,max){
			return Math.round(Math.random()*(max-min)+min);
		}
		var secs=rand(1200,1500);
		var stay=rand(150,250);


		
		</script>
	</head>
	<body>
		<div class="container">
			<h1 class="score">0</h1>
			<img src="/Test4/czxy/Public/Home/game/wolf/img/game_bg.jpg" style="width: 100%;" class="background"/>
			<div class="pro"></div>
			<button class="start">开始游戏</button>
			<h1 class="over">GAME OVER</h1>
			<button class="restart">重新开始</button>
			<button class="rules">游戏规则</button>
			<div class="rule">
				<p>游戏规则:</p>
				<p>1.游戏时间:60s</p>
				<p>2.拼手速,殴打灰太狼+10分</p>
				<p>3.殴打小灰灰-10分</p>
				<a href="#">[关闭]</a>
			</div>
		</div>
		<div style="text-align:center;">
		<a href="<?php echo U('index'); ?>">返回首页</a>
<p> 来源: 校园行</p>
</div>

	</body>
	<script src="/Test4/czxy/Public/Home/game/wolf/js/hmk01.js" type="text/javascript" charset="utf-8"></script>
</html>
<!--1.
		2.创建狼
			生成一个狼——是生成小灰灰还是灰太狼
			随机一个位置——判断该位置是否有狼
			无,则把狼放到该位置
		3.狼动画
			狼上升
			定时器更改图片路径实现动画
			判断是否到了最上面的位置
			是则下降
			下降到最底部把狼删掉——清空该清空的定时器
		4.打狼
			不管原先狼的动画跑到第几帧,
			把帧数设置成打狼的动画
			打灰太狼加分
			打小灰灰减分
		5.游戏结束
			把页面的数据还原到初始状态-->