<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <title>进修申请</title>

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
                <li class="fs18 xuanzhong"><a href="13referralapplication.html">转诊申请</a></li>
                <li class="fs18"><a href="15teachtrain.html">教学培训</a></li>
                <li class="fs18"><a href="17information.html">最新资讯</a></li>
                <li id="button3" class="fs18">远程中心</li>
                <li class="fs18"><a href="22aboutus.html">关于我们</a></li>
            </ul>
        </div>
    </div>
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> > 进修申请
        </div>
        <div class="shenqing container">
            <div class="patientname">
                <span>姓名:<a href="">*</a></span>
                <input type="text" placeholder="请输入姓名"/>
            </div>
            <div class="patienttel">
                <span>手机号:<a href="">*</a></span>
                <input type="text" placeholder="请输入手机号"/>
            </div>

            <div class="uploadcase">
                <span class="uploadcasem">申请凭证:</span>
                <div class="upload">
                    <input type="file" />
                    <img src="../img/add.png" alt="">
                    <span class="addpicture">点击添加图片</span>
                    <span class="addjieshao">可上传图片、PDF、Excel、word</span>
                </div>
            </div>
            <div class="sc">
                <button>上传</button>
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
    .shenqing{
        height: 500px;
        background-color: #ffffff;
        margin-top: 30px;
    }
    .shenqing input::-webkit-input-placeholder{
        color: #999999;
    }
    .shenqing textarea::-webkit-input-placeholder{
        color: #999999;

    }
    .patientname{
        margin-left: 390px;
        margin-top: 50px;
    }
    .patientname span{
        font-size: 18px;
    }
    .patientname a{
        color: red;
    }
    .patientname input{
        font-size: 16px;
        width: 300px;
        height: 30px;
        border-radius: 4px;
        border: solid 1px #e0e0e0;
        margin-left: 5px;
        padding-left: 10px;
    }
    .patienttel{
        margin-left: 373px;
        margin-top: 30px;
    }
    .patienttel span{
        font-size: 18px;
    }
    .patienttel a{
        color: red;
    }
    .patienttel input{
        font-size: 16px;
        width: 300px;
        height: 30px;
        border-radius: 4px;
        border: solid 1px #e0e0e0;
        margin-left: 5px;
        padding-left: 10px;
    }

    .uploadcase{
        margin-left: 356px;
        margin-top: 30px;
        z-index: -1;
    }
    .uploadcasem{
        font-size: 18px;
        vertical-align: top;
    }
    .uploadcase a{
        color: red;
        vertical-align: top;
    }
    .uploadcase input{
        font-size: 16px;
        width: 200px;
        height: 140px;
        opacity: 0;
        cursor: pointer;
        z-index: 999;
    }
    .upload{
        width: 200px;
        height: 140px;
        background-color: #f8f8f8;
        border-radius: 4px;
        display: inline-block;
        margin-left: 12px;
        position: relative;
        cursor: pointer;
        z-index: 0;
    }
    .upload img{
        left: 85px;
        position: absolute;
        top: 22px;
        z-index: 1;
    }
    .addpicture{
        font-size: 14px;
        color: #666666;
        position: absolute;
        width: 84px;
        left: 58px;
        top: 65px;
        z-index: 1;
        white-space : nowrap
    }
    .addjieshao{
        position: absolute;
        font-size: 12px;
        color: #999999;
        top: 88px;
        left: 12px;
        z-index: 1;
        white-space : nowrap
    }
    .sc{
        margin-left: 500px;
        margin-top: 50px;
    }
    .sc button{
        width: 200px;
        height: 40px;
        background-color: #971d25;
        border-radius: 4px;
        font-size: 16px;
        color: #ffffff;
        border: 0;
    }
</style>
</html>