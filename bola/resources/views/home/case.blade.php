<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>博拉网络</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{URL::asset('home/js/jquery-1.12.2.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{URL::asset('home/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('home/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{URL::asset('home/js/my.js')}}" type="text/javascript" charset="utf-8"></script>
    <link href="{{URL::asset('home/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('home/css/my.css')}}"/>
</head>
<body id="scroll-1">
@include("layout.home.nav")
<div class="container_top">
    <div class="index-row w1200" style="margin-top: 120px;padding: 0 10px;">
       <div id="content"></div>
<!--
        <div class="more" id="more">
            加载更多
        </div>
-->
        <div class="foot">
            <p style="height: auto;">COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
        </div>
    </div>
</div>
<img src="{{URL::asset('home/picture/top.png')}}" class="gotop" id="gotop">
</body>
<script>
    $(function () {
        var data = [
			{id: '001', src: 'images/success_01.png', text: '新零售整体解决方案'},
			{id: '001', src: 'images/success_02.png', text: '汽车销售及交车系统'},
			{id: '001', src: 'images/success_03.png', text: '电子商务渠道管理平台'},
			{id: '001', src: 'images/case/success_04.png', text: '境外投资服务平台'},
			{id: '001', src: 'images/case/success_05.png', text: '线上博物馆：物联网在线体验区'},
			{id: '001', src: 'images/case/success_09.gif', text: 'VR虚拟现实技术开发'},
			{id: '001', src: 'images/case/success_07.png', text: 'O2O生态圈系统'},
			{id: '001', src: 'images/case/success_08.png', text: '手机游戏开发'},
			{id: '001', src: 'images/case/success_06.png', text: '360°全景看房系统'},
			{id: '001', src: 'images/case/success_10.png', text: '电子税务局平台建设'},
			{id: '001', src: 'images/case/success_11.png', text: '销售电子手册APP开发(IOS+Android)'},
			{id: '001', src: 'images/case/success_12.png', text: '会议邀请函HTML5开发'},
			{id: '001', src: 'images/case/success_13.png', text: '人脸识别趣味互动游戏'},
			{id: '001', src: 'images/case/success_14.png', text: 'O2O主题传播活动'},
			{id: '001', src: 'images/case/success_15.png', text: 'O2O主题传播活动'},
			{id: '001', src: 'images/case/success_16.png', text: '集团官网建设'},
			{id: '001', src: 'images/case/success_17.png', text: '云集客大数据分析系统'},
			{id: '001', src: 'images/case/success_18.png', text: '电商大型促销活动运营与推广'},
			{id: '001', src: 'images/case/success_19.png', text: '微客服平台开发'},
			{id: '001', src: 'images/case/success_20.png', text: '外贸电子商城开发'},
			{id: '001', src: 'images/case/success_21.png', text: '微团购系统开发'},
			{id: '001', src: 'images/case/success_22.png', text: '电视千人峰会直播'},
			{id: '001', src: 'images/case/success_23.png', text: '金融模拟交易系统APP开发'},
			{id: '001', src: 'images/case/success_24.png', text: '“日行万步”计步器APP开发'},
			{id: '001', src: 'images/case/success_25.png', text: 'MO&CO新品发布会AR技术应用'},
			{id: '001', src: 'images/case/success_26.png', text: '智慧社区APP移动应用技术开发'},
			{id: '001', src: 'images/case/success_27.png', text: 'HTML5在线集客活动'},
			{id: '001', src: 'images/case/success_28.png', text: '在线集客/互动传播'},
			{id: '001', src: 'images/case/success_29.png', text: '微电影创意传播'},
			{id: '001', src: 'images/case/success_30.png', text: '用户跨界主题营销活动'},
			{id: '001', src: 'images/case/success_31.png', text: '360°全景看车系统开发'},
			{id: '001', src: 'images/case/success_32.png', text: 'HTML5游戏开发'},
			{id: '001', src: 'images/case/success_33.png', text: 'HTML5车展邀请函：重力感应特效技术开发'},
			{id: '001', src: 'images/case/success_34.png', text: 'HTML5车展邀请函：视频+3D技术开发'},
			{id: '001', src: 'images/case/success_35.png', text: '语音导游系统开发'},
			{id: '001', src: 'images/case/success_36.png', text: '在线主题活动（pc端+移动端）'},
			{id: '001', src: 'images/case/success_37.png', text: 'HTML5贺年卡开发'},
			{id: '001', src: 'images/case/success_38.png', text: '自媒体主题活动'},
			{id: '001', src: 'images/case/success_39.png', text: 'HTML5移动技术开发'},
			{id: '001', src: 'images/case/success_40.png', text: '微官网系统开发'},
			{id: '001', src: 'images/case/success_41.png', text: 'E-CLUB电子会员管理：会员聚合社区平台开发'},
			{id: '001', src: 'images/case/success_42.png', text: '智能家居物联网设计与开发'},
			{id: '001', src: 'images/case/success_43.png', text: '多媒体网站技术开发'},
			{id: '001', src: 'images/case/success_44.png', text: 'E-club电子会员管理：线上线下结合的车友会运营'},
			{id: '001', src: 'images/case/success_45.png', text: 'E-club会员服务管理系统'},
			{id: '001', src: 'images/case/success_46.png', text: 'HTML5移动技术开发'},
			{id: '001', src: 'images/case/success_47.png', text: '微会务系统开发'},
			{id: '001', src: 'images/case/success_48.png', text: '酒业分销及渠道管理平台'},
			{id: '001', src: 'images/case/success_49.png', text: '互联网+政务工程招标系统APP开发'},
			{id: '001', src: 'images/case/success_50.png', text: '移动电子商城建设'},
			{id: '001', src: 'images/case/success_51.png', text: 'HTML5游戏开发'}
		],
			endnum = 12;
		for(var i=0; i<(data.length > endnum ? endnum : data.length); i++){
			$('#content').append($('<div class="col-md-4 col-xs-12 casebox"><i><img src="home/'+data[i].src+'" alt="'+data[i].text+'"></i><p>'+data[i].text+'</p></div>'));
		}
		
		$(window).scroll(function() {
			if($(document).scrollTop() >= $(document).height() - $(window).height()) {
				for(i=0; i<(data.length-endnum > 12 ? 12 : data.length-endnum); i++){
					$('#content').append($('<div class="col-md-4 col-xs-12 casebox"><i><img src="home/'+data[i+endnum].src+'" alt="'+data[i+endnum].text+'"></i><p>'+data[i+endnum].text+'</p></div>'));
				}
				endnum = data.length-endnum > 12 ? endnum+12 : data.length;
				if(endnum >= data.length){
					$(this).remove();
					return;
				}
			}
		});
    });

</script>
</html>