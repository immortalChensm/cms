<?php

namespace App\Http\Controllers\Api;

use App\Model\Admin\Categorys;
use Illuminate\Http\Request;
use App\Model\Admin\Pyhsician;
use Illuminate\Support\Facades\DB;
class PhysicianController extends Controller
{
    //
    function physician()
    {
        $keyword  = request()->keyword;
        $recommend  = request()->recommend;
        $hospital = "";
        $zoneid   = "";
        $whereRaw = "";
        if ($keyword){
            $zone = Db::table("categorys")->where("name","LIKE","%{$keyword}%")->first();
            if($zone){
                $zoneid = $zone->id;
                $whereRaw = "skillid LIKE '%{$zoneid}%'";

            }else{
                //按医生查询
                $whereRaw = "username LIKE '%{$keyword}%'";
            }
        }
        if(empty($whereRaw)){
            $whereRaw = "1";
        }
        $ret = Pyhsician::where(function($query)use($recommend){
            $query->where("status",1);
            if($recommend){
                $query->where("recommend",$recommend);
            }
        })->whereRaw($whereRaw)->orderBy("created_at")->paginate(25);
        $data = [];
        foreach($ret as $k=>$item){
            $data[$k]['username'] = $item->username;
            $data[$k]['id'] = $item->id;
            $data[$k]['image']    = $item->image;
            $data[$k]['hospital'] = $item->hospital->name;
            $data[$k]['introduction'] = $item->introduction;
        }
        return $this->success("请求成功",$data?:'');
    }

    //医生详情
    public function doctorsDetails($doctorid){

        $ret = Pyhsician::where("id",$doctorid)->where("status",1)->with(["subject","position"])->first();
        $ret->skill = $this->getSkill(explode(",",$ret->skillid));
        return $this->success("请求成功",$ret?:'');
    }

    private function getSkill($id)
    {
        return Categorys::whereIn("id",$id)->get();
    }
}
