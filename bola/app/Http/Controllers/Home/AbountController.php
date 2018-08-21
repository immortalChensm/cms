<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbountController extends Controller
{
	//关于博拉
    public function index()
    {
        return view('home/abount/index');
    }

    //发展历程
    public function milestones(){
    	return view('home/abount/milestones');
    }

    //博拉荣誉
    public function honor(){
    	return view('home/abount/honor');
    }

    //团队
    public function team(){
    	return view('home/abount/team');
    }


}
