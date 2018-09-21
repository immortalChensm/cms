@extends("home.public.main")
@section("title")
    修改密码
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/alterpsw.css')}}"/>
@endsection
@section("content")

    <div class="context">
        <div class="navigation container">
            <ul>
                <li class="zhszl"><a href="/user/center.html">账户设置</a></li>
                <li class="xgmm"><a href="/alterpsw.html">修改密码</a></li>
                <li class="zzjl"><a href="/referralrecord.html">转诊记录</a></li>
                <li class="cwgl"><a href="/bed.html">床位管理</a></li>
            </ul>
        </div>

        <div class="zhsz container">
        <form id="postform">
            <div class="oldpsw">
                <span>旧密码:<a href="">*</a></span>
                <input type="text" name="oldpassword">
            </div>
            <div class="newpsw">
                <span>新密码:<a href="">*</a></span>
                <input type="text" name="password">
            </div>
            <div class="confirmpsw">
                <span>确认密码:<a href="">*</a></span>
                <input type="text" name="password_confirmation">
            </div>
            <div class="button1">
                <a onclick="submitS()" id="btn">确认</a>
            </div>
        </form>
    </div>

    </div>

    @endsection
    @section("footerjs")
        <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
        <script src="{{ URL::asset('home/js/passwordS.js')}}" type="text/javascript" charset="utf-8"></script>
    @endsection