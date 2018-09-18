@extends("home.public.main")
@section("title")
    床位管理
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/personalcenter.css')}}"/>
    <style type="text/css">

        .context{
            width: 100%;
            height: 770px;
            background-color: #f8f8f8;
        }
        .navigation{
            width: 1200px;
            height: 41px;
            border-bottom: 1px solid #971d25;
            margin-top: 50px;
        }
        .navigation ul{
            list-style:none;
            margin: 0px;
            padding: 0px;
            margin-left: -1px;
        }
        .navigation ul li{
            float:left;
            width: 160px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            font-size: 16px;
            font-weight: bold;
            margin-left: 1px;
        }
        .navigation ul li a:hover{
            background-color: #971d25;
            color: #ffffff;
            text-decoration: none;
        }
        .xgmm a{
            display: block;
            color: #971d25;
            background-color: #eee2e2;
        }
        .zhszl a{
            display: block;
            color: #971d25;
            background-color: #eee2e2;
        }
        .zzjl a{
            display: block;
            color: #971d25;
            background-color: #eee2e2;
        }
        .zhsz{
            width: 1200px;
            height: 400px;
            background-color: #ffffff;
            margin-top: 30px;
            font-size: 18px;
        }

        .zhsz input{
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            background-color:#ffffff;
            margin-left: 2px;
            padding-left: 12px;
            font-size: 16px;
            margin-top: 20px;
        }
        .zhsz a{
            color: red;
        }
        .oldpsw{
            margin-left: 422px;
        }

        .newpsw{
            margin-left: 404px;
        }

        .confirmpsw{
            margin-left: 410px;
        }

        .button1{
            text-align: center;
            margin-top: 50px;
        }
        .button1 button{
            width: 200px;
            height: 40px;
            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            border: 0;
        }
        .cwgl a{
            display: block;
            background-color: #971d25;
            color: #ffffff;
        }
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
                <span>总床位:<a href="">*</a></span>
                <input type="text" placeholder="请输入总床位数" name="bed_num">
            </div>
            <div class="newpsw">
                <span>普通床位:<a href="">*</a></span>
                <input type="text" placeholder="请输入普通床位数" name="general_seat">
            </div>
            <div class="confirmpsw">
                <span>ICU床位:<a href="">*</a></span>
                <input type="text" placeholder="请输入ICU床位数" name="icu_seat">
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
    <script src="{{ URL::asset('home/js/bed.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection