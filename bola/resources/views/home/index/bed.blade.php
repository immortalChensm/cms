<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <title>床位管理</title>

</head>
<body>
<div class="">
    <div class="head">
        <div class="head-up container">
            <div class="head-up-l ">
                <img src="../img/logo01.jpg" >
                <span class="fs24">医联体基金会</span>
            </div>
            <div class="head-up-r">
                <div class="head-icon">
                    <img src="../img/xiaotx.png" >
                    <span><a href="19personalcenter.html">刘勇</a></span>
                </div>
                <div class="head-icon">
                    <img src="../img/icon03.png" >
                    <span><a href="">后台</a></span>
                </div>
            </div>
        </div>
        <div class="head-ud container">
            <ul>
                <li class="fs18"><a href="01home.html">首页</a></li>
                <li class="fs18"><a href="09hospitallist.html">医联体医院</a></li>
                <li class="fs18"><a href="11doctorlist.html">医联体医生</a></li>
                <li class="fs18"><a href="13referralapplication.html">转诊申请</a></li>
                <li class="fs18"><a href="15teachtrain.html">教学培训</a></li>
                <li class="fs18"><a href="17information.html">最新资讯</a></li>
                <li id="button3" class="fs18">远程中心</li>
                <li class="fs18"><a href="22aboutus.html">关于我们</a></li>
            </ul>
        </div>
    </div>
    <div class="context">
        <div class="navigation container">
            <ul>
                <li class="zhszl"><a href="19personalcenter.html">账户设置</a></li>
                <li class="xgmm"><a href="20alterpsw.html">修改密码</a></li>
                <li class="zzjl"><a href="21referralrecord.html">转诊记录</a></li>
                <li class="cwgl"><a href="21referralrecord.html">床位管理</a></li>
            </ul>
        </div>
        <div class="zhsz container">

            <div class="oldpsw">
                <span>总床位:<a href="">*</a></span>
                <input type="text" placeholder="请输入总床位数">
            </div>
            <div class="newpsw">
                <span>普通床位:<a href="">*</a></span>
                <input type="text" placeholder="请输入普通床位数">
            </div>
            <div class="confirmpsw">
                <span>ICU床位:<a href="">*</a></span>
                <input type="text" placeholder="请输入ICU床位数">
            </div>
            <div class="button1">
                <button>保存</button>
            </div>
        </div>
    </div>

    <div class="foot-t">
        <div class="foot-t1">
            <img src="../img/logo03.jpg"/>
            <span>呼吸专科医联体</span>
        </div>
        <div class="foot-t2">
            <img src="../img/adress.png"/>
            <span>江苏省苏州市工业园区松涛街</span>
        </div>
        <div class="foot-t3">
            <img src="../img/tel.png"/>
            <span>0512-56898145</span>
        </div>
    </div>
    <div class="foot-u fs14">
        <p>Copyright 2017  All Rights Reserved.</p>
        <p>京ICP 备 05067313号-1 文保网安备案号：1101010023 京卫网审字【2014】第39号</p>
    </div>

</div>

<script src="{{ URL::asset('home/js/jquery.min.js')}}"  charset="utf-8"></script>
<script src="{{ URL::asset('home/bootstrap@3.3.7/js/bootstrap.min.js')}}" charset="utf-8"></script>

</body>

<style type="text/css">

    .context{
        width: 100%;
        height: 770px;
        background-color: #f8f8f8;
    }
    .navigation{
        width: 1200px;
        height: 41px;
        border-bottom: 1px solid #971d25;
        margin-top: 50px;
    }
    .navigation ul{
        list-style:none;
        margin: 0px;
        padding: 0px;
        margin-left: -1px;
    }
    .navigation ul li{
        float:left;
        width: 160px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        font-size: 16px;
        font-weight: bold;
        margin-left: 1px;
    }
    .navigation ul li a:hover{
        background-color: #971d25;
        color: #ffffff;
        text-decoration: none;
    }
    .xgmm a{
        display: block;
        color: #971d25;
        background-color: #eee2e2;
    }
    .zhszl a{
        display: block;
        color: #971d25;
        background-color: #eee2e2;
    }
    .zzjl a{
        display: block;
        color: #971d25;
        background-color: #eee2e2;
    }
    .zhsz{
        width: 1200px;
        height: 400px;
        background-color: #ffffff;
        margin-top: 30px;
        font-size: 18px;
    }

    .zhsz input{
        width: 300px;
        height: 30px;
        border-radius: 4px;
        border: solid 1px #e0e0e0;
        background-color:#ffffff;
        margin-left: 2px;
        padding-left: 12px;
        font-size: 16px;
        margin-top: 20px;
    }
    .zhsz a{
        color: red;
    }
    .oldpsw{
        margin-left: 422px;
    }

    .newpsw{
        margin-left: 404px;
    }

    .confirmpsw{
        margin-left: 410px;
    }

    .button1{
        text-align: center;
        margin-top: 50px;
    }
    .button1 button{
        width: 200px;
        height: 40px;
        background-color: #971d25;
        border-radius: 4px;
        font-size: 16px;
        color: #ffffff;
        border: 0;
    }
    .cwgl a{
        display: block;
        background-color: #971d25;
        color: #ffffff;
    }

</style>
</html>