<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/home.css')}}"/>
    <style type="text/css">
    	.pho{
    		border-radius: 50%;
    	}
    	.tuichu{
    		display: inline-block;
    		position: relative;
    		/*width: 70px;
		    height: 25px;*/
		   	width: 118px;
		    height: 110px;
		    
		    margin-left: 20%;
		    margin-top: -35px;
		   z-index: 1;
		   display: none;
    	}
    	.tuichul{
    		
    		background-color: #e5e5e5;
    		z-index: 1;
    	    /*width: 70px;
		    height: 25px;
		    margin-left: 20%;
		    margin-top: -11px;*/
		    color: #666666;
		    line-height: 25px;
		    text-align: center;
		    border-radius: 3px;
		    display: inline-block;
		    width: 118px;
		    height: 92px;
		    position: absolute;
		    top: 25px;
		    left: 6px;
    	}
    	.head-icon1:hover .tuichu{
    		display: inline-block;
    		
    	}
    	.sanjiao{
	        border-bottom: 12px solid #e5e5e5;
	        border-left: 10px solid transparent;
	        border-right: 10px solid transparent;
	        position: absolute;
	        left: 58px;
    		top: 13px;
    	}
    	.tuichul p{
    		margin-top: 12px;
    		font-size: 14px;
    	}
    	.tuichul p:hover{
    		color: #971d25;
    	}
    </style>
    @yield("css")
    <title>@yield("title")</title>

</head>
<body>
<div class="">
    <div class="head">
        <div class="head-up container">
            <div class="head-up-l ">
                <img src="{{ URL::asset('home/img/logo01.jpg')}}" >
                <span class="fs24">医联体基金会</span>
            </div>
            <div class="head-up-r">


                @if(request()->session()->has("userinfo"))

                    <div class="head-icon1">

                        @if(isset(request()->session()->get("userinfo")['image']))
                            <img class="pho" src="{{request()->getSchemeAndHttpHost().request()->session()->get("userinfo")['image']}}" width="36px" height="36px">
                        @else
                            <img src="{{ URL::asset('home/img/photo.png')}}" alt="">
                        @endif

                    	<span><a href="/user/center.html">{{request()->session()->get("userinfo")['username']}}</a></span>
	                    <div class="tuichu">
	                    	<div class="sanjiao"></div>
	                    	<div class="tuichul">
	                    		<p onclick="window.location.href='/user/center.html'">个人中心</p>
	                    		<p onclick="window.location.href='/logout.html'">退出账号</p>
	                    	</div>
	                    	<!--<span class="tuichul">退出</span> -->
	                    </div>
                    </div>
                @else
                    <div class="head-icon">
                        <img src="{{ URL::asset('home/img/icon01.png')}}" >
                        <span><a href="/register.html">注册</a></span>
                    </div>
                    <div class="head-icon">
                        <img src="{{ URL::asset('home/img/icon02.png')}}" >
                        <span><a href="/login.html">登录</a></span>
                    </div>
                @endif


                <div class="head-icon2">
                    <img src="{{ URL::asset('home/img/icon03.png')}}" >
                    <span><a href="{{request()->getSchemeAndHttpHost()}}/admin" target="_blank">后台</a></span>
                </div>


            </div>
        </div>
        <div class="head-ud container">
            <ul>


                <li class="fs18 @if(request()->getPathInfo()=='/') xuanzhong  @endif" onclick="window.location.href='/'">首页</li>


                <li  class="fs18  @if(request()->getPathInfo()=='/hospitals.html' || request()->getPathInfo()=='/joinprocess.html' || request()->getPathInfo() == '/joinylt.html' || request()->getPathInfo() == '/joinpccmorocess.html' ||request()->getPathInfo() == '/joinpccm.html') xuanzhong  @endif" id="dhyy">
                    <span onclick="window.location.href='/hospitals.html'">医联体医院</span>
                    <div class="xiala" id="xiala">
                        <div class="xiala1 " onclick="window.location.href='/hospitals.html'">医联体医院</div>
                        <div class="xiala1" onclick="window.location.href='/joinprocess.html'">加入医联体流程</div>
                        <div class="xiala1" onclick="window.location.href='/joinylt.html'">加入医联体</div>
                        <div class="xiala1" onclick="window.location.href='/joinpccmorocess.html'">加入PCCM流程</div>
                        <div class="xiala1" onclick="window.location.href='/joinpccm.html'">加入PCCM</div>
                    </div>
                </li>



               <li class="fs18 @if(request()->getPathInfo() == '/doctors.html') xuanzhong @endif" onclick="window.location.href='/doctors.html'">医联体医生</li>


               <li class="fs18 @if(request()->getPathInfo() == '/referralaplprocess.html' || request()->getPathInfo() == '/application.html') xuanzhong @endif" id="dhzz">
                   <span onclick="window.location.href='/application.html'">转诊申请</span>
                   <div class="xiala2" id="xiala2">
                       <div class="xiala3" onclick="window.location.href='/application.html'">转诊申请</div>
                       <div class="xiala3" onclick="window.location.href='/referralaplprocess.html'">申请流程</div>
                   </div>
               </li>

               <li class="fs18 @if(request()->getPathInfo() == '/teachtrain.html') xuanzhong @endif" onclick="window.location.href='/teachtrain.html'">教学培训</li>




               <li class="fs18  @if(request()->getPathInfo() == '/information.html') xuanzhong  @endif" onclick="window.location.href='/information.html'">科研项目</li>



               <li id="button3" class="fs18">远程中心</li>
               <li class="fs18 @if(request()->getPathInfo() == '/aboutus.html') xuanzhong @endif" onclick="window.location.href='/aboutus.html'">关于我们</li>

           </ul>

           @yield("search")
       </div>
   </div>

    <div id="tanc01" class="tanchuang1">
        <div class="tanc">

        </div>
        <div class="tc">
            <img id="close01" class="closee" src="{{ URL::asset('home/img/close.png')}}"/>
            <div class="qidai">
                <img src="{{ URL::asset('home/img/loudou.png')}}"/>
                <span>即将上线，敬请期待...</span>
                <div class="butt">
                    <button  id="close02">确定</button>
                </div>

            </div>

        </div>
    </div>
    <script>
        //点击下载Android版，敬请期待弹框显示
        document.getElementById("button3").onclick = function(){
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
    </script>