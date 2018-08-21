@extends('home.public.head')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/animate.min.css')}}">
@endsection
@section('content')


<div class="container_top">
    <div class="cont w1065">
        <div class="add">
			{{--@foreach($article as $news)--}}
            {{--<div class="m110 clearfix">--}}
                {{--<div class="cont_left ">--}}
                    {{--<p>{{$news->created_at}}<span> | {{$news->name}}</span></p>--}}
                    {{--<h2>{{$news->title}}</h2>--}}
                    {{--<img src="{{$news->imgurl}}" alt="">--}}
                    {{--<p>{{str_limit($news->desc,200)}}</p>--}}
                {{--</div>--}}
            {{--</div>--}}
				{{--@endforeach--}}
        </div>

        <div class="more" id="more">
            加载更多
        </div>

        <div class="foot" style="display: none;">
            <p>COPYRIGHT&copy;2006-2017 BOLAA.COM </p>
        </div>
    </div>

</div>
<img src="{{ URL::asset('home/images/top.png')}}" class="gotop" id="gotop"/>
</body>
@include("home.public.footerjs")
<script>
    $(function () {
        var htmlCenter = '', data='';
        var length=data.length;
        $.ajax({
            type:'get',
            url:"/news/newsajax",
            data:{
                page:0,
            },
            success:function(data){
                if(data){
                    htmlCenter = '', data=data;
                    length=data.length;

                    add_data(data);
                }
            },
        });


        function add_data(data) {
            var dataLen = data.length;

            for(var i=0; i<length; i++){
                var conClass = i%2==0 ? 'cont_left' : 'cont_right';
                var j = i+1;
//                htmlCenter +=  '<div class="'+conClass+' left"><h2>'+data[i].title+'</h2><p>'+data[i].time+  /news/details?id='+data[i].id+'
//                        '<span> | BOLAA</span></p><p>'+data[i].wenz+'</p><a href="##">查看详情</a></div>';
                htmlCenter+='<a href="/news/'+data[i].id+'.html" target="_blank"><div class="'+conClass+ ' left"><p>'+data[i].created_at+'<span> | BOLAA</span></p><h2>'+data[i].title+
                    '</h2><img src="'+data[i].imgurl+'" alt=""><p>'+data[i].desc+'</p></div></a>';

                if(j%2==0 || j == dataLen){
                    $(".add").append('<div class="m110 clearfix">'+htmlCenter+'</div>');
                    htmlCenter = '';
                }
            }
            window.page?window.page++:window.page=1;

        }
       $("#more").click(function () {


           $.ajax({
               type:'get',
               url:"/news/newsajax",
               data:{
                   page:window.page,
               },
               success:function(data){
                   if(data.length>0){
                       htmlCenter = '', data=data;
                       length=data.length;

                       add_data(data);



                   }else{
                        $("#more").html("没有更多了");

                   }
               },
           });


       });
    })
</script>
</html>
@endsection