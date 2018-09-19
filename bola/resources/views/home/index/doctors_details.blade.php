@extends("home.public.main")
@section("title")
    {{$data['username']}}
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/doctordetail.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > <a href="/doctors.html">医联体医生</a> > {{$data['username']}}
        </div>
        <div class="doctorxq container">
            <div class="ysxq-gr">
                <img src="{{request()->getSchemeAndHttpHost().$data['image']}}" >
                <div class="ysxq-grjs">
                    <span class="xingming">{{$data['username']}}</span>
                    <p class="yym">{{$data['hospital']['name']}}</p>
                    <p class="keshi"><span>科室：</span>{{$data['subject']['name']}}</p>
                    <p class="keshi"><span>职称：</span>{{$data['position']['title']}}</p>
                    <p class="zytc"><span>专业特长：</span>
                    @foreach($data['skill'] as $item)
                            {{$item['name']}}
                        @endforeach
                    </p>
                    <p class="xqjs">{{$data['introduction']}} </p>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/doctors.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection