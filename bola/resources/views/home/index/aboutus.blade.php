@extends("home.public.main")
@section("title")
    关于我们
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/aboutus.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 关于我们
        </div>
        <div class="yltwhat container">
            <div class="yltss">
                医联体是什么？
            </div>

            {{--<div class="imge">--}}
                {{--<img src="../img/700526.png" >--}}
            {{--</div>--}}
            {{----}}
            {{----}}
            <div class="cont">

                @foreach($data as $item)
                    @if($item['title'] == '关于我们')
                        {!! $item['content'] !!}
                        @endif
                    @endforeach
            </div>




        </div>
        <div class="contactus container">
            <div class="yltss">
                联系我们
            </div>
            <div class="cimg">
                @foreach($data as $item)
                    @if($item['title'] == '联系我们')
                        {!! $item['content'] !!}
                    @endif
                @endforeach
            </div>
            <div class="contactusba">
                <div class="contactusba1">
                    <img src="{{ URL::asset('home/img/tb.png')}}" >
                </div>
                <div class="contactusba2">
                    <img src="{{ URL::asset('home/img/company.png')}}" >
                    <span>@foreach($sys as $item)
                            @if($item->name=='webtitle')
                                {{$item->value}}
                            @endif
                        @endforeach</span>
                </div>
                <div class="contactusba3">
                    <img src="{{ URL::asset('home/img/dz.png')}}" >
                    <span>@foreach($sys as $item)
                            @if($item->name=='address')
                                {{$item->value}}
                            @endif
                        @endforeach</span>
                </div>
                <div class="contactusba4">
                    <img src="{{ URL::asset('home/img/telep.png')}}" >
                    <span>@foreach($sys as $item)
                            @if($item->name=='phone')
                                {{$item->value}}
                            @endif
                        @endforeach</span>
                </div>
            </div>
        </div>
    </div>

@endsection
