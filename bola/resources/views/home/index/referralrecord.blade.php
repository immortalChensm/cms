@extends("home.public.main")
@section("title")
    转诊记录
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/referralrecord.css')}}"/>
    <style>

        .hzbq{
            text-align: left;
            padding-left: 65px;
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
            <div class="searchk">
                <input type="text" placeholder="病人姓名" name="name" value="{{request()->name}}"/>
                <button type="button" id="search"></button>
            </div>
            <div class="tab">
                <table cellspacing="" cellpadding="">
                    <tr>
                        <th width="8%"><div>病人姓名</div></th>
                        <th width="11%"><div>病人电话</div></th>
                        <th width="22%"><div>病情描述</div></th>
                        <th width="22%"><div>转诊要求</div></th>
                        <th width="9%"><div>状态</div></th>
                        <th width="7%"><div>附件</div></th>
                        <th width="12%"><div>转诊医院</div></th>
                        <th width="9%">操作</th>
                    </tr>

                    @foreach($record as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['mobile']}}</td>
                        <td>{{$item['description']}}</td>
                        <td class="hzbq">
                            <p>患者病情:<span>{{$item['ill_desc']}}</span></p>
                            <p>呼吸支持:<span>{{$item['ill_breath']}}</span></p>
                            <p>病房需求:<span>{{$item['ill_room']}}</span></p>
                            <p>转运需求:<span>{{$item['ill_transfer']}}</span></p>
                            <p>时间需求:<span>{{$item['ill_ntime']}}</span></p>
                        </td>
                        <td>

                            @if($item['status'] == 3)
                                未处理
                                @elseif($item['status'] == 2)
                                已取消
                                @elseif($item['status'] == 1)
                                已处理
                                @endif
                        </td>
                        <td>
                            @if($item['case_illfile'])
                            <a href="{{request()->getSchemeAndHttpHost().$item['case_illfile']}}" target="_blank"><img src="{{ URL::asset('home/img/download.png')}}" ></a>
                                @else
                                无附件
                            @endif
                        </td>
                        <td>{{$item['ill_transfer']}}</td>
                        <td><button id="button" onclick="submitS('{{$item['id']}}')" type="button" data-id="{{$item['id']}}">取消</button></td>
                    </tr>
                    @endforeach


                </table>
            </div>

        </div>
    </div>
    <div id="tanc04" class="tanchuang1">
        <div class="tanc">
        </div>
        <div class="tc">
            <div class="qidai">
                <img src="{{ URL::asset('home/img/tisi.png')}}" >
                <span>确认取消转诊申请？</span>
                <div class="butt">
                    <button id="button1" class="button1">确认</button>
                    <button id="button2" class="button2">取消</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section("footerjs")
        <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
        <script src="{{ URL::asset('home/js/record.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection