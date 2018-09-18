@extends("home.public.main")
@section("title")

    注册
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/register.css')}}"/>
    <style>
        #btn{

            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            display:inline-block;
            width: 200px;
            height: 40px;
            line-height: 40px;
            text-align: center;

        }
        a:hover {

            color: #ffffff;
            text-decoration: none;
        }

    </style>

@endsection
@section("content")
    <div class="context">
        <div class="register">
            <div class="hyzc">
                <img src="{{ URL::asset('home/img/dian.png')}}" >
                <span>欢迎注册</span>
            </div>

            <form id="postForm">
            <div class="zcktel">
                <img src="{{ URL::asset('home/img/tele.png')}}" >
                <input type="tel" placeholder="请输入您的手机号" name="mobile" />
            </div>
            <div class="zckyzm">
                <img src="{{ URL::asset('home/img/yanz.png')}}" >
                <input type="" placeholder="请输入您的验证码" name="code" />
                <button type="button" id="getCode">获取验证码</button>
            </div>
            <div class="zckpsw">
                <img src="{{ URL::asset('home/img/psw.png')}}" >
                <input type="password" placeholder="请输入您的登录密码" name="password" />
            </div>
            <div class="zckpsw">
                <img src="{{ URL::asset('home/img/psw.png')}}" >
                <input type="password" placeholder="请再次输入您的登录密码" name="password_confirmation"/>
            </div>
            <div class="zckdiqu">
                <img src="{{ URL::asset('home/img/diqu.png')}}" >
                <select name="provinceid">
                    <option value="">请选择省份/市</option>
                    @foreach($zone as $item)

                        <optgroup label="{{$item['name']}}">
                            @foreach($item['child'] as $child)
                            <option value="{{$child['id']}}">{{$child['name']}}</option>
                            @endforeach
                        </optgroup>

                    @endforeach



                </select>
            </div>
            <div class="zckyy">
                <img src="{{ URL::asset('home/img/hos.png')}}" >
                <select name="hospitalid">

                    <option value="">请选择所属医院</option>

                </select>
            </div>
            <div class="zckpsw">
                <img src="{{ URL::asset('home/img/nn.png')}}" >
                <input type="text" placeholder="请输入医院代码" name="hospital_code"/>
            </div>

            <input type="hidden" name="key"/>

            <div class="zckzc">
                <a onclick="register()" id="btn">上传</a>
            </div>

            </form>

            <div class="zckdl">
                已有账号，立即<a href="/login.html">登录</a>
            </div>
        </div>
    </div>

@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/register.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection