<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/bootstrap@3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/app.css')}} "/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/doctorlist.css')}}"/>
    <script src="https://cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
    <script src="https://cdn.bootcss.com/vue-resource/1.5.1/vue-resource.min.js"></script>
    <title>联盟医生列表</title>

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
                <li class="fs18 xuanzhong"><a href="11doctorlist.html">医联体医生</a></li>
                <li class="fs18"><a href="13referralapplication.html">转诊申请</a></li>
                <li class="fs18"><a href="15teachtrain.html">教学培训</a></li>
                <li class="fs18"><a href="17information.html">最新资讯</a></li>
                <li id="button3" class="fs18">远程中心</li>
                <li class="fs18"><a href="22aboutus.html">关于我们</a></li>
            </ul>
        </div>
    </div>
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> > 医联体医生
        </div>
        <div class="yylist container">
            <div class="searchk">
                <input type="text" placeholder="协作组、医生"/>
                <button type="button"></button>
            </div>
            <div class="ysxq container">
                <div class="ybj">
                    
                    <div class="ysxq-gr">
                        <img src="../img/man1.png" >
                        <div class="ysxq-grjs">
                            <span>@{{name}}</span>
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
                        <img src="../img/man3.png" >
                        <div class="ysxq-grjs">
                            <span>王鑫</span>
                            <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                        </div>
                    </div>
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
                        <img src="../img/man3.png" >
                        <div class="ysxq-grjs">
                            <span>王鑫</span>
                            <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                        </div>
                    </div>
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
                        <img src="../img/man3.png" >
                        <div class="ysxq-grjs">
                            <span>王鑫</span>
                            <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                        </div>
                    </div>
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
                        <img src="../img/man3.png" >
                        <div class="ysxq-grjs">
                            <span>王鑫</span>
                            <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                        </div>
                    </div>
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
                        <img src="../img/man3.png" >
                        <div class="ysxq-grjs">
                            <span>王鑫</span>
                            <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                        </div>
                    </div>
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
                        <img src="../img/man3.png" >
                        <div class="ysxq-grjs">
                            <span>王鑫</span>
                            <p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fenye">
                <ul class="pagination">
                    <li class="shangyiye"><a href="#">上一页</a></li>
                    <li class="yi"><a href="#">1</a></li>
                    <li class="er"><a href="#">2</a></li>
                    <li class="san"><a href="#">3</a></li>
                    <li class="si"><a href="#">4</a></li>
                    <li class="wu"><a href="#">5</a></li>
                    <span class="diandiandian">...</span>
                    <li class="xiayiye"><a href="#">下一页</a></li>
                </ul>
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


</body>
</html>