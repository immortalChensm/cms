<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/referralrecord.css')}}"/>
    <title>转诊记录</title>

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
                <li id="button3" class="fs18 yczx">远程中心</li>
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
                <li class="xgmm"><a href="bed.html">床位管理</a></li>
            </ul>
        </div>
        <div class="zhsz container">
            <div class="searchk">
                <input type="text" placeholder="病人姓名"/>
                <button type="button"></button>
            </div>
            <div class="tab">
                <table cellspacing="" cellpadding="">
                    <tr>
                        <th width="8%"><div>病人姓名</div></th>
                        <th width="11%"><div>病人电话</div></th>
                        <th width="22%"><div>病情描述</div></th>
                        <th width="22%"><div>转诊要求</div></th>
                        <th width="9%"><div>状态</div></th>
                        <th width="7%"><div>附件</div></th>
                        <th width="12%"><div>转诊医院</div></th>
                        <th width="9%">操作</th>
                    </tr>
                    <tr>
                        <td>王琦</td>
                        <td>18923684568</td>
                        <td>多无发热、咳痰等典型症状，也有少数有症状或无症状。首发症状为呼吸急促及呼吸困难，或有意识障碍、嗜睡、脱水、食欲减退等。</td>
                        <td>应根据病菌种类及药敏结果选择用药。如有缺氧等症状给予吸氧和对症处理。防治并发症。加强老年患者的护理工作，饮食宜清淡，易消化。</td>
                        <td>未处理</td>
                        <td><img src="../img/download.png" ></td>
                        <td>暂无</td>
                        <td><button id="button4" type="button">取消</button></td>
                    </tr>
                    <tr>
                        <td>张莉</td>
                        <td>18923684568</td>
                        <td>多无发热、咳痰等典型症状，也有少数有症状或无症状。首发症状为呼吸急促及呼吸困难，或有意识障碍、嗜睡、脱水、食欲减退等。</td>
                        <td>应根据病菌种类及药敏结果选择用药。如有缺氧等症状给予吸氧和对症处理。防治并发症。加强老年患者的护理工作，饮食宜清淡，易消化。</td>
                        <td>已取消</td>
                        <td><img src="../img/download.png" ></td>
                        <td>暂无</td>
                        <td><button id="button5" type="button">取消</button></td>
                    </tr>
                    <tr>
                        <td>张莉</td>
                        <td>18923684568</td>
                        <td>多无发热、咳痰等典型症状，也有少数有症状或无症状。首发症状为呼吸急促及呼吸困难，或有意识障碍、嗜睡、脱水、食欲减退等。</td>
                        <td>应根据病菌种类及药敏结果选择用药。如有缺氧等症状给予吸氧和对症处理。防治并发症。加强老年患者的护理工作，饮食宜清淡，易消化。</td>
                        <td>已处理</td>
                        <td><img src="../img/download.png" ></td>
                        <td>上海同济医院</td>
                        <td><button id="button6" type="button">取消</button></td>
                    </tr>


                </table>
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


<div id="tanc04" class="tanchuang1">
    <div class="tanc">
    </div>
    <div class="tc">
        <div class="qidai">
            <img src="../img/tisi.png" >
            <span>确认取消转诊申请？</span>
            <div class="butt">
                <button id="button1" class="button1">确认</button>
                <button id="button2" class="button2">取消</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('home/js/jquery.min.js')}}"  charset="utf-8"></script>
<script src="{{ URL::asset('home/bootstrap@3.3.7/js/bootstrap.min.js')}}" charset="utf-8"></script>
<script src="{{ URL::asset('home/js/app.js')}}" type="text/javascript" charset="utf-8"></script>

</body>
</html>