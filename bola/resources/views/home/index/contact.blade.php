@extends('home.public.head')
@section('content')
<div class="container_top">
    <div class="cont w1065">
        <div class="cont_top contact_top" style="height: 160px;">
            <h3>博拉<sup style="font-size: 16px;">&reg;</sup>全国服务热线</h3>
            <img class="tel" src="{{ URL::asset('home/picture/icon_contact7.png')}}" alt="">
            <!--<div class="clearfix">-->
                <!--<img src="picture/code.png" alt="">-->
                <!--<p style="font-size: 12px;">（关注我们）</p>-->
            <!--</div>-->

            <!--<div class="clearfix">-->
                <!--<img class="weixin" src="picture/icon_contact2.png" alt="">-->
                <!--<img class="weibo" src="picture/icon_contact1.png" alt="">-->
            <!--</div>-->

        </div>
        <div class="contact clearfix">
            <div class="contact_right">
                <img src="{{ URL::asset('home/picture/map11.jpg')}}" alt="">
            </div>
            <div class="contact_left contact_left_1">
                <!--<div class="title"><img src="picture/icon_contact3.png" alt=""></div>-->
                <ul class="pro">
                    @foreach($list as $address)
                    <li class="clearfix">
                        <div class="box">
                            <h2>{{$address->area}}</h2>
                            <h3 class="tit">{{$address->place}}</h3>
                            <p>{{$address->address}}</p>
                            <p>{{$address->mobile}}</p>
                        </div>

                    </li>
                    @endforeach
                </ul>

            </div>
            
        </div>
        <div class="foot padding15" style="padding-left: 42px;">
            <p>COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
        </div>
    </div>
</div>
<img src="{{ URL::asset('home/images/top.png')}}" class="gotop" id="gotop">
@include("home.public.footerjs")
</body>
</html>
@endsection