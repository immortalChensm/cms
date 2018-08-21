@extends('home.public.head')
@section('content')
<div class="container_top">
	<div class="index-row w1200 about" style="padding: 0 15px;">
		<div class="about_box" style="clear: both; padding: 0;">
			<div class="platform_top">
				<h3 style="text-align: center;">博拉<sup style="font-size: 16px;">&reg;</sup>获得的资质</h3>
				<p style="text-align: center; height: auto;">高新技术企业、国家商务部电子商务示范单位、4A会员企业、中国国际公共关系协会A类会员、上海市数字营销专业委员会副主任单位、虚拟现实产业联盟会员单位、重庆市互联网+试点单位、云计算服务试点单位、电子商务协会常务理事单位、服务外包产业协会理事单位、服务外包示范单位、企业技术中心认证、优秀互联网信息服务企业、上海信息服务业行业协会理事单位......</p>
			</div>
			<div class="col-md-12 col-xs-12 index-box" style="height: auto; float: none; margin-bottom: 60px;">
				<i class="ihonor"><img src="{{ URL::asset('home/images/ihonor1.jpg')}}" alt=""></i>
			</div>
		</div>
		<div class="about_box" style="clear: both; padding: 0;">
			<div class="platform_top">
				<h3 style="text-align: center;">博拉<sup style="font-size: 16px;">&reg;</sup>获得的业界荣誉</h3>
				<p style="text-align: center; height: auto;">中国互联网协会金网奖、最佳互联网数字营销企业奖、中国互联网+行业最佳解决方案奖、大数据应用解决方案提供商TOP100、金投赏奖、华尊奖中国企业十佳创新案例奖、数字营销服务客户满意第一品牌、成功营销杂志最佳内容营销公司奖、整合数字营销金鼠标奖、社交网络营销金蜜蜂奖、上海市公共关系协会优秀传播奖、中国经典传播虎啸大奖、TMA移动营销大奖、中国广告主金远奖、最佳数字营销创新奖、德勤中国重庆高科技高成长20强……</p>
			</div>
			<div class="col-md-12 col-xs-12 index-box" style="height: auto; float: none; margin-bottom: 60px;">
				<i class="ihonor"><img src="{{ URL::asset('home/images/ihonor2.jpg')}}" alt=""></i>
			</div>
		</div>
		<div class="about_box last" style="clear: both; padding: 0;">
			<div class="platform_top">
				<h3 style="text-align: center;">博拉<sup style="font-size: 16px;">&reg;</sup>自主研发的软件产品</h3>
				<p style="text-align: center; height: auto;">公司自主研发了涉及互联网信息监测、数据分析、移动应用、电子商务、数字营销、客户关系管理、VR/AR、智慧社区、物流管理等主要应用方向的近百款互联网软件产品，构建起了功能强大的数字商业技术服务体系。</p>
			</div>
			<div class="col-md-12 col-xs-12 index-box" style="height: auto; float: none; margin-bottom: 60px;">
				<i class="ihonor"><img src="{{ URL::asset('home/images/ihonor3.jpg')}}" alt=""></i>
			</div>
		</div>
		<!--<div class="about_box" style="clear: both; padding: 0;">-->
			<!--<div class="platform_top">-->
				<!--<h3 style="text-align: center;">自主研发的软件产品</h3>-->
				<!--<p style="text-align: center; height: auto;">全景微营销系统、微电商系统、企业品牌卫士系统、精准广告联盟系统、移动营销系统、客户关系管理系统、电子商务外包管理平台。</p>-->
			<!--</div>-->
			<!--<div class="col-md-12 col-xs-12 index-box" style="height: auto; float: none; margin-bottom: 60px;">-->
				<!--<i class="ihonor"><img src="picture/ihonor4.jpg" alt=""></i>-->
			<!--</div>-->
		<!--</div>-->
				
		<div class="foot">
			<p style="height: auto;">COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
		</div>
	</div>
</div>
<img src="{{ URL::asset('home/images/top.png')}}" class="gotop" id="gotop">
</body>
    @include("home.public.footerjs")

</html>
@endsection