@extends("home.public.main")
@section("title")
    教学培训详情
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/teachtrain.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> > {{$nav}}
        </div>
        <div class="yylist container">
            <div class="searchk">
                <input type="text" placeholder="资讯" name="keyword" value="{{request()->keyword}}"/>
                <button type="button" id="search"></button>
            </div>
            <div class="teachlist">

                @if(count($train['data'])>0)
                @foreach($train['data'] as $item)
                <div class="oneteachlist" data-id="{{$item['id']}}">
                    <span class="qianzhui"></span>
                    <span class="listtitle">{{$item['title']}}</span>
                    <span class="datetime">{{date("Y-m-d",strtotime($item['created_at']))}}</span>
                </div>
                    @endforeach
                    @else
                    搜索不到数据
                    @endif

            </div>


            <div class="fenye">
                <ul class="pagination">


                    <li class="shangyiye"><a href="{{$paginator->getPrevUrl()}}">上一页</a></li>

                    @foreach($paginator->getPages() as $page)
                        <li class="yi"><a href="{{$page['url']}}">{{$page['num']}}</a></li>

                    @endforeach

                    <li class="xiayiye"><a href="{{$paginator->getNextUrl()}}">下一页</a></li>


                </ul>
            </div>
        </div>
    </div>


@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/train.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection