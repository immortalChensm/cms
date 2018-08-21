<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use jq\Test;
use phpQuery;

class NewsController extends Controller
{

    public function index()
    {


        $article = DB::table('article')->where(['status'=>'1','is_recommend'=>'1'])->paginate(20);
         foreach ($article as $key => $val) {
             $article[$key]->imgurl = $this->jqhtml($val->content,'img')['html'][0];
             $article[$key]->desc = $this->jqhtml($val->content,'p')['html'][0];
         }
        return view('home/index/news', compact('article'));
    }

    public function newsajax()
    {
        $page = request("page");

        $article = DB::table('article')->where(['status'=>'1','is_recommend'=>'1'])->offset(($page?$page:0)*20)->limit(20)->get();
        foreach ($article as $key => $val) {
            $article[$key]->imgurl = $this->jqhtml($val->content,'img')['html'][0];

            $article[$key]->created_at = date("Y-m-d",strtotime($val->created_at));
            $article[$key]->desc = $this->jqhtml($val->content,'p')['html'][0];
        }
        return response()->json($article);
    }

    public function details($id)
    {
        $articleId = $id;//request("id");
        $article = Db::table("article")->where("id",$articleId)->first();
        $article->created_at = date("Y-m-d",strtotime($article->created_at));
        $otherArticles = Db::table("article")->orderBy("created_at","desc")->limit(10)->get();
        foreach ($otherArticles as $key => $val) {

            $otherArticles[$key]->created_at = date("Y-m-d",strtotime($val->created_at));
            
        }
        return view("home/index/details",compact("article",'otherArticles'));
    }

    public function jqhtml($html,$markup)
    {
        $data = [];
        phpQuery::newDocument($html);
        $doc = pq($markup);
        if($markup=='img'){
            foreach ($doc as $img) {
                $data['html'][] = $img -> getAttribute('src');
            }
        }elseif($markup=='p'){
            $temp = [];
            foreach ($doc as $p) {
                $text = $p->textContent;
                if($text){
                    $temp[] = $text;
                }
            }
            $data['html'][] = implode("",$temp);

        }

        return $data;
    }

}
