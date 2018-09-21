@extends("home.public.main")
@section("title")

    忘记密码
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/forgetpsw.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <form id="postform">
        <div class="forgetpsw">
            <div class="hyzc">
                <img src="{{ URL::asset('home/img/dian.png')}}" >
                <span>忘记密码</span>
            </div>
            <div class="zcktel">
                <img src="{{ URL::asset('home/img/tele.png')}}" >
                <input type="tel" placeholder="请输入您的手机号" name="mobile"/>
            </div>
            <div class="zckyzm">
                <img src="{{ URL::asset('home/img/yanz.png')}}" >
                <input type="" placeholder="请输入您的验证码" name="code"/>
                <button type="button" id="getCode">获取验证码</button>
            </div>
            <div class="zckpsw">
                <img src="{{ URL::asset('home/img/psw.png')}}" >
                <input type="password" placeholder="请输入您的登录密码" name="password"/>
            </div>
            <div class="zckpsw">
                <img src="{{ URL::asset('home/img/psw.png')}}" >
                <input type="password" placeholder="请再次输入您的登录密码" name="password_confirmation" />
            </div>
            <div class="zckzc">
                <a type="button" class="ljzc" id="btn" onclick="submitS()">确认</a>
            </div>

            <input type="hidden" name="key"/>
        </div>
        </form>
    </div>

@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/forgotpwd.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection