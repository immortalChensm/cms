<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Hospital;
use App\Model\Admin\Page;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
	//医院联盟列表
    public function index()
    {
        $keyword  = request()->keyword;
        $hospital = "";
        $zoneid   = "";
        $whereRaw = "";
        if ($keyword){
            $zone = Db::table("region")->where("name","LIKE","%{$keyword}%")->first();
            if($zone){
               $zoneid = $zone->id;
                switch ($zone->level){
                    case 3:
                        $whereRaw = "countyid = '{$zoneid}'";
                        break;
                    case 2:
                        $whereRaw = "cityid = '{$zoneid}'";
                        break;
                    case 1:
                        $whereRaw = "provinceid = '{$zoneid}'";
                        break;
                    default:;
                }
            }else{
                //按医院名称查询
                $whereRaw = "name LIKE '%{$keyword}%'";
            }
        }
        if(empty($whereRaw)){
            $whereRaw = "1";
        }
        $ret = Hospital::where("status",1)->whereRaw($whereRaw)->with("doctors")->orderBy("created_at")->paginate(25);
        print_r($ret->toArray());
        return $ret;
        //return view('home/abount/index');
    }


    //医院详情
    public function hospitalDetails($hospitalid){

        echo $hospitalid;
        $ret = Hospital::where("id",$hospitalid)->with("doctors")->first();
        print_r($ret->toArray());
        return $ret->toArray();
    	//return view('home/abount/milestones');
    }

    //获取指定地区下的医院列表
    public function hospitals()
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
        return $ret;
    }


}
