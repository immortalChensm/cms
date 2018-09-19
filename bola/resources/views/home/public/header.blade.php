<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
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

                    <div class="head-icon">

                        @if(isset(request()->session()->get("userinfo")['image']))
                            <img src="{{request()->getSchemeAndHttpHost().request()->session()->get("userinfo")['image']}}" width="60px" height="36" alt="">
                        @else
                            <img src="{{ URL::asset('home/img/photo.png')}}" alt="">
                        @endif

                    <span><a href="/user/center.html">{{request()->session()->get("userinfo")['username']}}</a></span>
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


                <div class="head-icon">
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