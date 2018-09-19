@extends("home.public.main")
@section("title")
    {{session('title')}}
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/registersuccess.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="registersuccess">
            <div class="cg">
                <img src="{{ URL::asset('home/img/success.png')}}"/>
                <span>{{session('message')}}</span>
            </div>
            <div class="tz">
                <p>页面跳转中......</p>

                @if(request()->get("prevurl"))
                    <p>点击 <a href="{{request()->get("prevurl")}}">立即跳转</a></p>

                    @else
                    <p>点击 <a href="{{session("url")}}">立即跳转</a></p>
                    @endif



            </div>
        </div>
    </div>
@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        setTimeout(function(){//两秒后跳转

            if("{{request()->get("prevurl")}}"){

                window.location.href = "{{request()->get("prevurl")}}";
            }else{
                window.location.href = "{{session("url")}}";
            }



        },1000);

    </script>
@endsection