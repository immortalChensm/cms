@extends("home.public.main")
@section("title")
    转诊记录
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/referralrecord.css')}}"/>

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
                <input type="text" placeholder="病人姓名"/>
                <button type="button"></button>
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
                    <tr>
                        <td>王琦</td>
                        <td>18923684568</td>
                        <td>多无发热、咳痰等典型症状，也有少数有症状或无症状。首发症状为呼吸急促及呼吸困难，或有意识障碍、嗜睡、脱水、食欲减退等。</td>
                        <td>应根据病菌种类及药敏结果选择用药。如有缺氧等症状给予吸氧和对症处理。防治并发症。加强老年患者的护理工作，饮食宜清淡，易消化。</td>
                        <td>未处理</td>
                        <td><img src="../img/download.png" ></td>
                        <td>暂无</td>
                        <td><button id="button4" type="button">取消</button></td>
                    </tr>
                    <tr>
                        <td>张莉</td>
                        <td>18923684568</td>
                        <td>多无发热、咳痰等典型症状，也有少数有症状或无症状。首发症状为呼吸急促及呼吸困难，或有意识障碍、嗜睡、脱水、食欲减退等。</td>
                        <td>应根据病菌种类及药敏结果选择用药。如有缺氧等症状给予吸氧和对症处理。防治并发症。加强老年患者的护理工作，饮食宜清淡，易消化。</td>
                        <td>已取消</td>
                        <td><img src="../img/download.png" ></td>
                        <td>暂无</td>
                        <td><button id="button5" type="button">取消</button></td>
                    </tr>
                    <tr>
                        <td>张莉</td>
                        <td>18923684568</td>
                        <td>多无发热、咳痰等典型症状，也有少数有症状或无症状。首发症状为呼吸急促及呼吸困难，或有意识障碍、嗜睡、脱水、食欲减退等。</td>
                        <td>应根据病菌种类及药敏结果选择用药。如有缺氧等症状给予吸氧和对症处理。防治并发症。加强老年患者的护理工作，饮食宜清淡，易消化。</td>
                        <td>已处理</td>
                        <td><img src="../img/download.png" ></td>
                        <td>上海同济医院</td>
                        <td><button id="button6" type="button">取消</button></td>
                    </tr>


                </table>
            </div>

        </div>
    </div>
    <div id="tanc04" class="tanchuang1">
        <div class="tanc">
        </div>
        <div class="tc">
            <div class="qidai">
                <img src="../img/tisi.png" >
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
        <script src="{{ URL::asset('home/js/profile.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection