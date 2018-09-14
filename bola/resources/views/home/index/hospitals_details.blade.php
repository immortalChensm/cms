@extends("home.public.main")
@section("title")

    医院详情
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/hospitaldetail.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 医联体医院 > 北京协和医院
        </div>
        <div class="yyxq">
            <img class="yyxqimg" src="{{request()->getSchemeAndHttpHost().$data['image']}}" >
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
    </div>

@endsection