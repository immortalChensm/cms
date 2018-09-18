<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JasonGrimes\Paginator;

class IndexController extends Controller
{

    function index()
    {

        $hospital = $this->getApi("GET","hospitals",['recommend'=>1])['body']['data'];
        $doctors  = $this->getApi("GET","physicians",['recommend'=>1])['body']['data'];
        $banner   = $this->getApi("GET","banners",[])['body']['data'];
        $train    = $this->getApi("GET","trains",[])['body']['data'];
        $article  = $this->getApi("GET","scienceproject",[])['body']['data'];
        $num = ['First','Second','Third','Four','Five'];
        return view('home/index/index',compact('hospital','doctors','banner','num','train','article'));
    }

//
//    function getCityData()
//    {
//        if(request()->areaid!=0){
//            $this->region_parent_id = request()->areaid;
//            $ret = $this->getCity();
//            showMsg("success",$ret);
//        }
//
//    }
//
//    function hospitalsDetails()
//    {
//        return view('home/index/hospitals_details');
//    }
//
//    function doctors()
//    {
//        return view('home/index/doctors');
//    }
//
//    function doctorsDetails()
//    {
//        return view('home/index/doctors_details');
//    }
//
//    function referralapplication()
//    {
//        return view('home/index/referralapplication');
//    }
//
//    function submitsuccess()
//    {
//        return view('home/index/submitsuccess');
//    }
//
//    function teachtrain()
//    {
//        return view('home/index/teachtrain');
//    }
//
//    function teachtraindetail()
//    {
//        return view('home/index/teachtraindetail');
//    }
//
//    function information()
//    {
//        return view('home/index/information');
//    }
//
//    function informationdetail()
//    {
//        return view('home/index/informationdetail');
//    }
//

//

//

//

//
//    function jinxiuapplication()
//    {
//        return view('home/index/jinxiuapplication');
//    }
//

//
//    function joinpccmorocess()
//    {
//        return view('home/index/joinpccmorocess');
//    }
//

//

//
    function referralapplicationprocess()
    {
        $data = $this->getContact();
        return view('home/index/referralapplicationprocess',compact('data'));
    }

    function referralrecord()
    {
        return view('home/index/referralrecord');
    }
    function aboutus()
    {
        $data = $this->getContact();

        return view('home/index/aboutus',compact('data'));
    }

    function getContact()
    {
        $ret = $this->getApi("GET","contact",[]);
        if($ret['body']['status_code']==1){
            $data = $ret['body']['data'];
        }
        return $data;
    }

    function joinprocess()
    {
        $data = $this->getContact();
        return view('home/index/joinprocess',compact('data'));
    }

    function joinylt()
    {
        return view('home/index/joinylt');
    }

    function joinpccmorocess()
    {
        $data = $this->getContact();
        return view('home/index/joinpccmorocess',compact('data'));
    }

    function joinpccm()
    {
        return view('home/index/joinpccm');
    }

    //提交加入pccm
    function Submitjoinpccm()
    {
        if(request()->post("type")=='pccm'){
            $type = 2;
        }elseif(request()->post("type")=='hospital'){
            $type = 1;
        }
        $data = [
            'username'=>request()->post("username"),
            'mobile'=>request()->post("mobile"),
            'cert'=>request()->post("image"),
            'type'=>$type,

        ];
        $ret = $this->getApi("POST","user/join/hospital",$data);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,"提交成功",$ret);
        }else{
            showMsg(0,$ret['body']['errors']);
        }

    }

    function register()
    {
        $ret = $this->getApi("GET","getAllCity",[]);
        $zone = $ret['body']['data'];
        return view('home/index/register',compact('zone'));
    }

    function login()
    {
        return view('home/index/login');
    }

    function doLogin()
    {
        $data = [
            'mobile'=>request()->post("mobile"),
            'password'=>request()->post("password"),

        ];
        $ret = $this->getApi("POST","login",$data);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            session(['user'=>$result]);
            session(['message'=>'恭喜您登录成功！']);
            session(['title'=>'登录成功']);
            if($result['user']['physician']['is_validate']==1){
                session(['url'=>'/']);
            }else{
                session(['url'=>'/user/center.html']);
            }
            showMsg(1,'登录成功');
        }else{
            showMsg(0,$ret['body']);
        }
    }

    function doRegister()
    {
        $ret = $this->getApi("POST","authentication",request()->post());
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            session(['user'=>$result]);
            session(['url'=>'/user/center.html']);
            session(['message'=>'恭喜您注册成功！']);
            session(['title'=>'注册成功']);
            showMsg(1,$result);
        }else{
            showMsg(0,$ret['body']);
        }

    }

    function loginSuccess()
    {
        return view('home/index/loginsuccess');
    }

    //个人中心
    function User()
    {
        if(request()->session()->has("user")){
            $profile = $this->getApi("GET","user/profile",['token'=>session("user")['access_token']]);

            if($profile['body']['status_code']==1){
                $profiledata = $profile['body']['data'];

            }else{
                $profiledata = [];
            }
            //print_r($profiledata);
            return view('home/index/personalcenter',compact('profiledata'));
        }else{
            return redirect("/login.html");
        }

    }

    function alterpsw()
    {
        return view('home/index/alterpsw');
    }

    function password()
    {
        $param = request()->post();
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/resetpassword",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,$ret['body']);
        }
    }

    //获取专业特长
    function skills()
    {
        $ret = $this->getApi("GET","user/profile/skills/".request()->skillid,['token'=>session("user")['access_token']]);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,'获取失败');
        }
    }

    //注册资料完善
    function profile()
    {
        $param = request()->post();
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/profile",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,'提交失败');
        }
    }

    //获取验证码
    function getCode()
    {
        $ret = $this->getApi("POST","verifycode",['mobile'=>request()->mobile]);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,'获取失败');
        }
    }

    function getAllZone()
    {
        $ret = $this->getApi("POST","getAllCity",[]);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,'获取失败');
        }
    }

    function zoneHospital()
    {
        $ret = $this->getApi("GET","zone/hospitals",['cityid'=>request()->cityid]);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,'获取失败');
        }
    }

    function bed()
    {
        return view('home/index/bed');
    }

    function bedStore()
    {
        $param = request()->post();
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/bednum",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            showMsg(0,$ret['body']);
        }
    }

}
