<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <title>转诊申请流程</title>

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
                <li class="fs18 xuanzhong"><a href="15teachtrain.html">教学培训</a></li>
                <li class="fs18"><a href="17information.html">最新资讯</a></li>
                <li id="button3" class="fs18">远程中心</li>
                <li class="fs18"><a href="22aboutus.html">关于我们</a></li>
            </ul>
        </div>
    </div>
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> > 转诊申请流程
        </div>
        <div class="teachtrainxq container">
            <div class="xqtitle">转诊流程</div>

            <div class="xqcontent">
                <img src="process.png" >
                为解决呼吸专科医联体内部呼吸系统疑难危重症病人的远程会诊需求，发挥中日医院呼吸中心在呼吸疾病方面的诊治特色和学科优势，使患者获得科学、便捷、高效、高质量的医疗照护，国家卫生计生委远程医疗管理培训中心暨中日医院远程医学中心将与医联体协作单位联合提供远程会诊，并制定如下流程：
                一、申请会诊
                基层医师（邀请方）登录远程协同平台：（http://58.30.139.213:8087/TMS），下载并与患者签署《远程会诊知情同意书》，填写《远程会诊申请单》（含病历）。
                二、分诊预约
                远程医疗中心（受邀方）工作人员预审病历：
                1.若发现病史资料或检查不全时，退回申请者补充完善病历资料；
                2.预审通过后，病历分转给相应的专家，并预约视频会诊时间，通知邀请方医师准备。
                三、专家会诊
                专家按照预约时间与邀请方医师交互式视频会诊。
                备注：如病情需要时可以邀请患者或了解病情的家属参与部分会诊。
                四、撰写报告
                撰写《远程会诊报告》，提出诊断与治疗建议；
                病情疑难危重者，经过双方协商后，与患者家属沟通，提出转诊建议，写入《远程会诊报告》中。
                五、后质控
                工作人员完成后质控：检查资料的完善程度，确认专家签字页扫描上传后，发送回基层医师，并通过电话通知基层医师接收报告。
                六、随访
                根据会诊专家的意见决定是否随访。对于需要随访的病例，由申请医师通知和预约患者随访。
            </div>
            <div class="but">
                <button type="button">立即申请</button>
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
        height: 2090px;
        background-color: #f8f8f8;

    }
    .teachtrainxq{
        width: 1200px;
        height: 1800px;
        background-color: #ffffff;
        margin-top: 30px;
    }
    .teachtrainxq button{
        width: 200px;
        height: 40px;
        background-color: #971d25;
        border-radius: 4px;
        font-size: 16px;
        color: #ffffff;
        border:0;
        /* margin-left: 500px; */
        /* display: block;
        position: absolute;
        bottom: 121px; */
    }
    .xqtitle{
        font-size: 24px;
        font-weight: bold;
        color: #333333;
        margin-top: 38px;
        text-align: center;
    }
    .xqcontent{
        margin-top: 52px;
        width: 996px;
        height: 1500px;
        font-size: 16px;
        line-height: 30px;
        color: #333333;
        margin-left: 101px;
        text-align:justify
    }
    .xqcontent img{
        text-align: center;
        display: block;
        margin-left: 248px;
        margin-bottom: 40px;
    }
    .but{
        margin-top: 100px;
        text-align: center;
        margin-top: 60px;
    }

</style>
</html>