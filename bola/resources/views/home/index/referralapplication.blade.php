@extends("home.public.main")
@section("title")
    转诊申请
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/referralapplication.css')}}"/>
    <style>
        .patientt{
            margin-left: 355px;
            margin-top: 20px;
        }
        .patientt select{
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            background-color:#ffffff;
            margin-left: 2px;
            padding-left: 8px;
            font-size: 16px;
            color: #999999;
            /* margin-top: 20px; */
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url({{ URL::asset('home/img/xiala1.png')}}) no-repeat center right 10px;
        }
        .patientt span{
            font-size: 18px;
        }
        .patientt a{
            color: red;
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
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 转诊申请
        </div>
        <form id="postform">
        <div class="shenqing container">
            <div class="patientname">
                <span>病人姓名:<a href="">*</a></span>
                <input type="text" placeholder="请输入病人姓名" name="name"/>
            </div>
            <div class="patienttel">
                <span>病人电话:<a href="">*</a></span>
                <input type="text" placeholder="请输入病人电话" name="mobile"/>
            </div>
            <div class="patientdescribe">
                <span>病情描述:<a href="">*</a></span>
                <textarea placeholder="请输入病情描述（150字以内）" name="description"></textarea>
            </div>
            <div class="patientt">
                <span>患者病情:<a href="">*</a></span>
                <select name="ill_desc" id="">
                    <option value="">请选择患者病情</option>
                    <option value="急">急</option>
                    <option value="危">危</option>
                    <option value="重">重</option>
                    <option value="一般">一般</option>
                </select>
            </div>
            <div class="patientt">
                <span>呼吸支持:<a href="">*</a></span>
                <select name="ill_breath" id="">
                    <option value="">请选择呼吸支持</option>
                    <option value="吸氧">吸氧</option>
                    <option value="无创">无创</option>
                    <option value="有创">有创</option>
                    <option value="ECMO">ECMO</option>
                </select>
            </div>
            <div class="patientt">
                <span>病房需求:<a href="">*</a></span>
                <select name="ill_room" id="">
                    <option value="">请选择病房需求</option>
                    <option value="RICU">RICU</option>
                    <option value="普通病区">普通病区</option>
                </select>
            </div>
            <div class="patientt">
                <span>转运需求:<a href="">*</a></span>
                <select name="ill_transfer" id="">
                    <option value="">请选择转运需求</option>
                    <option value="救护车">救护车</option>
                    <option value="直升机">直升机</option>
                    <option value="接诊">接诊</option>
                    <option value="送诊">送诊</option>
                </select>
            </div>
            <div class="patientt">
                <span>时间需求:<a href="">*</a></span>
                <select name="ill_ntime" id="">
                    <option value="">请选择时间需求</option>
                    <option value="8小时">8小时</option>
                    <option value="24小时">24小时</option>
                    <option value="72小时">72小时</option>
                </select>
            </div>
            <div class="uploadcase">
                <span class="uploadcasem">上传病历:</span>
                <div class="upload">
                    <input type="file" id="image"/>
                    <img src="{{ URL::asset('home/img/add.png')}}" alt="">
                    <span class="addpicture">点击添加图片</span>
                    <span class="addjieshao">可上传图片、PDF、Excel、word</span>
                </div>
            </div>
            <div class="sc">
                <a onclick="submitS()" id="btn">上传</a>
            </div>
        </div>
        </form>
    </div>

@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/application.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection