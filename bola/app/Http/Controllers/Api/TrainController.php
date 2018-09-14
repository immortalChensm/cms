<?php

namespace App\Http\Controllers\Api;

use App\Model\Admin\Train;
use Illuminate\Http\Request;
class TrainController extends Controller
{
    //
    function trains()
    {
        $keyword  = request()->keyword;
        $ret = Train::where("status",1)->where("title","LIKE","%{$keyword}%")->orderBy("created_at")->paginate(25);
        if($ret){
            return $this->success('请求成功',$ret);
        }else{
            return $this->error('请求失败');
        }

    }

    function details($articleid)
    {
        $ret = Train::where("id",$articleid)->where("status",1)->first();
        if($ret){
            return $this->success('请求成功',$ret);
        }else{
            return $this->error('请求失败');
        }
    }
}
