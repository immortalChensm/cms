@extends("home.public.main")
@section("title")
    {{$data['title']}}
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/teachtraindetail.css')}}"/>
    <style>
        .teachtrainxq button{
            width: 200px;
            height: 40px;
            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            border:0;
            margin-left: 500px;
            margin-top: 50px;
        }
    </style>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > <a href="/teachtrain.html">教学培训</a> > 教学培训详情
        </div>
        <div class="teachtrainxq container">
            <div class="xqtitle">{{$data['title']}}</div>
            <div class="xqtime">发布时间：{{date("Y-m-d",strtotime($data['created_at']))}}</div>
            <div class="xqxiahuaxian"></div>
            <div class="xqpicture"><img src="{{$data['image']}}" alt=""></div>
            <div class="xqcontent">
                {!!$data['content']!!}
                <div class="">
                    <button type="button" onclick="window.location.href='/jointeach/{{$data['id']}}.html'">立即申请</button>
                </div>


            </div>
        </div>
    </div>

@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/train.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection