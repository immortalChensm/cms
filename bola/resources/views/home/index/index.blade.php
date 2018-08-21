@extends('home.public.head')
@section('css')
    <style>
        .banner-video .close {
            display: block;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            background-color: #1d1c1a;
            position: absolute;
            right: -40px;
            top: 0;
            font-family: Tahoma;
            font-size: 30px;
            color: #aaa;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    @endsection
@section('content')
<div class="swiper-container index-swiper">
    <div class="swiper-wrapper">
        @foreach($banner as $val)
            <i class="swiper-slide"><img src="http://bola.mppstore.com/{{$val->image}}" alt="博聚智慧 拉手未来"></i>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
<div class="index-row w1200 clearfix">
    <div class="col-md-4 col-xs-12 index-box">
        <h3>公司简介</h3>
        <a class="move" href="info.html">more></a>
        <p>博拉网络（BOLAA）始创于2006年，公司定位为 “互联网+”全程解决方案提供商与电子平台，即通过互联网技术和服务，帮助企业规划和构建基于互联网的在线生意模式 和商业形态, 助推企业实现与互联网的接轨和转型。公司基于自主研发的E2C数字商业大数据云服务平台，向企业用户提供包括数字营销（E-Market -ing）、电商服务（E-Commerce）、电子会员管理(E-Club)、数字媒体（E-Media）、数字培训（E-Training）和数字技术开发（E-Tech）等在内的全程“互联网+”服务。 秉承“简单专注、不断进化”的企业精神和“帮助企业上网做生意”的企业使命，公司已服务超过300家的国际国内知名企业，业务涵盖汽车、快消、金融、房产、旅游、3C 等十多个主流行业，为客户创造了巨大的商业价值, 奠定了公司在国内数字商业服务领域的领先地位。</p>
    </div>
    <div class="col-md-4 col-xs-12 index-box">
        <h3>公司愿景</h3>
        <p>“帮助企业用好互联网”是博拉的企业使命！未来30年，中国作为全球最大的企业互联网市场，无数企业的互联网升级转型必缔造巨大的产业空间！博拉以奋斗者为核心，在成长中创新，矢志成为一家享誉全球的，拥有核心技术与产品平台的数字商业服务公司。</p>
    </div>
    <div class="col-md-4 col-xs-12 index-box">
        <h3>视频介绍</h3>
        <i id="video" style="cursor: pointer;"><img src="{{ URL::asset('home/images/ivedio.png') }}" alt=""></i>
        <!--<h3>成功案例</h3>-->
        <!--<i><a href="case.html"><img src="picture/index_p4.png" alt=""></a></i>-->
    </div>
    @foreach($article as $v)
    <div class="col-md-4 col-xs-12 index-box">
        <h3>{{$v->title}}</h3>
        <span class="date">{{$v->created_at}}</span>
        <i><a href="/news/{{$v->id}}.html" target="_blank"><img src="{{$v->image}}" alt=""></a></i>
    </div>
    @endforeach

</div>
<footer class="ifooter">
    <div class="w1200">
        <div class="col-md-2 col-xs-6 foot-box" style="text-align: center;">
            <a href="info.html">公司介绍</a>
            <a href="milestones.html">发展历程</a>
            <a href="honor.html">博拉荣誉</a>
            <a href="team.html">团队文化</a>
        </div>
        <div class="col-md-2 col-xs-6 foot-box" style="text-align: center;">
            <a href="platform.html">服务内容</a>
            <a href="customer.html">服务品牌</a>
            <a href="case.html">成功案例</a>
        </div>
        <div class="col-md-4 col-xs-12 foot-box" style="text-align: center;">
            <p style="width: 330px;">
                <span class="foot-box-left">重 庆</span>
                <span class="foot-box-right" style="text-align: left;">重庆市两江新区金开大道西段106号互联网产业园17栋楼（技术中心）</span>
            </p>
            <p style="width: 330px;">
                <span class="foot-box-left">北 京</span>
                <span class="foot-box-right" style="text-align: left;">北京市朝阳区建国路27号紫檀大厦A座701</span>
            </p>
            <p style="width: 330px;">
                <span class="foot-box-left">上 海</span>
                <span class="foot-box-right" style="text-align: left;">上海市徐汇区云锦路500号，绿地汇中心A座801</span>
            </p>
            <p style="width: 330px;">
                <span class="foot-box-left">广 州</span>
                <span class="foot-box-right" style="text-align: left;">广州市天河区珠江新城珠江东路28号越秀金融大厦49楼14-16单元</span>
            </p>
        </div>
        <div class="col-md-4 col-xs-12 foot-box">
            <i style="display: inline-block; width: 300px; text-align: center;"><img src="{{ URL::asset('home/images/footerlogo.png') }}" style="width: 200px;" alt=""></i>
        </div>
    </div>
    <p style="clear: both; text-align: center;">版权所有 ©2006-2017BOLAA.COM <a href="http://www.miibeian.gov.cn">渝ICP备15011108号-1</a></p>
    <img class="m_footer" src="{{ URL::asset('home/images/m_footer.png') }}" alt="">
</footer>
</body>
    @include("home.public.footerjs")
<script>
    $(function(){
        var mySwiper = new Swiper ('.swiper-container', {
            autoplay: 10000,
            loop: true,
            paginationClickable: true,
            pagination: '.swiper-pagination'
        });
        $(document).scroll(function(){
            if($(this).scrollTop() > 80){
                if(!$('.mynav').hasClass('mynav-scroll')){
                    $('.mynav').addClass('mynav-scroll');
                }
                if(!$('.dropdown-menu').hasClass('dropdown-scroll')){
                    $('.dropdown-menu').addClass('dropdown-scroll');
                }
            }else{
                if($('.mynav').hasClass('mynav-scroll')){
                    $('.mynav').removeClass('mynav-scroll');
                }
                if($('.dropdown-menu').hasClass('dropdown-scroll')){
                    $('.dropdown-menu').removeClass('dropdown-scroll');
                }
            }
        });

    $('#video').on('click', function(){
        $('body').append($('<div class="maskbox" style="display: none;">' +
            '<div class="mask">' +
                '<div class="banner-video" style="width:60%;height:60%;margin: 10% 20%;position: relative;"> '+
            '<video src="http://video.bolaae2c.com/638d2b6082fb4209b2f11afcc78bbc46/30c04762e1b6484a835e06e28ccfd8ef-5287d2089db37e62345123a1be272f8b.mp4" width="100%" controls preload autoplay style="width:100%;">' +
            '</video>' +
            '<div class="close">×</div></div></div></div>'));
        $('.maskbox').fadeToggle();
        /*$('.mask').on('click', function(){
            $('.maskbox').fadeToggle(function(){
                $('.maskbox').remove();
            });
        });*/
        $('.mask .close').on('click', function(){
            $('.maskbox').fadeToggle(function(){
                $('.maskbox').remove();
            });
        });
    });
    });
</script>
</html>
@endsection