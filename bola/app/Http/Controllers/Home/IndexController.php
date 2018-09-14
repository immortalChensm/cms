<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{

    function index()
    {
        return view('home/index/index');
    }

    function hospitals()
    {
        return view('home/index/hospitals');
    }

    function hospitalsDetails()
    {
        return view('home/index/hospitals_details');
    }

    function doctors()
    {
        return view('home/index/doctors');
    }

    function doctorsDetails()
    {
        return view('home/index/doctors_details');
    }

    function referralapplication()
    {
        return view('home/index/referralapplication');
    }

    function submitsuccess()
    {
        return view('home/index/submitsuccess');
    }

    function teachtrain()
    {
        return view('home/index/teachtrain');
    }

    function teachtraindetail()
    {
        return view('home/index/teachtraindetail');
    }

    function information()
    {
        return view('home/index/information');
    }

    function informationdetail()
    {
        return view('home/index/informationdetail');
    }

    function personalcenter()
    {
        return view('home/index/personalcenter');
    }

    function alterpsw()
    {
        return view('home/index/alterpsw');
    }

    function referralrecord()
    {
        return view('home/index/referralrecord');
    }

    function bed()
    {
        return view('home/index/bed');
    }

    function jinxiuapplication()
    {
        return view('home/index/jinxiuapplication');
    }

    function joinpccm()
    {
        return view('home/index/joinpccm');
    }

    function joinpccmorocess()
    {
        return view('home/index/joinpccmorocess');
    }

    function joinprocess()
    {
        return view('home/index/joinprocess');
    }

    function joinylt()
    {
        return view('home/index/joinylt');
    }

    function referralapplicationprocess()
    {
        return view('home/index/referralapplicationprocess');
    }

    function aboutus()
    {
        return view('home/index/aboutus');
    }

    function register()
    {
        return view('home/index/register');
    }

    function login()
    {
        return view('home/index/login');
    }


}
