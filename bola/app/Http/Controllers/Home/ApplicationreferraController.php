<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JasonGrimes\Paginator;
class ApplicationreferraController extends Controller
{

    function referralapplication()
    {

        return view('home/index/referralapplication');
    }


}
