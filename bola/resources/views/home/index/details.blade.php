
@extends('home.public.head')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/animate.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/my.css')}}">
@endsection
@section('content')
<div class="container_top">

    <div class="cont w1065 news_more">
        <div class="new_detail clearfix">
            <div class="w650 left">
                <h2>{{$article->title}}</h2><p>{{$article->created_at}}<span> | {{$article->name}}</span></p>
                <div class="wenz"><p style="text-align:left;">
                    {!! $article->content!!}
                </div>
            </div>
          
            <div class="w290 right">
                <ul>
                    @foreach($otherArticles as $article)
                    <a href='/news/{{$article->id}}.html'><li><p>{{$article->title}}</p><p>{{$article->created_at}}</p></li></a>
                        @endforeach
                </ul>
            </div>
        </div>
        <div class="foot">
            <p>COPYRIGHT©2006-2017 BOLAA.COM</p>
        </div>
    </div>
    </div>

</body>
    @include("home.public.footerjs")
<script>
    $(function () {
        var data=[];
        $("body").append('<img src="{{ URL::asset('home/picture/top.png')}}" class="gotop" id="gotop">');
        $(window).scroll(function () {
            if($(window).width()>1000){
                if($(window).scrollTop()>600){
                    $("#gotop").addClass("showT");
                } else{
                    $("#gotop").removeClass("showT");
                }
            }

        });
        $("#gotop").click(function(){
            $('body,html').animate({scrollTop:0},500);
            return false;
        });
        // for(var i=0;i<10;i++){
        //     $(".new_detail .w290 ul").append('<a href='+data[i].url+'><li><p>'+data[i].title+'</p><p>'+data[i].time+'</p></li></a>')
        // }
    });
</script>
</html>
@endsection