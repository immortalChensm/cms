@extends("home.public.main")
@section("title")
    联盟医院列表
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/hospitallist.css')}}"/>

@endsection

@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 医联体医院
        </div>
        <div class="yylist container">

            {{csrf_field()}}
            <div class="city">
                <select name="province">

                    <option value="">请选择省份</option>
                    @foreach($provinceS as $item)
                    <option value="{{$item->id}}" @if(request()->province == $item->id) selected @endif>{{$item->name}}</option>
                    @endforeach
                </select>
                <select name="city">
                    <option value="">请选择城市</option>

                </select>
                <select name="county">
                    <option value="">请选择区/县</option>

                </select>
            </div>
            <div class="searchk">
                <input type="text" placeholder="地区、医院名称" value="{{request()->keyword}}" name="keyword"/>
                <button type="button" id="search"></button>
            </div>
            <div class="yylistt">

                @if(count($hospital['data'])>1)
                @foreach($hospital['data'] as $item)
                <div class="yylistt-xq" data-id="{{$item['id']}}">
                    <img src="{{request()->getSchemeAndHttpHost().$item['image']}}" style="width:270px;height:203px;">
                    <div class="yym">
                        {{$item['name']}}
                    </div>
                    <div class="keshi">
                        {{$item['subject']['name']}}
                    </div>
                    <div class="yscw">
                        <span class="yscw-l"><span class="num"> {{$item['doctors_num']}}</span>名医生</span>
                        <span class="yscw-r"><span class="num">{{$item['bed_num']}}</span>床位</span>
                    </div>
                </div>
                @endforeach
                    @else
                    <p style="text-align:center;margin:50px auto;">没有满足搜索条件的医院</p>
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
    <script src="{{ URL::asset('home/js/hospital.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection