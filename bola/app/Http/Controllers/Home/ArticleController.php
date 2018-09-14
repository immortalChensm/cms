<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Article;
use App\Model\Admin\Hospital;
use App\Model\Admin\Page;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	//列表
    public function index()
    {
//        $keyword  = request()->keyword;
//        $ret = Article::where("status",1)->where("title","LIKE","%{$keyword}%")->orderBy("created_at")->paginate(25);
//        print_r($ret->toArray());
//        return $ret;
        return view('home/abount/index');
    }


    //详情
    public function Details($articleid){

        $ret = Article::where("id",$articleid)->where("status",1)->first();
        print_r($ret->toArray());
        return $ret->toArray();
    	//return view('home/abount/milestones');
    }


}
