<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\Admin\Hospital;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Categorys;
class HospitalController extends Controller
{
    //
    function hospitals()
    {
        $keyword  = request()->keyword;
        $provinceid  = request()->province;
        $cityid  = request()->city;
        $countyid  = request()->county;
        $recommend  = request()->recommend;
//        $provinceid = "";
//        $cityid = "";
//        $countyid = "";
//        if ($province){
//            $provinceid = Db::table("region")->where("name","{$province}")->value("id");
//        }
//        if ($city){
//            $cityid = Db::table("region")->where("name","{$city}")->value("id");
//        }
//        if ($county){
//            $countyid = Db::table("region")->where("name","{$county}")->value("id");
//
//        }
        $whereRaw = "";
        if ($keyword){
            $whereRaw = "name LIKE '%{$keyword}%' OR grade LIKE '%{$keyword}%' OR pccm LIKE '%{$keyword}%' ";

        }
        if(empty($whereRaw)){
            $whereRaw = "1";
        }
        $ret = Hospital::where("status",1)->where(function($query)use($provinceid,$cityid,$countyid,$recommend){
            if($provinceid){
                $query->where("provinceid",$provinceid);
            }
            if($cityid){
                $query->where("countyid",$countyid);
            }
            if($countyid){
                $query->where("countyid",$countyid);
            }
            if($recommend){
                $query->where("recommend",$recommend);
            }

        })->whereRaw($whereRaw)->with("doctors")->orderBy("created_at")->paginate(config("api.pagesize"));
        foreach($ret as $k=>$item){
            $item->doctors_num = count($item->doctors);
            $item->subject = $item->subject;
            $ret[$k] = $item;

            unset($item->doctors);
        }
        if($ret){
            return $this->success("获取成功",$ret?:'');
        }else{
            return $this->error("参数错误请求失败");
        }


    }

    function details($hospitalid){
        $ret = Hospital::where("id",$hospitalid)->with("doctors")->first();
        if(!$ret){
            return $this->error("参数错误请求失败");
        }
        $ret->subject = $ret->subject->name;
        $ret->skill   = $this->getSkill(explode(",",$ret->skillid));
        foreach($ret->doctors as $k=>$item){
            $item->hospital = $item->hospital;
            $ret->doctors[$k] = $item;
        }
        if($ret){
            return $this->success("获取成功",$ret?:'');
        }else{
            return $this->error("参数错误请求失败");
        }
    }

    private function getSkill($id)
    {
        return Categorys::whereIn("id",$id)->get();
    }

    //获取指定地区下的医院列表
    public function zonehospitals()
    {
        $provinceid = request()->provinceid;
        $cityid     = request()->cityid;
        $countyid   = request()->countyid;
        $ret = Hospital::where(function($query)use($provinceid,$cityid,$countyid){
            if($provinceid){
                $query->where("provinceid",$provinceid);
            }
            if($cityid){
                $query->where("cityid",$cityid);
            }
            if($countyid){
                $query->where("countyid",$countyid);
            }
        })->get();
        if($ret){
            return $this->success("获取成功",$ret?:'');
        }else{
            return $this->error("参数错误请求失败");
        }
    }
}
