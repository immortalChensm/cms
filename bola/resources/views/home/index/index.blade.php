<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/home.css')}} "/>
    <title>首页</title>
</head>
<body>
<div class="">
    <div class="head">
        <div class="head-up container">
            <div class="head-up-l ">
                <img src="{{ URL::asset('homeimg/logo01.jpg')}}" >
                <span class="fs24">医联体基金会</span>
            </div>
            <div class="head-up-r">
                <div class="head-icon">
                    <img src="{{ URL::asset('homeimg/icon01.png')}}" >
                    <span><a href="02register.html">注册</a></span>
                </div>
                <div class="head-icon">
                    <img src="{{ URL::asset('homeimg/icon02.png')}}" >
                    <span><a href="03login.html">登录</a></span>
                </div>
                <div class="head-icon">
                    <img src="{{ URL::asset('homeimg/icon03.png')}}" >
                    <span><a href="">后台</a></span>
                </div>
            </div>
        </div>
        <div class="head-ud container">
            <ul>
                <li class="fs18 xuanzhong"><a>首页</a></li>
                <li class="fs18"><a >医联体医院</a></li>
                <li class="fs18"><a >医联体医生</a></li>
                <li class="fs18"><a >转诊申请</a></li>
                <li class="fs18"><a >教学培训</a></li>
                <li class="fs18"><a >科研项目</a></li>
                <li id="button3" class="fs18">远程中心</li>
                <li class="fs18"><a >关于我们</a></li>
            </ul>

            <div class="search">
                <select class="select">
                    <option class="option" value="医院">医院</option>
                    <option class="option" value="医生">医生</option>
                </select>
                <input class="input" type="text" placeholder="医院/医生">
                <button class="button"></button>
            </div>
        </div>
    </div>
    <div class="context">
        <div class="banner container">
            <div class="banner-l">
                <div id="myCarousel" class="carousel slide ">
                    <!-- 轮播（Carousel）指标 -->
                    <ol class="carousel-indicators" >
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>
                    <!-- 轮播（Carousel）项目 -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ URL::asset('home/img/400198504.png')}}" alt="First slide">

                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('home/img/Banner2.png')}}" alt="Second slide">

                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('home/img/Banner3.png')}}" alt="Third slide">

                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('home/img/400198504.png')}}" alt="Four slide">

                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('home/img/Banner2.png')}}" alt="Five slide">

                        </div>
                    </div>

                </div>
            </div>
            <div class="banner-r">
                <div class="banner-r-up">
                    <img src="{{ URL::asset('home/img/erweima.png')}}" >
                    <span>扫描下载移动版</span>
                    <div class="banner-r-up-input">
                        <input id="button7" class="btn andriod" value="下载Android版" />
                        <input id="button8" class="btn ios" value="下载Iphone版" />
                    </div>

                </div>
                <div class="banner-r-ud">
                    <div class="banner-r-ud-label">
                        <label id="jxpx" class="jxpx">教学培训<div id="jxpxk" class="jxpxk"></div></label>
                        <label id="zxzx" class="zxzx">最新资讯<div id="zxzxk" class="jxpxk"></div></label>
                    </div>
                    <div class="" id="jxpxcon">
                        <div class="banner-r-ud-u">
                            <img src="../img/VCG4188023609.png" >
                            <span>北京协和医院开展2018年第二届技能大赛大赛大赛大赛</span>
                        </div>
                        <div class="banner-r-ud-u">
                            <img src="../img/VCG4188023609.png" >
                            <span>北京协和医院开展2018年第二届技能大赛fffffffffff</span>
                        </div>
                        <a href="15teachtrain.html" class="ckgd">查看更多</a>
                    </div>
                    <div class="" id="zxzxcon">
                        <div class="banner-r-ud-u">
                            <img src="../img/VCG4188023609.png" >
                            <span>市疾控中心：未采购相关批次问题疫苗fffffffffffff</span>
                        </div>
                        <div class="banner-r-ud-u">
                            <img src="../img/erweima.png" >
                            <span>北京协和医院举办第四批“组团式”援藏医疗队欢送会</span>
                        </div>
                        <a href="17information.html" class="ckgd">查看更多</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="context-first container">
            <div class="context-first-l">
                <img src="{{ URL::asset('home/img/VCG41588683715.png')}}"/>
            </div>
            <div class="context-first-r">
                <div class="context-first-rt">
                    医联体是什么？
                </div>
                <span >
							区域医联体(曾称“医院集团”)是很多单位已经做出的整合医疗资源的探索，有助于发挥医联体内优质医疗资源的作用，推动区域内常见、多发疾病的分级诊疗，提升基层单位的医疗能力与水平。但是，由于区域医联体内自身专科水平的限制，难于解决某专科疑难危重疾病的诊治问题。因此，区域医联体基本上属于“普及型”医联体，其覆盖范围亦仅限于局部地区。<br />
							针对现阶段我国医疗资源总量不足，同时存在严重的碎片化、不均衡和非同质的状况，探索发挥优质专科资源的作用，在全国范围内提高对某专科疾病的诊治水平,不均衡和非同质的状况，探索发挥优质专科资源的作用，在全国范围内提高对某专科疾病的诊治水平不均,衡和非同质的状况，探索发挥优质专科资源的....
						</span>
                <a href="22aboutus.html">查看更多</a>
            </div>
        </div>

        <div class="context-second container">
            <a class="lmys" href="09hospitallist.html">联盟医院 <img src="{{ URL::asset('home/img/gengduo.png')}}" /></a>
            <div class="context-second-ft">
                <img class="imgr1" src="../img/VCG21c5d61410c.png"/>
                <img class="imgr2" src="../img/VCG21c5d61410c.png"/>
                <img class="imgr3" src="../img/VCG21c5d61410c.png"/>
            </div>
            <div class="context-second-st">
                <div class="fc">
                    <div class="fct">
                        <!--<img class="tubiao" src="img/jux01.png"/>-->
                        <span class="tubiao"></span>
                        <span class="biaoti">北京协和医院</span>
                    </div>
                    <div class="neir">
                        北京协和医院是一所位于北京市东城区，集医疗、科研、教学为一体的大型综合医院....
                    </div>
                </div>
                <div class="fc2">
                    <div class="fct">
                        <span class="tubiao"></span>
                        <span class="biaoti">北京协和医院</span>
                    </div>
                    <div class="neir">
                        北京协和医院是一所位于北京市东城区，集医疗、科研、教学为一体的大型综合医院....
                    </div>
                </div>
                <div class="fc3">
                    <div class="fct">
                        <span class="tubiao"></span>
                        <span class="biaoti">北京协和医院</span>
                    </div>
                    <div class="neir">
                        北京协和医院是一所位于北京市东城区，集医疗、科研、教学为一体的大型综合医院....
                    </div>
                </div>
            </div>
        </div>

        <div class="context-third">
            <div class="context-third-con container">
                <div class="context-third-con-t">
                    <a href="11doctorlist.html">联盟医生 <img src="{{ URL::asset('home/img/gengduo.png')}}" /></a>
                </div>
                <div class="context-third-con-u">
                    <div class="ybj">
                        <div class="ysxq-gr">
                            <img src="../img/man1.png" >
                            <div class="ysxq-grjs">
                                <span>王鑫</span>
                                <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                            </div>
                        </div>
                        <div class="ysxq-gr">
                            <img src="../img/man2.png" >
                            <div class="ysxq-grjs">
                                <span>王鑫</span>
                                <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                            </div>
                        </div>
                        <div class="ysxq-gr">
                            <img src="{{ URL::asset('home/img/man3.png')}}" >
                            <div class="ysxq-grjs">
                                <span>王鑫</span>
                                <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                            </div>
                        </div>
                        <div class="ysxq-gr">
                            <img src="{{ URL::asset('home/img/man1.png')}}" >
                            <div class="ysxq-grjs">
                                <span>王鑫</span>
                                <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                            </div>
                        </div>
                        <div class="ysxq-gr">
                            <img src="{{ URL::asset('home/img/man2.png')}}" >
                            <div class="ysxq-grjs">
                                <span>王鑫</span>
                                <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                            </div>
                        </div>
                        <div class="ysxq-gr">
                            <img src="{{ URL::asset('home/img/man3.png')}}" >
                            <div class="ysxq-grjs">
                                <span>王鑫</span>
                                <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="xuanfu">
        <div class="xuanfu-l" id="item">
            <div class="diban"></div>
            <div class="jiantou"></div>
            <img class="img" src="{{ URL::asset('home/img/erweima7070.png')}}" alt="">
            <div class="jqqd">敬请期待!</div>
            <div class="smxz">扫描下载</div>
            <div class="ysd">医生端APP</div>
        </div>
        <div class="xuanfu-l2" id="item2">
            <div class="diban"></div>
            <div class="jiantou"></div>
            <img class="img" src="{{ URL::asset('home/img/erweima7070.png')}}" alt="">
            <div class="jqqd">敬请期待!</div>
            <div class="smxz">扫描下载</div>
            <div class="ysd">医生端APP</div>
        </div>
        <div class="xuanfu-l3" id="item3">
            <div class="diban"></div>
            <div class="jiantou"></div>
            <img class="img" src="{{ URL::asset('home/img/erweima7070.png')}}" alt="">
            <div class="jqqd">敬请期待!</div>
            <div class="smxz">扫描下载</div>
            <div class="ysd">医生端APP</div>
        </div>
        <div class="xuanfu-r">
            <div id="doctor" class="doctor"></div>
            <div id="patient" class="patient"></div>
            <div id="wechat" class="wechat"></div>
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
    <div class="tanchuang2">
        <div class="tanc">

        </div>
        <div class="tc">
            <img class="closee" src="{{ URL::asset('home/img/close.png')}}"/>
            <div class="qidai">
                <img src="{{ URL::asset('home/img/xinxi.png')}}"/>
                <span>请完善账户信息</span>
                <div class="butt">
                    <button>去完善</button>
                </div>

            </div>

        </div>
    </div>
    <div class="tanchuang3">
        <div class="tanc">

        </div>
        <div class="tc">
            <img class="closee" src="{{ URL::asset('home/img/close.png')}}"/>
            <div class="qidai">
                <img src="{{ URL::asset('home/img/chongshi.png')}}"/>
                <span>请登录账号后重试</span>
                <div class="butt">
                    <button>登录</button>
                </div>

            </div>

        </div>
    </div>
    <ul class="xiala">
        <li>医联体医院</li>
        <li>加入医联体流程</li>
        <li>加入医联体</li>
        <li>加入PCCM流程</li>
        <li>加入PCCM</li>
    </ul>
    <ul class="xiala2">
        <li>科研项目</li>
        <li>申请</li>

    </ul>
    <script src="{{ URL::asset('home/js/jquery.min.js')}}"  charset="utf-8"></script>
    <script src="{{ URL::asset('home/bootstrap@3.3.7/js/bootstrap.min.js')}}" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/home.js')}}"  charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/app.js')}}" charset="utf-8"></script>

</body>
</html>