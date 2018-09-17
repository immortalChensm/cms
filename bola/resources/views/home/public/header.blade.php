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
                <div class="head-icon">
                    <img src="{{ URL::asset('home/img/xiaotx.png')}}" >
                    <span><a href="19personalcenter.html">刘勇</a></span>
                </div>
                <div class="head-icon">
                    <img src="{{ URL::asset('home/img/icon03.png')}}" >
                    <span><a href="">后台</a></span>
                </div>
            </div>
        </div>
        <div class="head-ud container">
            <ul>
                <li class="fs18">首页</li>
                <li class="fs18 xuanzhong" id="dhyy">
                    医联体医院
                    <div class="xiala" id="xiala">
                        <div class="xiala1" onclick="window.location.href='/hospitals.html'">医联体医院</div>
                        <div class="xiala1" onclick="window.location.href='/joinprocess.html'">加入医联体流程</div>
                        <div class="xiala1" onclick="window.location.href='/joinylt.html'">加入医联体</div>
                        <div class="xiala1" onclick="window.location.href='/joinpccmorocess.html'">加入PCCM流程</div>
                        <div class="xiala1" onclick="window.location.href='/joinpccm.html'">加入PCCM</div>
                    </div>
                </li>
                <li class="fs18" onclick="window.location.href='/doctors.html'">医联体医生</li>
                <li class="fs18" id="dhzz">
                    转诊申请
                    <div class="xiala2" id="xiala2">
                        <div class="xiala3" onclick="window.location.href='/application.html'">转诊申请</div>
                        <div class="xiala3">申请流程</div>
                    </div>
                </li>
                <li class="fs18" onclick="window.location.href='/teachtrain.html'">教学培训</li>
                <li class="fs18" onclick="window.location.href='/information.html'">科研项目</li>
                <li id="button3" class="fs18">远程中心</li>
                <li class="fs18" onclick="window.location.href='/aboutus.html'">关于我们</li>
            </ul>
        </div>
    </div>