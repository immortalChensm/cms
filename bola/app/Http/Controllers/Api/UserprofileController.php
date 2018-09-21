<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\BedPost;
use App\Http\Requests\Api\ForgotpwdRequest;
use App\Http\Requests\Api\ReferraPost;
use App\Http\Requests\Api\ResetpwdRequest;
use App\Http\Requests\Api\UserProfileRequest;
use Illuminate\Http\Request;
use App\Model\Admin\Position;
use App\Model\Admin\Categorys;
use App\Model\Users;
use App\Model\Admin\Hospital;
use App\Model\Admin\Pyhsician;
use App\Model\Admin\Consulation;
use Illuminate\Support\Facades\Hash;
class UserprofileController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth.api');

    }

    //
    function profile()
    {
        $data = [];
        $data['doctor'] = auth("api")->user()->physician->toArray();
        $data['hospital'] = auth("api")->user()->physician->hospital->toArray();
        $data['position'] = $this->position();
        $data['subject'] = $this->subject();
        $data['token'] = request()->bearerToken();

        return $this->success("ok",$data);
    }
    //完善医生个人资料
    function handleProfile(UserProfileRequest $request)
    {
        $hospital['bed_num']       = $request->bed_num;
        $hospital['id']            = $request->hospitalid;

        $pyhsician['id']           = $request->pyhsicianid;
        $pyhsician['subjectid']    = $request->subjectid;
        $pyhsician['skillid']      = $request->skillid;
        $pyhsician['positionid']   = $request->positionid;
        $pyhsician['introduction'] = $request->introduction;
        $pyhsician['username']     = $request->username;
        $pyhsician['cert']         = $request->cert;
        $pyhsician['status']       = 1;
        $pyhsician['recommend']    = 0;
        $pyhsician['is_validate']  = 1;
        //附件图片和医生头像处理
//        if($request->cert) {
//            $certPath=uploadImageForBase64($request->cert);
//            $pyhsician['cert']         = $certPath;
//        }
        if($request->image) {
            $imagePath=uploadImageForBase64($request->image);
            $pyhsician['image']        = $imagePath;
        }



        $user['id']   = auth("api")->id();
        $user['name'] = $request->username;


        if($this->updateHostpial($hospital)&&$this->updatePyhsician($pyhsician)&&$this->updateUser($user)){
            return $this->success("资料更新成功",['资料更新成功']);
        }else{
            return $this->error("资料更新失败");
        }
    }

    public function updateHospitalBedinfo(BedPost $request)
    {

        $hospital['bed_num']       = $request->bed_num;
        $hospital['general_seat']  = $request->general_seat;
        $hospital['icu_seat']      = $request->icu_seat;
        $hospital['id']            = auth("api")->user()->physician->hospitalid;

        $hospital_adminid = auth("api")->user()->physician->hospital;

        if($hospital_adminid->hospital_adminid){
            if($hospital_adminid->hospital_adminid!=auth("api")->id()){
                return $this->error("您不是该医院的管理员无法操作");
            }
        }
        if($this->updateHostpial($hospital)){
            return $this->success("床位更新成功",[]);
        }else{
            return $this->error("资料更新失败");
        }

    }

    //转诊记录
    function referrals()
    {

        $ret = Consulation::where("userid",auth("api")->user()->physician->id)->where(function($query){
            if(request()->name){
                $query->where("name",request()->name);
            }
        })->get();
        return $this->success("请求成功",$ret);
    }

    //转诊申请
    public function referralApplication(ReferraPost $request)
    {
        $data['name']         = $request->name;
        $data['mobile']       = $request->mobile;
        $data['description']  = $request->description;
        $data['ill_desc']     = $request->ill_desc;
        $data['ill_breath']   = $request->ill_breath;
        $data['ill_room']     = $request->ill_room;
        $data['ill_transfer'] = $request->ill_transfer;
        $data['ill_ntime']    = $request->ill_ntime;
        $data['image']        = $request->image;
        //患者病例附件处理
        if($request->case_illfile) {
            $certPath=uploadImageForBase64($request->case_illfile);
        }
        $data['case_illfile'] = isset($certPath)?$certPath:'';

        $data['userid']       = auth("api")->user()->physician->id;

        $hospital = Hospital::where("id",auth("api")->user()->physician->hospitalid)->first();
        if($hospital->hospital_adminid!=auth("api")->id()){
            return $this->error("您不是该医院的管理员无法操作");
        }
        if($this->addreferApp($data)){
            return $this->success("添加成功",[]);
        }else{
            return $this->error("添加失败");
        }

    }

    function updatePassword(ResetpwdRequest $request)
    {
        $oldpwd = $request->password;

        $dbpwd = Users::where("password",auth("api")->user()->getAuthPassword())->first();
        if($dbpwd){
            $data['password'] = bcrypt($oldpwd);
            if(!Hash::check($oldpwd,$dbpwd['password'])){
                return $this->error("旧密码不对");
            }
            if(Users::where("id",auth("api")->id())->update($data)){
                return $this->success("密码重置成功",['密码重置成功']);
            }else{
                return $this->error("密码重置失败");
            }
        }else{
            return $this->error("未登录或登录超时");
        }

    }

    function resetPassword(ForgotpwdRequest $request)
    {
//        return $this->success("密码重置成功",$request->all());
        $key = $request['key'];
        $code = \Cache::get($key);
        if(!$code){
            return $this->error('验证码已失效');
        }
        if(!hash_equals($request['code'],$code['code'])){
            return $this->error('验证码不正确');
        }
        \Cache::forget($key);
        if(Users::where("id",auth("api")->id())->update(['password'=>bcrypt($request['password'])])){
            return $this->success("密码重置成功",[]);
        }else{
            return $this->error("密码重置失败");
        }



    }

    function cancelreferral($id)
    {
        $ret = Consulation::where("id",$id)->where("userid",auth("api")->user()->physician->id)->update(['status'=>1]);
        return $this->success("操作成功",[]);
    }

    //添加转诊申请
    private function addreferApp($data)
    {
        return Consulation::create($data);
    }

    private function position()
    {
        return Position::where("status",1)->get();
    }

    private function subject()
    {
        return Categorys::where("parent_id",0)->get();
    }

    function skill($id)
    {
        $data = Categorys::where("parent_id",$id)->get();
        return $this->success("ok",$data?:'');
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

    function test()
    {
//        return $this->success("添加成功",[]);auth("api")->user()
        return $this->success("添加成功",[request()->all(),auth("api")->user(),request()->hasHeader('Authorization')]);
    }
}
