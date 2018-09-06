<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Hospital;
use App\Model\Admin\Page;
use App\Model\Admin\Pyhsician;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
	//医院联盟列表
    public function index()
    {
        $keyword  = request()->keyword;
        $hospital = "";
        $zoneid   = "";
        $whereRaw = "";
        if ($keyword){
            $zone = Db::table("categorys")->where("name","LIKE","%{$keyword}%")->first();
            if($zone){
               $zoneid = $zone->id;
               $whereRaw = "subjectid = '{$zoneid}'";

            }else{
                //按医生查询
                $whereRaw = "username LIKE '%{$keyword}%'";
            }
        }
        if(empty($whereRaw)){
            $whereRaw = "1";
        }
        $ret = Pyhsician::where("status",1)->whereRaw($whereRaw)->orderBy("created_at")->paginate(25);
        print_r($ret->toArray());
        return $ret;
        //return view('home/abount/index');
    }


    //医生详情
    public function doctorsDetails($doctorid){

        $ret = Pyhsician::where("id",$doctorid)->where("status",1)->with(["subject","skill","position"])->first();
        print_r($ret->toArray());
        return $ret->toArray();
    	//return view('home/abount/milestones');
    }




}
