@extends("home.public.main")
@section("title")
    科研项目
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/teachtrain.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="01home.html"> 首页</a> >  科研项目
        </div>
        <div class="yylist container">
            <div class="searchk">
                <input type="text" placeholder="资讯" name="keyword" value="{{request()->keyword}}"/>
                <button type="button" id="search"></button>
            </div>
            <div class="teachlist">

                @foreach($train['data'] as $item)
                <div class="oneteachlist" data-id="{{$item['id']}}">
                    <span class=""></span>
                    <span class="listtitle">{{$item['title']}}</span>
                    <span class="datetime">{{date("Y-m-d",strtotime($item['created_at']))}}</span>
                </div>
                @endforeach
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
    <script src="{{ URL::asset('home/js/info.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection