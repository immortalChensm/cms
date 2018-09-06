<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\BedPost;
use App\Http\Requests\Home\MemberPost;
use App\Http\Requests\Home\ReferraPost;
use App\Model\Admin\Categorys;
use App\Model\Admin\Consulation;
use App\Model\Admin\Hospital;
use App\Model\Admin\Position;
use App\Model\Admin\Pyhsician;
use App\Model\Home\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class MemberController extends Controller
{
    //
    public function userProfile()
    {
        //dd(Auth::guard("web")->user());

        print_r(Auth::guard("web")->user()->physician->toArray());
        print_r(Auth::guard("web")->user()->physician->hospital->toArray());
        return "个人资料完善页面";
    }

    //转诊申请页面
    public function referral()
    {
        return "转诊申请页面";
    }

    public function referralApplication(ReferraPost $request)
    {
        //print_r(Auth::guard("web")->user()->mobile);
        $data['name']         = $request->name;
        $data['mobile']       = $request->mobile;
        $data['description']  = $request->description;
        $data['ill_desc']     = $request->ill_desc;
        $data['ill_breath']   = $request->ill_breath;
        $data['ill_room']     = $request->ill_room;
        $data['ill_transfer'] = $request->ill_transfer;
        $data['ill_ntime']    = $request->ill_ntime;
        //患者病例附件处理
        $data['case_illfile'] = $request->case_illfile;

        $data['userid']       = Auth::guard("web")->user()->physician->id;

        if($this->addreferApp($data)){
            return "添加成功";
        }else{
            return "添加失败";
        }
    }

    //添加转诊申请
    private function addreferApp($data)
    {
        return Consulation::create($data);
    }

    //个人转诊记录
    public function referrRecord()
    {
        $ret = Consulation::where("userid",Auth::guard("web")->user()->physician->id)->get();
        return $ret;
    }

    //注册医生资料完善
    public function profile(MemberPost $request)
    {
        $hospital['bed_num']       = $request->bed_num;
        $hospital['id']            = $request->hospitalid;

        $pyhsician['id']           = $request->pyhsicianid;
        $pyhsician['subjectid']    = $request->subjectid;
        $pyhsician['skillid']      = $request->skillid;
        $pyhsician['positionid']   = $request->positionid;
        $pyhsician['introduction'] = $request->introduction;
        $pyhsician['username']     = $request->username;
        $pyhsician['status']       = 1;
        $pyhsician['recommend']    = 0;
        $pyhsician['is_validate']  = 1;
        //附件图片和医生头像处理
        $pyhsician['cert']         = $request->cert;
        $pyhsician['image']        = $request->image;
        $user['id']   = Auth::guard("web")->id();
        $user['name'] = $request->username;

//        print_r($hospital);
//        print_r($pyhsician);
//        print_r($user);

        if($this->updateHostpial($hospital)&&$this->updatePyhsician($pyhsician)&&$this->updateUser($user)){
            return "资料更新完毕";
        }else{
            return "资料更新失败";
        }
    }

    public function updateHospitalBedinfo(BedPost $request)
    {
        $hospital['bed_num']       = $request->bed_num;
        $hospital['general_bed']   = $request->general_seat;
        $hospital['icu_seat']      = $request->icu_seat;
        $hospital['id']            = Auth::guard("web")->user()->physician->hospitalid;

        if($this->updateHostpial($hospital)){
            return "床位数量更新";
        }

    }
    private function position()
    {
        return Position::where("status",1)->get();
    }

    private function subject()
    {
        return Categorys::where("parent_id",0)->get();
    }

    //更新医院的床位信息
    private function updateHostpial($hospital)
    {
        return Hospital::where("id",$hospital['id'])->update($hospital);
    }
    //完善注册医生信息
    private function updatePyhsician($physician)
    {
        return Pyhsician::where("id",$physician['id'])->update($physician);
    }
    //更新注册会员信息
    private function updateUser($user)
    {
        return Users::where("id",$user['id'])->update($user);
    }
}
