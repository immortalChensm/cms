
//悬浮窗效果

	//鼠标移动到医生端，敬请期待小框显示
        document.getElementById("doctor").onmouseover = function(){
            document.getElementById("item").style.display = "block";
        };
	//鼠标移开，敬请期待小框隐藏
       	document.getElementById("doctor").onmouseout = function(){
            document.getElementById("item").style.display = "none";
        };
		
		
//鼠标移动到病人端，敬请期待小框显示
		document.getElementById("patient").onmouseover = function(){
			document.getElementById("item2").style.display = "block";
		};
//鼠标移开，敬请期待小框隐藏
		document.getElementById("patient").onmouseout = function(){
			document.getElementById("item2").style.display = "none";
		};
		
		
		
//鼠标移动到微信端，敬请期待小框显示
		document.getElementById("wechat").onmouseover = function(){
			document.getElementById("item3").style.display = "block";
		};
//鼠标移开，敬请期待小框隐藏
		document.getElementById("wechat").onmouseout = function(){
			document.getElementById("item3").style.display = "none";
		};
		


	//点击远程中心，敬请期待弹框显示
		document.getElementById("button3").onclick = function(){
			document.getElementById("tanc01").style.display = "block";
		};
	//点击下载Android版，敬请期待弹框显示
		document.getElementById("button7").onclick = function(){
			document.getElementById("tanc01").style.display = "block";
		};
	//点击下载Iphone版，敬请期待弹框显示
		document.getElementById("button8").onclick = function(){
			document.getElementById("tanc01").style.display = "block";
		};
		
		
		
	//点击x，敬请期待弹框隐藏
		document.getElementById("close01").onclick = function(){
				document.getElementById("tanc01").style.display = "none";
		};
	//点击确认，敬请期待弹框隐藏
		document.getElementById("close02").onclick = function(){
				document.getElementById("tanc01").style.display = "none";
		};
		
		//轮播定时3秒
		$(function(){
                $('#myCarousel').carousel({interval:3000});
            })
			
	//首页教学培训，最新资讯点击切换
		document.getElementById("jxpx").onclick = function(){
			document.getElementById("jxpxcon").style.display = "block";
			document.getElementById("zxzxcon").style.display = "none";
 			document.getElementById("jxpx").style.cssText="color:#971d25";
			document.getElementById("jxpxk").style.cssText="opacity: 1";
			
 			document.getElementById("zxzx").style.cssText="color:#333333";
			document.getElementById("zxzxk").style.cssText="opacity: 0";
		};
		document.getElementById("zxzx").onclick = function(){
			document.getElementById("jxpxcon").style.display = "none";
			document.getElementById("zxzxcon").style.display = "block";
 			document.getElementById("jxpx").style.cssText="color:#333333";
			document.getElementById("jxpxk").style.cssText="opacity: 0";
			
 			document.getElementById("zxzx").style.cssText="color:#971d25;";
			document.getElementById("zxzxk").style.cssText="opacity: 1";
		};
		
