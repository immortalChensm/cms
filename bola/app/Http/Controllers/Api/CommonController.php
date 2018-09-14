<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommonController extends Controller
{
    //
    function province()
    {
        $ret = Db::table("region")->where("level",1)->get();;
        if($ret){
            return $this->success('请求成功',$ret);
        }else{
            return $this->error('请求失败');
        }

    }

    public function city($pid)
    {
        $ret = Db::table("region")->where("parent_id",$pid)->get();
        return $this->success('请求成功',$ret);
    }
}
