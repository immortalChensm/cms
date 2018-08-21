@extends('home.public.head')
@section('content')
<div class="container_top">
    <div class="w1065" style="padding: 0 15px;">
        <div class="platform_top">
            <h3 style="text-align: center;">博拉<sup style="font-size: 16px;">&reg;</sup>E2C数字商业平台</h3>
            <p style="text-align: center;">帮助企业实现互联网转型升级</p>
            <!--<img src="picture/iplat.png" style="width: 100%;" alt="">-->
            <img class="col-md-12 col-xs-12" src="{{ URL::asset('home/images/palt_img1.png')}}" alt="">
            <p style="text-align: left;color: #6f6f6f">以“互联网整合解决方案+互联网技术实现+互联网产品开发和运营”全程服务模式帮助企业构建互联网生意模式。从市场定位、产品研发，生产销售、客户服务乃至整个价值链和商业生态，以互联网思维进行全面重构。</p>
        </div>
        <div class="platform clearfix">
            <!--<h3>博拉<sup style="font-size: 16px;">&reg;</sup>E2C数字商业</h3>-->
            <!--<p style="margin-bottom: 40px;">企业互联网转型升级的加速器</p>-->
           
            <div class="platform_cont first first_1">
                <h2>E-Marketing</h2>
                <h3>整合数字营销平台</h3>
                <div class="wenz">
                    <p>公司的整合数字营销服务，通过精准广告技术、搜索引擎技术、聚合索引技术、各类移动互联网技术、创意互动技术等关键核心技术的应用，帮助企业构建和传播其数字化品牌，实现互联网的大规模集客和低成本引流，不断累积和扩展消费者分类大数据库资源，并通过大数据分析和挖掘技术定位精准目标人群，进而根据对消费者行为的分析和洞察，制定针对性的营销策略，提升消费者的品牌认知度和好感度，最终促进和推动实际销售。</p>
                    <p>-精准传播<br>-及时有效的消费者互动，提升用户体验<br>-潜在客户资源挖掘<br>-实时效果监测<br>-性价比高</p>
                </div>
                <img src="{{ URL::asset('home/images/6Epingtai_img2.png')}}" alt="">
            </div>
            <div class="platform_cont first first_2">
                <h2>E-Commerce</h2>
                <h3>专业电商服务平台</h3>
                <div class="wenz">
                    <p>基于对在线消费市场的长期研究和成功案例经验积累，并在对企业实际情况进行深入了解和分析的基础上，公司针对性地为企业客户提供一站式电子商务解决方案，从在线市场调研、数据分析，到电子商城搭建、在线分销渠道建设和管理、微电商、O2O、供应链及物流解决方案，以及电商整合营销推广、潜客挖掘、大数据应用，进而延展到客户关系管理、电商培训、风险控制等，为企业的电子商务体系建设提供全过程的专业服务。</p>
                    <p>-解决消费区域和时间的限制
                        <br>-科学管理，销售成本低
                        <br>-在线渠道管理效能高
                        <br>-仓储物流效率提升
                        <br>-信息更透明
                        <br>-解决支付安全问题
                        <br>-方便个性化定制服务</p>
                </div>
                <img src="{{ URL::asset('home/images/6Epingtai_img3.png')}}" alt="">
            </div>
            <div class="platform_cont">
                <h2>E-Club</h2>
                <h3>电子会员服务平台</h3>
                <div class="wenz">
                    <p>电子会员服务通过实施在线客户关系维护和管理，以及O2O线上线下联动等一系列方式，构建基于互联网模式下的新型消费者关系，加强消费者和企业之间的有效沟通，建立起客户品牌的核心用户KOL（Key Opinion Leader，关键意见领袖），发展、扩增品牌的忠实用户和粉丝群体，激发老用户群体的增值效应，并通过核心用户的真实口碑和影响力来幅射和吸引更大范围的新用户人群。</p>
                    <p>-消费者UGC（User Generated Content，指“用户原创内容“）数据挖掘，包含消费者信息挖掘、产品口碑信息挖掘与评估、用户反馈意见收集、潜在用户信息挖掘、网站调查等。
                        <br> -企业跨平台大数据整合与管理，包含用户数据管理、数据分析、品牌信息监测与分析、CRM管理、业务数据平台整合等。
                        <br> -会员管理机制和运营平台，包含在线会员平台、会员管理和激励机制、客服体系和互动形式、会员活动组织和线下运营（O2O）、用户体验优化、移动APP工具应用等。
                    </p>
                </div>
                <img src="{{ URL::asset('home/images/6Epingtai_img4.png')}}" alt="">
            </div>
            <div class="platform_cont">
                <h2>E-Media</h2>
                <h3>数字媒体</h3>
                <div class="wenz">
                    <p>数字媒体服务主要通过对企业及目标用户的专业分析，为其量身打造具有企业特性的跨平台自媒体体系，并通过该体系的运营、传播、数据挖掘和关系优化，构建起基于企业信用、企业智慧、企业公共关系、企业影响力的全新数字化品牌。在快速迭代的新媒体时代，让企业借助互联网平台更好的塑造自己的形象，也以更低的成本获取用户，以更直接的渠道影响用户，以更有效地方式推动实际销售。</p>
                    <p>-跨媒体平台覆盖泛围广（官网/社区/wiki/微博/微信…）
                        <br>-自媒体矩阵互动性强，影响力大
                        <br>-聚集精准目标受众，提升忠诚度和粉丝口碑
                        <br>-积累用户大数据，促进销售
                        <br>-更广泛的合作渠道
                    </p>
                </div>
                <img src="{{ URL::asset('home/images/6Epingtai_img5.png')}}" alt="">
            </div>
            <div class="platform_cont last last_1">
                <h2>E-Tech</h2>
                <h3>数字技术</h3>
                <div class="wenz">
                    <p>十余年的数字商业实战经验为博拉累积了雄厚的技术资源和丰富的研发经验，公司自主研发了一系列数字商业技术产品，广泛应用于企业客户构建其互联网商业形态的整个业务流程（数字营销/电子商务/电子会员服务），并可根据客户特定需求进行各类定制化互联网技术开发，从而满足企业级客户打造互联网生意模式的全方位技术需求。以互联网技术产品驱动数字商业的超前模式，使公司在目前的数字商业服务市场上保持领先地位。</p>
                    <p>主要技术研发方向：
                        <br>-大数据分析
                        <br>-电子商务及分销渠道管理
                        <br>-精准广告及搜索引擎应用
                        <br> -CRM在线客户关系管理
                        <br> -在线创意展示（游戏/视频/VR/AR…）
                        <br> -移动应用开发（ios/Android/H5…）
                        <br> -供应链及物流管理
                        <br>  -物联网应用
                        <br>-垂直行业及功能定制技术开发
                    </p>
                </div>
                <img src="{{URL::asset('home/images/6Epingtai_img6.png')}}" alt="">
            </div>
            <div class="platform_cont last">
                <h2>E-Training</h2>
                <h3>数字培训</h3>
                <div class="wenz">
                    <p>数字培训是为了解决传统企业在互联网思维、资源、人才、技术上的瓶颈，从而针对性地对企业相关人员进行互联网知识的系列化培训教育。博拉数字培训业务融合了博拉团队深厚的技术基因与丰富的营销经验，旨在提供线上线下综合一体的数字技术和营销的培训教学。E-training的启动完善了博拉E2C数字<br>商业平台的布局，也为更多的企业培养专业化的数字技术和营销人才体系，进一步推动企业互联网转型升级的进程。</p>
                </div>
                <img src="{{URL::asset('home/images/6Epingtai_img7.png')}}" alt="">
            </div>
        </div>
        <div class="foot">
            <p>COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
        </div>
    </div>
</div>
<img src="{{URL::asset('home/images/top.png')}}" class="gotop" id="gotop">
</body>
    @include("home.public.footerjs")

</html>
@endsection