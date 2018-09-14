<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>
        @foreach($sys as $item)
            @if($item->name=='webtitle')
                {{$item->value}}
                @endif
            @endforeach
    </title>
    <script src="{{URL::asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('layer/layer.js')}}"></script>
    {{--<!-- Bootstrap -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">--}}
    {{--<!-- Font Awesome -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">--}}
    {{--<!-- NProgress -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">--}}
    {{--<!-- iCheck -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">--}}

    {{--<!-- bootstrap-progressbar -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">--}}
    {{--<!-- JQVMap -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>--}}
    {{--<!-- bootstrap-daterangepicker -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">--}}

    {{--<!-- Custom Theme Style -->--}}
    {{--<link href="{{URL::asset('gentelella/build/css/custom.min.css')}}" rel="stylesheet">--}}

    {{--<!-- NProgress -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">--}}

    {{--<!-- bootstrap-datetimepicker -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">--}}
    {{--<!-- Ion.RangeSlider -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/normalize-css/normalize.css')}}" rel="stylesheet">--}}
    {{--<link href="{{URL::asset('gentelella/vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">--}}
    {{--<link href="{{URL::asset('gentelella/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">--}}
    {{--<!-- Bootstrap Colorpicker -->--}}
    {{--<link href="{{URL::asset('gentelella/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">--}}

    {{--<link href="{{URL::asset('gentelella/vendors/cropper/dist/cropper.min.css')}}" rel="stylesheet">--}}

    <!--*****************************************-->

    <link href="{{URL::asset('gentelella/vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{URL::asset('gentelella/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">


    <!---->
    <link href="{{URL::asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::asset('vendors/nprogress/nprogress.css" rel="stylesheet')}}">
    <!-- iCheck -->
    <link href="{{URL::asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{URL::asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">

    <!-- bootstrap-datetimepicker -->
    <link href="{{URL::asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">

    <!-- bootstrap-daterangepicker -->
    <script src="{{URL::asset('vendors/moment/min/moment.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Custom Theme Style -->
    <link href="{{URL::asset('build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('build/css/ait.css')}}">


</head>


