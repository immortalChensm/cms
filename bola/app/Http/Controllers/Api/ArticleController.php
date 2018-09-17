<?php

namespace App\Http\Controllers\Api;

use App\Model\Admin\Banner;
use Illuminate\Http\Request;
use App\Model\Admin\Article;
class ArticleController extends Controller
{
    //
    function projects()
    {
        $keyword  = request()->keyword;
        $ret = Article::where("status",1)->where("title","LIKE","%{$keyword}%")->orderBy("created_at")->paginate(25);
        if($ret){
            $data = [];
            foreach($ret->toArray()['data'] as $k=>$item){
                $temp = [];
                $temp['id'] = $item['id'];
                $temp['title'] = $item['title'];
                $temp['created_at'] = date("Y-m-d",strtotime($item['created_at']));
                $data[] = $temp;
            }
            return $this->success("获取成功",$ret);
        }else{
            return $this->error("获取失败");
        }
    }

    function details($articleid)
    {
        $ret = Article::where("id",$articleid)->where("status",1)->first();
        if($ret){
            $ret->created_at = date("Y-m-d",strtotime($ret->created_at));
            return $this->success("获取成功",$ret);
        }else{
            return $this->error("获取失败");
        }
    }

    function banners()
    {
        $ret = Banner::where("status",1)->get();
        return $this->success("获取成功",$ret?:'');
    }
}
