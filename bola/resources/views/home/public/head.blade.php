<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>掌心网络</title>
    @yield('css')
    <link href="{{ URL::asset('home/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('home/css/swiper.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('home/css/my.css') }}"  rel="stylesheet">
   
</head>
<body>

@include('home.public.nav')

@yield('content')

</body>