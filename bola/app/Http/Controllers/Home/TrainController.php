<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Article;
use App\Model\Admin\Hospital;
use App\Model\Admin\Page;
use App\Model\Admin\Train;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainController extends Controller
{
	//列表
    public function index()
    {
        $keyword  = request()->keyword;
        $ret = Train::where("status",1)->where("title","LIKE","%{$keyword}%")->orderBy("created_at")->paginate(25);
        print_r($ret->toArray());
        return $ret;
        //return view('home/abount/index');
    }


    //详情
    public function Details($articleid){

        $ret = Train::where("id",$articleid)->where("status",1)->first();
        print_r($ret->toArray());
        return $ret->toArray();
    	//return view('home/abount/milestones');
    }


}
