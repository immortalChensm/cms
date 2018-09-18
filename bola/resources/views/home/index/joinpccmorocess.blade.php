@extends("home.public.main")
@section("title")
    申请加入PCCM流程
@endsection
@section("css")
    <style type="text/css">
        .context{
            width: 100%;
            height: 1690px;
            background-color: #f8f8f8;

        }
        .teachtrainxq{
            width: 1200px;
            height: 1000px;
            background-color: #ffffff;
            margin-top: 30px;
        }
        .teachtrainxq button{
            width: 200px;
            height: 40px;
            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            border:0;
            /* margin-left: 500px; */
            /* display: block;
            position: absolute;
            bottom: 121px; */
        }
        .xqtitle{
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            margin-top: 38px;
            text-align: center;
        }
        .xqcontent{
            margin-top: 52px;
            width: 996px;
            height: 700px;
            font-size: 16px;
            line-height: 30px;
            color: #333333;
            margin-left: 101px;
            text-align:justify
        }
        .xqcontent img{
            text-align: center;
            display: block;
            margin-left: 248px;
            margin-bottom: 40px;
        }
        .but{
            margin-top: 100px;
            text-align: center;
            margin-top: 60px;
        }

    </style>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 申请加入PCCM流程
        </div>
        <div class="teachtrainxq container">
            <div class="xqtitle">PCCM加入流程</div>

            <div class="xqcontent">
                @foreach($data as $item)
                    @if($item['title'] == '加入PCCM流程')
                        {!! $item['content'] !!}
                    @endif
                @endforeach
            </div>
            <div class="but">
                <button type="button" onclick="window.location.href='/joinpccm.html'">立即申请</button>
            </div>
        </div>
    </div>

@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/info.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection