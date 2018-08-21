@extends('home.public.head')
@section('content')
<div class="container_top">
    <div class="cont w1200" style="padding: 0 15px;">
        <div class="cont_top" style="font-size: 14px;">
            <p style="font-size: 24px;margin-bottom: 20px;">博拉<sup style="font-size: 16px;">&reg;</sup>以奋斗者为核心</p>
            <p>在博拉工作，你将接触到这里特有的追求卓越、崇尚创造的公司氛围，获得专业培训、团队协作和个人发展的机会。</p>
            <p>应聘者请发送个人简历至：hr@bolaa.com，邮件名称格式为：应聘+职位名称+工作地点。</p>
        </div>
        <div class="banner clearfix" style="width: 100%; height: auto;">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="width: 100%"><img style="width: 49%;" id="swiper_img1" src="{{ URL::asset('home/images/join_img3.png')}}" alt=""><img style="width: 48%;" src="{{ URL::asset('home/images/join_img4.png')}}" alt=""></div>
                    <div class="swiper-slide" style="width: 100%"><img style="width: 49%;" src="{{ URL::asset('home/images/join_img5.png')}}" alt=""><img style="width: 48%;" src="{{ URL::asset('home/images/join_img6.png')}}" alt=""></div>
                </div>
            </div>
        </div>

        @foreach($list as $job)
        <div id="masonry" class="container-fluid join clearfix" style="float:left;width: 100%;padding: 0;">
            <div class="grid-sizer" style="width: 10%"></div>
            <div class="join_cont left">
            <h2>{{$job->title}}</h2>
            <div class="some"><span class="time">{{$job->created_at}}</span> &nbsp;| &nbsp;<span class="location">{{$job->place}}</span><span> | {{$job->name}}</span></div>
            <div class="join_box">
            {!! $job->content !!}
           
            </div>
            </div>
        </div>
        @endforeach

<!--
        <div class="more" id="more">
            加载更多
        </div>
-->
        <div class="foot" style="display: none">
            <p>COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
        </div>
    </div>
</div>
<img src="{{ URL::asset('home/images/top.png')}}" class="gotop" id="gotop">
</body>
@include("home.public.footerjs")

</html>
@endsection