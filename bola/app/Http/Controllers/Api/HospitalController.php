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
        $province  = request()->province;
        $city  = request()->city;
        $county  = request()->county;
        $provinceid = "";
        $cityid = "";
        $countyid = "";
        if ($province){
            $provinceid = Db::table("region")->where("name","{$province}")->value("id");
        }
        if ($city){
            $cityid = Db::table("region")->where("name","{$city}")->value("id");
        }
        if ($county){
            $countyid = Db::table("region")->where("name","{$county}")->value("id");

        }
        $whereRaw = "";
        if ($keyword){
            $whereRaw = "name LIKE '%{$keyword}%' OR grade LIKE '%{$keyword}%' OR pccm LIKE '%{$keyword}%' ";

        }
        if(empty($whereRaw)){
            $whereRaw = "1";
        }
        $ret = Hospital::where("status",1)->where(function($query)use($provinceid,$cityid,$countyid){
            if($provinceid){
                $query->where("provinceid",$provinceid);
            }
            if($cityid){
                $query->where("countyid",$countyid);
            }
            if($countyid){
                $query->where("countyid",$countyid);
            }

        })->whereRaw($whereRaw)->with("doctors")->orderBy("created_at")->paginate(25);
        foreach($ret as $k=>$item){
            $item->doctors_num = count($item->doctors);
            $ret[$k] = $item;
            unset($item->doctors);
        }
        return $this->success("获取成功",$ret?:'');
    }

    function details($hospitalid){
        $ret = Hospital::where("id",$hospitalid)->with("doctors")->first();
        $ret->subject = $ret->subject->name;
        $ret->skill   = $this->getSkill(explode(",",$ret->skillid));
        foreach($ret->doctors as $k=>$item){
            $item->hospital = $item->hospital;
            $ret->doctors[$k] = $item;
        }
        return $this->success("获取成功",$ret?:'');
    }

    private function getSkill($id)
    {
        return Categorys::whereIn("id",$id)->get();
    }
}
