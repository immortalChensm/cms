<?php

namespace App\Http\Controllers\Api;

use App\Model\Admin\Categorys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommonController extends Controller
{
    //
    function province()
    {
        $ret = Db::table("region")->where("level",1)->get();
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

    function getPcity()
    {
        $ret = Db::table("region")->where("level",1)->get();
        foreach($ret as $k=>$item){
            $ret[$k]->child = Db::table("region")->where("parent_id",$item->id)->get();
        }
        return $this->success('请求成功',$ret);
    }



}
