@extends("home.public.main")
@section("title")

    {{$data['name']}}
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/hospitaldetail.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > <a href="/hospitals.html">医联体医院</a> > {{$data['name']}}
        </div>
        <div class="yyxq">
            <img class="yyxqimg" src="{{request()->getSchemeAndHttpHost().$data['image']}}" style="max-width: 720px;max-height: 541px;">
            <div class="yyxq-xq">
                <div class="hosp">
                    <img src="{{ URL::asset('home/img/hospital.png')}}" >
                    <span>{{$data['name']}}</span>
                </div>
                <div class="ggy1">
                    <img src="{{ URL::asset('home/img/address.png')}}" >
                    <span>{{$data['address']}}</span>
                </div>
                <div class="ggy">
                    <img src="{{ URL::asset('home/img/keshi.png')}}" >
                    <span>{{$data['subject']['name']}}</span>
                </div>
                <div class="ggy">
                    <img src="{{ URL::asset('home/img/bed.png')}}" >
                    <span>{{$data['bed_num']}}床位</span>
                </div>
                <div class="ggy">
                    <img src="{{ URL::asset('home/img/zan.png')}}" >
                    <span>
                        @foreach($data['skill'] as $item)
                            {{$item['name']}}
                            @endforeach
                    </span>
                </div>
            </div>
        </div>
        <div class="ysxq container">
            <div class="ybj">

                @foreach($data['doctors'] as $item)
                <div class="ysxq-gr">
                    <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" style="width:99px;height:150px;">
                    <div class="ysxq-grjs">
                        <span>{{$item['username']}}</span>
                        <p>{{str_limit($item['introduction'],80)}}</p>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </div>

@endsection