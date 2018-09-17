@extends("home.public.main")
@section("title")
    转诊申请
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/referralapplication.css')}}"/>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 转诊申请
        </div>
        <div class="shenqing container">
            <div class="patientname">
                <span>病人姓名:<a href="">*</a></span>
                <input type="text" placeholder="请输入病人姓名"/>
            </div>
            <div class="patienttel">
                <span>病人电话:<a href="">*</a></span>
                <input type="text" placeholder="请输入病人电话"/>
            </div>
            <div class="patientdescribe">
                <span>病情描述:<a href="">*</a></span>
                <textarea placeholder="请输入病情描述（150字以内）"></textarea>
            </div>
            <div class="patientdescribe">
                <span>转院要求:<a href="">*</a></span>
                <textarea placeholder="请输入转院要求（150字以内）"></textarea>
            </div>
            <div class="uploadcase">
                <span class="uploadcasem">上传病历:</span>
                <div class="upload">
                    <input type="file" />
                    <img src="../img/add.png" alt="">
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
    <script src="{{ URL::asset('home/js/doctors.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection