<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/personalcenter.css')}} "/>
    <title>个人中心</title>

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
                <li class="zzjl"><a href="21referralrecord.html">床位管理</a></li>
            </ul>
        </div>
        <div class="zhsz container">
            <div class="photo">
                <img src="../img/photo.png" alt="">
            </div>
            <div class="button1">
                <button>上传</button>
            </div>
            <div class="username">
                <span>姓名:<a href="">*</a></span>
                <input type="text" disabled="disabled">
            </div>
            <div class="tele">
                <span>手机号:</span>
                <input type="text" disabled="disabled">
            </div>
            <div class="hosptal">
                <span>所属医院:</span>
                <input type="text" disabled="disabled">
            </div>
            <div class="code">
                <span>医院代码:</span>
                <input type="text" disabled="disabled">
            </div>
            <div class="bednumber">
                <span>床位数:</span>
                <input type="text" placeholder="请输入医院床位数">
            </div>
            <div class="department">
                <span>所属科室:<a href="">*</a></span>
                <select name="" id="" >
                    <option value="">请选择科室</option>
                    <option value="">呼吸与危重症医学科</option>
                </select>
            </div>
            <div class="expertise">
                <span>专长特长:<a href="">*</a></span>
                <select name="" id="" >
                    <option value="">请选择协作组</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="zhicheng">
                <span>职称:<a href="">*</a></span>
                <select name="" id="" >
                    <option value="">请选择职称</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="profile">
                <span>个人简介:<a href="">*</a></span>
                <textarea placeholder="请输入个人简介"></textarea>
            </div>
            <div class="uploadcase">
                <span class="uploadcasem">上传资历凭证:</span>
                <div class="upload">
                    <input type="file" />
                    <img src="../img/add.png" alt="">
                    <span class="addpicture">点击添加图片</span>
                    <span class="addjieshao">只支持上传图片</span>
                    <div class="ksc">
                        *可上传职业证、医师证、职称证
                    </div>
                </div>

            </div>
            <div class="button2">
                <button>确认</button>
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
    .uploadcase{
        margin-left: 320px;
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
        margin-left: 8px;
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
        left: 58px;
        z-index: 1;
        white-space : nowrap
    }
    .ksc{
        font-size: 12px;
        line-height: 18px;
        color: #f50000;
        margin-top: -10px;
        margin-left: 15px;
    }
</style>
</html>