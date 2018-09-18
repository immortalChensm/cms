@extends("home.public.main")
@section("title")
    首页
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/home.css')}}"/>
@endsection
@section("search")
    <div class="search">
        <select class="select">
            <option class="option" value="医院">医院</option>
            <option class="option" value="医生">医生</option>
        </select>
        <input class="input" type="text" placeholder="医院/医生">
        <button class="button"></button>
    </div>
    @endsection
@section("content")

    <div class="context">
        <div class="banner container">
            <div class="banner-l">
                <div id="myCarousel" class="carousel slide ">
                    <!-- 轮播（Carousel）指标 -->


                    <ol class="carousel-indicators" >

                        @foreach($banner as $key=>$item)
                        <li data-target="#myCarousel" data-slide-to="{{$key}}" @if($key==0) class="active" @endif ></li>
                        @endforeach
                        {{--<li data-target="#myCarousel" data-slide-to="1" class="active"></li>--}}
                        {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                        {{--<li data-target="#myCarousel" data-slide-to="3"></li>--}}
                        {{--<li data-target="#myCarousel" data-slide-to="4"></li>--}}
                        {{----}}

                    </ol>


                    <!-- 轮播（Carousel）项目 -->
                    <div class="carousel-inner">

                        @foreach($banner as $key=>$item)
                        <div class="item @if($key == 1) active @endif">
                            <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" alt="{{$num[$key]}} slide">

                        </div>
                        @endforeach

                        {{--<div class="item">--}}
                            {{--<img src="../img/Banner2.png" alt="Second slide">--}}

                        {{--</div>--}}
                        {{--<div class="item">--}}
                            {{--<img src="../img/Banner3.png" alt="Third slide">--}}

                        {{--</div>--}}
                        {{--<div class="item">--}}
                            {{--<img src="../img/400198504.png" alt="Four slide">--}}

                        {{--</div>--}}
                        {{--<div class="item">--}}
                            {{--<img src="../img/Banner2.png" alt="Five slide">--}}

                        {{--</div>--}}


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

                        @foreach($train['data'] as $key=>$item)
                            @if($key<2)
                        <div class="banner-r-ud-u">
                            <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" >
                            <span>{{$item['title']}}</span>
                        </div>
                            @endif
                        @endforeach
                        {{--<div class="banner-r-ud-u">--}}
                            {{--<img src="../img/VCG4188023609.png" >--}}
                            {{--<span>北京协和医院开展2018年第二届技能大赛fffffffffff</span>--}}
                        {{--</div>--}}


                        <a href="/teachtrain.html" class="ckgd">查看更多</a>


                    </div>
                    <div class="" id="zxzxcon">

                        @foreach($article['data'] as $key=>$item)
                            @if($key<2)
                        <div class="banner-r-ud-u">
                            <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" >
                            <span>{{$item['title']}}</span>
                        </div>
                            @endif
                        @endforeach
                        {{--<div class="banner-r-ud-u">--}}
                            {{--<img src="../img/erweima.png" >--}}
                            {{--<span>北京协和医院举办第四批“组团式”援藏医疗队欢送会</span>--}}
                        {{--</div>--}}


                        <a href="/information.html" class="ckgd">查看更多</a>


                    </div>
                </div>
            </div>
        </div>

        <div class="context-second container">
            <a class="lmys" href="/hospitals.html">联盟医院 <img src="{{ URL::asset('home/img/gengduo.png')}}" /></a>

            <div class="context-second-ft">

                @foreach($hospital['data'] as $key=>$item)
                    @if($key<3)
                <img class="imgr{{$key+1}}" src="{{ request()->getSchemeAndHttpHost().$item['image']}}" />
                    @endif
                @endforeach
                {{--<img class="imgr2" src="{{ URL::asset('home/img/VCG21c5d61410c.png')}}"/>--}}
                {{--<img class="imgr3" src="{{ URL::asset('home/img/VCG21c5d61410c.png')}}"/>--}}


            </div>

            <div class="context-second-st">
                @foreach($hospital['data'] as $key=>$item)
                    @if($key<3)
                <div class="fc{{$key+1}}">
                    <div class="fct">
                        <!--<img class="tubiao" src="img/jux01.png"/>-->
                        <span class="tubiao"></span>
                        <span class="biaoti">{{$item['name']}}</span>
                    </div>
                    <div class="neir">
                        {{str_limit($item['introduction'],80)}}
                    </div>
                </div>
                    @endif

                @endforeach
                    {{--@foreach($hospital['data'] as $key=>$item)--}}
                        {{--@if($key==1)--}}

                {{--<div class="fc2">--}}
                    {{--<div class="fct">--}}
                        {{--<span class="tubiao"></span>--}}
                        {{--<span class="biaoti">{{$item['name']}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="neir">--}}
                        {{--{{str_limit($item['introduction'],80)}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}

                    {{--@foreach($hospital['data'] as $key=>$item)--}}
                        {{--@if($key==2)--}}
                {{--<div class="fc3">--}}
                    {{--<div class="fct">--}}
                        {{--<span class="tubiao"></span>--}}
                        {{--<span class="biaoti">{{$item['name']}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="neir">--}}
                        {{--{{str_limit($item['introduction'],80)}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}

            </div>
        </div>

        <div class="context-third">
            <div class="context-third-con container">
                <div class="context-third-con-t">
                    <a href="/doctors.html">联盟医生 <img src="{{ URL::asset('home/img/gengduo.png')}}" /></a>
                </div>
                <div class="context-third-con-u">
                    <div class="ybj">

                        @foreach($doctors['data'] as $key=>$item)
                        <div class="ysxq-gr">
                            <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" style="width:99px;height:150px" >
                            <div class="ysxq-grjs">
                                <span>{{$item['username']}}</span>
                                <p>{{str_limit($item['introduction'],80)}}</p>
                            </div>
                        </div>
                        @endforeach

                        {{--<div class="ysxq-gr">--}}
                            {{--<img src="../img/man2.png" >--}}
                            {{--<div class="ysxq-grjs">--}}
                                {{--<span>王鑫</span>--}}
                                {{--<p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="ysxq-gr">--}}
                            {{--<img src="../img/man3.png" >--}}
                            {{--<div class="ysxq-grjs">--}}
                                {{--<span>王鑫</span>--}}
                                {{--<p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="ysxq-gr">--}}
                            {{--<img src="../img/man1.png" >--}}
                            {{--<div class="ysxq-grjs">--}}
                                {{--<span>王鑫</span>--}}
                                {{--<p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="ysxq-gr">--}}
                            {{--<img src="../img/man2.png" >--}}
                            {{--<div class="ysxq-grjs">--}}
                                {{--<span>王鑫</span>--}}
                                {{--<p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="ysxq-gr">--}}
                            {{--<img src="../img/man3.png" >--}}
                            {{--<div class="ysxq-grjs">--}}
                                {{--<span>王鑫</span>--}}
                                {{--<p>博士生导师。1984年始于北京协和医院内分泌科从事临床工作。擅长内分泌代.....</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
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
                <img src="../img/loudou.png"/>
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
                <img src="../img/xinxi.png"/>
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
                <img src="../img/chongshi.png"/>
                <span>请登录账号后重试</span>
                <div class="butt">
                    <button>登录</button>
                </div>

            </div>

        </div>
    </div>
    <div class="tanchuang4">
        <div class="tanc">

        </div>
        <div class="tc">
            <img class="closee" src="{{ URL::asset('home/img/close.png')}}"/>
            <div class="qidai">
                <img src="../img/chongshi.png"/>
                <span>暂无权限</span>
                <div class="butt">
                    <button>登录</button>
                </div>

            </div>

        </div>
    </div>

    <script src="{{ URL::asset('home/js/jquery.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/bootstrap@3.3.7/js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/app.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>

        //悬浮窗效果

        //鼠标移动到医生端，敬请期待小框显示
        document.getElementById("doctor").onmouseover = function(){
            document.getElementById("item").style.display = "block";
        };
        //鼠标移开，敬请期待小框隐藏
        document.getElementById("doctor").onmouseout = function(){
            document.getElementById("item").style.display = "none";
        };


        //鼠标移动到病人端，敬请期待小框显示
        document.getElementById("patient").onmouseover = function(){
            document.getElementById("item2").style.display = "block";
        };
        //鼠标移开，敬请期待小框隐藏
        document.getElementById("patient").onmouseout = function(){
            document.getElementById("item2").style.display = "none";
        };



        //鼠标移动到微信端，敬请期待小框显示
        document.getElementById("wechat").onmouseover = function(){
            document.getElementById("item3").style.display = "block";
        };
        //鼠标移开，敬请期待小框隐藏
        document.getElementById("wechat").onmouseout = function(){
            document.getElementById("item3").style.display = "none";
        };



        //点击远程中心，敬请期待弹框显示
        document.getElementById("button3").onclick = function(){
            document.getElementById("tanc01").style.display = "block";
        };
        //点击下载Android版，敬请期待弹框显示
        document.getElementById("button7").onclick = function(){
            document.getElementById("tanc01").style.display = "block";
        };
        //点击下载Iphone版，敬请期待弹框显示
        document.getElementById("button8").onclick = function(){
            document.getElementById("tanc01").style.display = "block";
        };



        //点击x，敬请期待弹框隐藏
        document.getElementById("close01").onclick = function(){
            document.getElementById("tanc01").style.display = "none";
        };
        //点击确认，敬请期待弹框隐藏
        document.getElementById("close02").onclick = function(){
            document.getElementById("tanc01").style.display = "none";
        };

        //轮播定时3秒
        $(function(){
            $('#myCarousel').carousel({interval:3000});
        })

        //首页教学培训，最新资讯点击切换
        document.getElementById("jxpx").onclick = function(){
            document.getElementById("jxpxcon").style.display = "block";
            document.getElementById("zxzxcon").style.display = "none";
            document.getElementById("jxpx").style.cssText="color:#971d25";
            document.getElementById("jxpxk").style.cssText="opacity: 1";

            document.getElementById("zxzx").style.cssText="color:#333333";
            document.getElementById("zxzxk").style.cssText="opacity: 0";
        };
        document.getElementById("zxzx").onclick = function(){
            document.getElementById("jxpxcon").style.display = "none";
            document.getElementById("zxzxcon").style.display = "block";
            document.getElementById("jxpx").style.cssText="color:#333333";
            document.getElementById("jxpxk").style.cssText="opacity: 0";

            document.getElementById("zxzx").style.cssText="color:#971d25;";
            document.getElementById("zxzxk").style.cssText="opacity: 1";
        };

        //
        document.getElementById("dhyy").onmouseover = function(){
            document.getElementById("xiala").style.display = "block";
        };
        //
        document.getElementById("dhyy").onmouseout = function(){
            document.getElementById("xiala").style.display = "none";
        };
        document.getElementById("dhzz").onmouseover = function(){
            document.getElementById("xiala2").style.display = "block";
        };
        //
        document.getElementById("dhzz").onmouseout = function(){
            document.getElementById("xiala2").style.display = "none";
        };
    </script>
</body>

<style>
    .ybj{
        margin-left: 15px;
    }
    .ysxq-gr{
        width: 380px;
        height: 190px;
        background-color: #ffffff;
        box-shadow: 1px 1px 12px 0px
        rgba(42, 42, 42, 0.15);
        margin-top: 40px;
        margin-left: 5px;
        margin-right: 10px;
        display: inline-block;

    }
    .ysxq-gr img{
        margin-top: 20px;
        margin-left: 20px;
    }
    .ysxq-grjs{
        display: inline-block;
        position: absolute;
        padding-left: 20px;
        padding-top: 40px;
    }
    .ysxq-grjs span{
        font-size: 18px;
        color: #333333;
        font-weight: bold;
        margin-top: 40px;
    }

    .ysxq-grjs p{
        width: 214px;
        font-size: 16px;
        padding-top: 15px;
    }

@endsection