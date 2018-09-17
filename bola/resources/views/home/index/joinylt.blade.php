@extends("home.public.main")
@section("title")
    申请加入医联体
@endsection
@section("css")
    <style type="text/css">
        .context{
            width: 100%;
            height: 770px;
            background-color: #f8f8f8;

        }
        .shenqing{
            height: 500px;
            background-color: #ffffff;
            margin-top: 30px;
        }
        .shenqing input::-webkit-input-placeholder{
            color: #999999;
        }
        .shenqing textarea::-webkit-input-placeholder{
            color: #999999;

        }
        .patientname{
            margin-left: 390px;
            margin-top: 50px;
        }
        .patientname span{
            font-size: 18px;
        }
        .patientname a{
            color: red;
        }
        .patientname input{
            font-size: 16px;
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            margin-left: 5px;
            padding-left: 10px;
        }
        .patienttel{
            margin-left: 373px;
            margin-top: 30px;
        }
        .patienttel span{
            font-size: 18px;
        }
        .patienttel a{
            color: red;
        }
        .patienttel input{
            font-size: 16px;
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            margin-left: 5px;
            padding-left: 10px;
        }

        .uploadcase{
            margin-left: 356px;
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
            margin-left: 12px;
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
            left: 12px;
            z-index: 1;
            white-space : nowrap
        }
        .sc{
            margin-left: 500px;
            margin-top: 50px;
        }
        .sc button{
            width: 200px;
            height: 40px;
            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            border: 0;
        }
    </style>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 申请加入医联体
        </div>
        <div class="shenqing container">
            <div class="patientname">
                <span>姓名:<a href="">*</a></span>
                <input type="text" placeholder="请输入姓名"/>
            </div>
            <div class="patienttel">
                <span>手机号:<a href="">*</a></span>
                <input type="text" placeholder="请输入手机号"/>
            </div>

            <div class="uploadcase">
                <span class="uploadcasem">申请凭证:</span>
                <div class="upload">
                    <input type="file" />
                    <img src="{{ URL::asset('home/img/add.png')}}" alt="">
                    <span class="addpicture">点击添加图片</span>
                    <span class="addjieshao">可上传图片、PDF、Excel、word</span>
                </div>
            </div>
            <div class="sc">
                <button>上传</button>
            </div>
        </div>
    </div>
@endsection
@section("footerjs")
    <script src="{{ URL::asset('home/js/info.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection