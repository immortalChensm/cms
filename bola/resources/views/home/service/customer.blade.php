@extends('home.public.head')
@section('content')
<div class="container_top">
	<div class="w1200" style="padding: 0 15px;">
		<div class="about_top customer_top">
			<h4>博拉<sup style="font-size: 16px;">®</sup>已服务超过</h4>
			<h4>300家国际国内知名品牌</h4>
		</div>
		<img src="{{ URL::asset('home/images/itree.png')}}" style="width: 100%; margin-top: 30px;" alt="">
		@foreach($brand as $val)
		<div class="customerbox">
			<p>{{$val->name}}</p>
			@foreach($val->list as $v)
			<img src="http://bola.mppstore.com/{{$v->image}}" alt="">
			@endforeach
		</div>
		@endforeach
		<div class="foot">
			<p>COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
		</div>
	</div>
</div>
<img src="{{ URL::asset('home/images/top.png')}}" class="gotop" id="gotop">
</body>
    @include("home.public.footerjs")

</html>
@endsection