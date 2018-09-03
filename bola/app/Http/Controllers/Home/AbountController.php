<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Page;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbountController extends Controller
{
	//关于我们
    public function index()
    {
        $ret = Page::whereIn("title",["关于我们","联系我们"])->get();
        return $ret;
        //return view('home/abount/index');
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
