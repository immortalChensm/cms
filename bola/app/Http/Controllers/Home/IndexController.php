<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use jq\Test;
use phpQuery;


class IndexController extends Controller
{

    public function index()
    {
//        $banner = DB::table('banner')->where(['status'=>'1'])->get();
//        $article = DB::table('article')->where(['status'=>'1','is_recommend'=>'1'])->paginate(3);
//        foreach ($article as $key => $val) {
//            $article[$key]->image = $this->get_image($val->content,'img')['html'][0];
//            $article[$key]->created_at = date("Y-m-d",strtotime($val->created_at));
//        }

        return view('home/index/index');
    }

    
function get_image($html,$markup){
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
