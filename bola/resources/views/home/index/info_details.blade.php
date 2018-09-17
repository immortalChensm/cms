@extends("home.public.main")
@section("title")
    科研项目
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/teachtraindetail.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> > 科研项目 > 科研项目详情
        </div>
        <div class="teachtrainxq container">
            <div class="xqtitle">{{$data['title']}}</div>
            <div class="xqtime">发布时间：{{date("Y-m-d",strtotime($data['created_at']))}}</div>
            <div class="xqxiahuaxian"></div>
            {{--<div class="xqpicture"><img src="{{$data['image']}}" alt=""></div>--}}
            <div class="xqcontent">
                {!!$data['content']!!}
                    </div>
        </div>
    </div>

@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/info.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection