@extends("home.public.main")
@section("title")
    医联体加入流程
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
            margin-left: 500px;
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
        .xqcontent span{
            display: inline-block;
            text-indent:2em

        }
        .nextxq{
            margin-top: 14px;
        }
    </style>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> > <a href="">医联体医院</a> > 医联体加入流程
        </div>
        <div class="teachtrainxq container">
            <div class="xqtitle">医联体加入流程</div>
            <div class="xqcontent">
                @foreach($data as $item)
                    @if($item['title'] == '医联体加入流程')
                        {!! $item['content'] !!}
                    @endif
                @endforeach
            </div>
            <div class="">
                <button type="button" onclick="window.location.href='/joinylt.html'">立即申请</button>
            </div>
        </div>
    </div>
@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/info.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection