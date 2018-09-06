<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <link rel="stylesheet" href="{{ URL::asset('home/css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/css/common.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/css/homePage.css') }}">
    <script src="{{ URL::asset('home/js/jquery-3.2.1.min.js') }}></script>
    <script src="{{ URL::asset('home/js/js.js') }}></script>
</head>
<body>
<!-- 头部 -->
<div class="header">
    <div class="header_main w">
        <div class="top_foundation fl clearfix">
            <img class="logo" src="{{ URL::asset('home/images/1-首页_03.jpg') }} alt="" >
            <span class="foundation">医联体基金会</span>
        </div>
        <ul class="fr">
            <li><i class="register"></i>注册</li>
            <li><i class="login"></i>登录</li>
            <li><i class="background"></i>后台</li>
        </ul>
    </div>
</div>

<!-- 导航栏 -->
<div class="nav">
    <div class="nav_main w">
        <div class="detaile_nav fl clearfix">
            <ul>
                <li><a href="javascript:;" class="home">首页</a></li>
                <li><a href="javascript:;" class="hospital">医联体医院</a></li>
                <li><a href="javascript:;" class="doctor">医联体医生</a></li>
                <li><a href="javascript:;">转诊申请</a></li>
                <li><a href="javascript:;">教学培训</a></li>
                <li><a href="javascript:;">最新资讯</a></li>
                <li><a href="javascript:;">远程中心</a></li>
                <li><a href="javascript:;">关于我们</a></li>
            </ul>
        </div>
        <div class="fr search_totall">
            <form class="search">
                <div class="search_main">
                    <span class="searchSelected fl">医院<i class="arrow_down"></i></span>
                    <input type="text" class='search_content fl' placeholder='医院/医生' name="search">
                    <!--下拉显示-->
                    <div class="searchTab">
                        <ul class="search_li">
                            <li class=""><a href="javascript:;">医院</a></li>
                            <li><a href="javascript:;">医生</a></li>
                        </ul>
                    </div>
                    <div class="fr"><i class="search_btn"></i></div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 轮播图 -->
<div class="banner_totall">
    <div class="union_totall w">
        <div class="union_banner w">
            <!--轮播图-->
            <div class="wrapper fl clearfix">
                <ul>
                    <li><img src="{{ URL::asset('home/images/Banner.png')}}" alt=""/></li>
                    <li><img src="{{ URL::asset('home/images/Banner2.png')}}" alt=""/></li>
                    <li><img src="{{ URL::asset('home/images/Banner3.png')}}" alt=""/></li>
                    <li><img src="{{ URL::asset('home/images/Banner4.png')}}" alt=""/></li>
                    <li><img src="{{ URL::asset('home/images/Banner5.png')}}" alt=""/></li>
                </ul>
                <ol>
                    <li class="current"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ol>
            </div>
            <div class="union_info fr">
                <div class="scanning fr">
                    <div class="qr_code fl">
                        <img src="../images/二维码.png" alt="">
                        <span>敬请期待</span>
                        <p>扫描下载移动版</p>
                    </div>
                    <ul class="download fr">
                        <li class="and"><i></i>下载Android版</li>
                        <li class="iph"><i></i>下载Iphone版</li>
                    </ul>
                </div>
                <!--选项卡-->
                <div class="information fr">
                    <div class="wrapper_tab">
                        <ul class="tab">
                            <li class="tab-item active fl">教学培训</li>
                            <li class="tab-item fl">最新资讯</li>
                        </ul>
                        <div class="products">
                            <ul class="main selected">
                                <li>
                                    <div class="training"><img src="../images/教学培训.png" alt=""></div>
                                    <p><a href="javascript:;">北京协和医院开展2018年第二届技能大赛..</a></p>
                                </li>
                                <li>
                                    <div class="training"><img src="../images/教学培训.png" alt=""></div>
                                    <p><a href="javascript:;">北京协和医院开展2018年第二届技能大赛..</a></p>
                                </li>
                                <a href="javascript:;" class="view_more">查看更过</a>
                            </ul>
                            <ul class="main">
                                <li>
                                    <div class="training"><img src="../images/教学培训.png" alt=""></div>
                                    <p><a href="javascript:;">北京协和医院开展2018年第二届技能大赛..</a></p>
                                </li>
                                <li>
                                    <!--  <div class="training"><img src="../images/教学培训.png" alt=""></div> -->
                                    <p><a href="javascript:;">北京协和医院开展2018年第二届技能大赛..</a></p>
                                </li>
                                <a href="javascript:;" class="view_more">查看更过</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 医联体是什么 -->
<div class="couplet_totall">
    <div class="couplet_main w">
        <div class="couplet">
            <div class="couplet_pic fl clearfix">
                <img src="../images/医联体是什么配图.png" alt="">
            </div>
            <div class="couplet_describe fr">
                <p class="what">医联体是什么？</p>
                <p class="describe">区域医联体(曾称“医院集团”)是很多单位已经做出的整合医疗资源的探索，有助于发挥医联体内优质医疗资源的作用，推动区域内常见、多发疾病的分级诊疗，提升基层单位的医疗能力与水平。但是，由于区域医联体内自身专科水平的限制，难于解决某专科疑难危重疾病的诊治问题。因此，区域医联体基本上属于“普及型”医联体，其覆盖范围亦仅限于局部地区。针对现阶段我国医疗资源总量不足，同时存在严重的碎片化、不均衡和非同质的状况，探索发挥优质专科资源的作用，在全国范围内提高对某专科疾病的诊治水平,不均衡和非同质的状况，探索发挥优质专科资源的作用，在全国范围内提高对某专科疾病的诊治水平不均,衡和非同质的状况，探索发挥优质专科资源的.... </p>
                <div class="more fr">
                    <a href="javascript:;">查看更多</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 联盟医院 -->
<div class="hospital_totall">
    <div class="union_hospital w">
        <div class="hospital">联盟医院<i class="arrow"></i></div>
        <ul class="hospital_totall">
            <li class="hospital_describe">
                <img src="../images/联盟医院.png" alt="">
                <div class="describe">
                    <a href="javascript:;"><i class="arrow_gray"></i>北京协和医院</a>
                    <span>北京协和医院是一所位于北京市东城区，集医疗、科研、教学为一体的大型综合医院....</span>
                </div>
            </li>
            <li class="hospital_describe">
                <img src="../images/联盟医院.png" alt="">
                <div class="describe">
                    <a href="javascript:;"><i class="arrow_gray"></i>北京协和医院</a>
                    <span>北京协和医院是一所位于北京市东城区，集医疗、科研、教学为一体的大型综合医院....</span>
                </div>
            </li>
            <li class="hospital_describe">
                <img src="../images/联盟医院.png" alt="">
                <div class="describe">
                    <a href="javascript:;"><i class="arrow_gray"></i>北京协和医院</a>
                    <span>北京协和医院是一所位于北京市东城区，集医疗、科研、教学为一体的大型综合医院....</span>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- 联盟医生 -->
<div class="doctors_totall">
    <div class="union_doctors w">
        <div class="doctors">联盟医生<i class="arrow"></i></div>
        <ul class="doctors_totall">
            <li class="doctors_describe">
                <img src="../images/头像1.png" alt="">
                <div class="describe">
                    <p class="name">王鑫</p>
                    <p class="mentor">博士生导师。1984年始于北京协</p>
                    <p class="work">和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                </div>
            </li>
            <li class="doctors_describe">
                <img src="../images/头像2.png" alt="">
                <div class="describe">
                    <p class="name">王鑫</p>
                    <p class="mentor">博士生导师。1984年始于北京协</p>
                    <p class="work">和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                </div>
            </li>
            <li class="doctors_describe">
                <img src="../images/头像3.png" alt="">
                <div class="describe">
                    <p class="name">王鑫</p>
                    <p class="mentor">博士生导师。1984年始于北京协</p>
                    <p class="work">和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                </div>
            </li>
            <li class="doctors_describe">
                <img src="../images/头像4.png" alt="">
                <div class="describe">
                    <p class="name">王鑫</p>
                    <p class="mentor">博士生导师。1984年始于北京协</p>
                    <p class="work">和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                </div>
            </li>
        </ul>
    </div>
</div>

<!--尾部-->
<!-- 底部一 -->
<div class="footer1">
    <div class="footer1_main w">
        <ul>
            <li><i class="logo"></i>呼吸专科医联体</li>
            <li><i class="address"></i>江苏省苏州市工业园区松涛街</li>
            <li><i class="phone"></i>0512-56898145</li>
        </ul>
    </div>
</div>

<!--底部二 -->
<div class="footer2">
    <div class="footer2_main w">
        <div class="footer_two">
            <p class="copy">Copyright 2017  All Rights Reserved.</p>
            <p class="record">京ICP 备 05067313号-1 文保网安备案号：1101010023 京卫网审字【2014】第39号</p>
        </div>
    </div>

</div>

<!-- 侧边栏 -->
<div class="subnav" >
    <ul class="subnav_descript">
        <li>
            <i class="doctor"></i>
            <div class="prompt">
                <img src="../images/医生端二维码.png" alt="">
                <p class="scanning">敬请期待</p>
                <p>扫描下载</p>
                <p>医生端APP</p>
                <i class="arrow_red"></i>
            </div>
        </li>
        <li>
            <i class="people"></i>
            <div class="prompt">
                <img src="../images/医生端二维码.png" alt="">
                <p class="scanning">敬请期待</p>
                <p>扫描下载</p>
                <p>医生端APP</p>
                <i class="arrow_red"></i>
            </div>
        </li>
        <li>
            <i class="micro"></i>
            <div class="prompt">
                <img src="../images/医生端二维码.png" alt="">
                <p class="scanning">敬请期待</p>
                <p>扫描下载</p>
                <p>医生端APP</p>
                <i class="arrow_red"></i>
            </div>
        </li>
    </ul>
</div>
</body>
</html>