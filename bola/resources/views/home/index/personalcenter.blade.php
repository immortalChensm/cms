@extends("home.public.main")
@section("title")
    个人中心
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/personalcenter.css')}}"/>
    <style type="text/css">
        .uploadcase{
            margin-left: 320px;
            margin-top: 30px;
            z-index: -1;
        }
        .uploadcasem{
            font-size: 18px;
            vertical-align: top;
        }
        .uploadcase a{
            color: red;
            vertical-align: top;
        }
        .uploadcase input{
            font-size: 16px;
            width: 200px;
            height: 140px;
            opacity: 0;
            cursor: pointer;
            z-index: 999;
        }
        .upload{
            width: 200px;
            height: 140px;
            background-color: #f8f8f8;
            border-radius: 4px;
            display: inline-block;
            margin-left: 8px;
            position: relative;
            cursor: pointer;
            z-index: 0;
        }
        .upload img{
            left: 85px;
            position: absolute;
            top: 22px;
            z-index: 1;
        }
        .addpicture{
            font-size: 14px;
            color: #666666;
            position: absolute;
            width: 84px;
            left: 58px;
            top: 65px;
            z-index: 1;
            white-space : nowrap
        }
        .addjieshao{
            position: absolute;
            font-size: 12px;
            color: #999999;
            top: 88px;
            left: 58px;
            z-index: 1;
            white-space : nowrap
        }
        .ksc{
            font-size: 12px;
            line-height: 18px;
            color: #f50000;
            margin-top: -10px;
            margin-left: 15px;
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

        .button1{
            width: 60px;
            height: 30px;
            border-radius: 4px;
            display: inline-block;
            position: relative;
            cursor: pointer;
            z-index: 0;
            background-color: #971d25;
            opacity: 1;
            margin-left: 573px;
            margin-top: 20px;
        }
        .button1 input{
            width: 70px !important;
            height: 40px !important;
            border-radius: 4px;
            border: 0;
            color: #ffffff;
            margin-top: 0px !important;
            font-size: 14px;
            opacity: 0;
            cursor: pointer;
            z-index: 9999;
            display: inline-block;
        }
        .button1 span{
            position: absolute;
            z-index: -1;
            top: 1px;
            left: 10px;
            display: inline-block;
            color: #ffffff;
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

        <form id="postform">
        <input type="hidden"  name="hospitalid" value="{{$profiledata['hospital']['id']}}">
        <input type="hidden"  name="pyhsicianid" value="{{$profiledata['doctor']['id']}}">


        <input type="hidden"  id="skill_id" value="{{$profiledata['doctor']['skillid']}}">


        <div class="zhsz container">
            <div class="photo">
                @if(isset($profiledata['doctor']['image']))
                    <img src="{{request()->getSchemeAndHttpHost().$profiledata['doctor']['image']}}" width="100px" height="100px" alt="">
                    @else
                <img src="{{ URL::asset('home/img/photo.png')}}" id="headimg" alt="">
                @endif
            </div>
            <div class="button1">
                <input type="file" name="" id="image">
                <span>上传</span>
            </div>
            <div class="username">
                <span>姓名:<a href="">*</a></span>
                <input type="text" name="username" value="{{request()->session()->get("user")['user']['name']}}">
            </div>
            <div class="tele">
                <span>手机号:</span>
                <input type="text" disabled="disabled" value="{{request()->session()->get("user")['user']['mobile']}}">
            </div>
            <div class="hosptal">
                <span>所属医院:</span>
                <input type="text" disabled="disabled" value="{{$profiledata['hospital']['name']}}">




            </div>
            <div class="code">
                <span>医院代码:</span>
                <input type="text" disabled="disabled" value="{{$profiledata['hospital']['code']}}">
            </div>
            <div class="bednumber">
                <span>床位数:</span>
                <input type="text" placeholder="请输入医院床位数" name="bed_num" value="{{$profiledata['hospital']['bed_num']}}">
            </div>
            <div class="department">
                <span>所属科室:<a href="">*</a></span>
                <select name="subjectid" id="subjectid" >


                    <option value="">请选择科室</option>
                    @foreach($profiledata['subject'] as $item)
                    <option value="{{$item['id']}}" @if($profiledata['doctor']['subjectid'] == $item['id']) selected @endif>{{$item['name']}}</option>
                    @endforeach

                </select>
            </div>
            <div class="expertise">
                <span>专长特长:<a href="">*</a></span>
                <select name="skillid" id="skillid" >
                    <option value="">请选择协作组</option>
                    <option value=""></option>
                </select>
            </div>
            <div class="zhicheng">
                <span>职称:<a href="">*</a></span>
                <select name="positionid" id="positionid" >
                    <option value="">请选择职称</option>

                    @foreach($profiledata['position'] as $item)
                        <option value="{{$item['id']}}" @if($profiledata['doctor']['positionid'] == $item['id']) selected @endif>{{$item['title']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="profile">
                <span>个人简介:<a href="">*</a></span>
                <textarea placeholder="请输入个人简介" name="introduction" value="{{$profiledata['doctor']['introduction']}}">{{$profiledata['doctor']['introduction']}}</textarea>
            </div>
            <div class="uploadcase">
                <span class="uploadcasem">上传资历凭证:</span>
                <div class="upload">
                    <input type="file"  id="certFile"/>
                    <img src="{{ URL::asset('home/img/add.png')}}" alt="">
                    <span class="addpicture">点击添加图片</span>
                    <span class="addjieshao">只支持上传图片</span>
                    <div class="ksc">
                        *可上传职业证、医师证、职称证
                    </div>
                </div>

            </div>
            <div class="button2">
                <a onclick="submitS()" id="btn">确认</a>
            </div>
        </form>
        </div>
    </div>

@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/profile.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection
