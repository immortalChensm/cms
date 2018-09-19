@extends("home.public.main")
@section("title")

    登录
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/login.css')}}"/>
@endsection
@section("content")

    <div class="context">
        <div class="login">
            <div class="hyzc">
                <img src="{{ URL::asset('home/img/dian.png')}}" >
                <span>欢迎登录</span>
            </div>
            <div class="zcktel">
                <img src="{{ URL::asset('home/img/tele.png')}}" >
                <input type="tel" placeholder="请输入您的手机号" name="mobile" />
            </div>
            <div class="zckpsw">
                <img src="{{ URL::asset('home/img/psw.png')}}" >
                <input type="password" placeholder="请输入您的密码" name="password" />
            </div>
            <div class="zckzc">
                <button type="button" onclick="login('login')">登录</button>
            </div>
            <div class="zckdl">
                <a class="wjmm" href="/frogotpwd.html">忘记密码？</a>
                <a class="ljzc" href="/register.html">立即注册</a>
            </div>
        </div>
    </div>

    <input type="hidden" name="prevurl" value="{{request()->get('prevurl')}}"/>

@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/login.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection