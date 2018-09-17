@extends("home.public.main")
@section("title")
    联盟医生列表
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/doctorlist.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 医联体医生
        </div>
        <div class="yylist container">
            <div class="searchk">
                <input type="text" placeholder="专业特长、医生" name="keyword" value="{{request()->keyword}}" />
                <button type="button" id="search"></button>
            </div>
            <div class="ysxq container">
                <div class="ybj">
                    @foreach($doctors['data'] as $item)
                    <div class="ysxq-gr" data-id="{{$item['id']}}">
                        <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" style="width:99px;height:150px;">
                        <div class="ysxq-grjs">
                            <span>{{$item['username']}}</span>
                            <p>{{str_limit($item['introduction']),80}}</p>
                        </div>
                    </div>
                   @endforeach
                </div>
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
    <script src="{{ URL::asset('home/js/doctors.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection