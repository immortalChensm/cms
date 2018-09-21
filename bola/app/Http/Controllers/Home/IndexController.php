<?php

namespace App\Http\Controllers\Home;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use JasonGrimes\Paginator;
use Upload\File;
use Upload\Storage\FileSystem;

class IndexController extends Controller
{


    function index()
    {
        $this->getUserInfo();
        $hospital = $this->getApi("GET","hospitals",['recommend'=>1])['body']['data'];
        $doctors  = $this->getApi("GET","physicians",['recommend'=>1])['body']['data'];
        $banner   = $this->getApi("GET","banners",[])['body']['data'];
        $train    = $this->getApi("GET","trains",[])['body']['data'];
        $article  = $this->getApi("GET","scienceproject",[])['body']['data'];
        $num = ['First','Second','Third','Four','Five'];
        return view('home/index/index',compact('hospital','doctors','banner','num','train','article'));
    }

    function refreshToken()
    {
        $ret = $this->getApi("GET","refresh/token",['token'=>session("user")['access_token']]);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            return $result;
        }else{
            return false;
        }
    }

    function getCityData()
    {
        if(request()->areaid!=0){
            $this->region_parent_id = request()->areaid;
            $ret = $this->getCity();
            showMsg("success",$ret);
        }

    }
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
        $this->getUserInfo();
        return view('home/index/referralapplicationprocess',compact('data'));
    }

    //转诊申请
    function transfer()
    {

            $param = request()->post();
            $param['image'] = implode(",",$param['image']);
            $param = array_merge(['token'=>session("user")['access_token']],$param);
            $ret = $this->getApi("POST","user/referrals/application",$param);
            if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
                $result = $ret['body']['data'];
                session(['message'=>'恭喜您提交成功！']);
                session(['title'=>'提交成功']);
                session(['url'=>'/']);
                showMsg(1,$result);
            }else{
                if($ret['body']['status_code'] == 401){
                    showMsg(202,$ret['body']);
                }
                showMsg(0,$ret['body']);
            }
    }

    //转诊记录
    function referralrecord()
    {
        if(request()->session()->has("userinfo")) {
            $ret = $this->getApi("GET", "user/referrals", ['name' => request()->name ?? '', 'token' => session("user")['access_token']]);

            if (isset($ret['body']['status_code']) && $ret['body']['status_code'] == 1) {
                $record = $ret['body']['data'];

            } else {
                if ($ret['body']['status_code'] == 401) {
                    return redirect("/login.html");
                }

            }
            $this->getUserInfo();
            return view('home/index/referralrecord', compact('record'));
        }else{
            return redirect("/login.html");
        }
    }

    //转诊取消
    function cancel()
    {
        $ret = $this->getApi("POST","user/referrals/cancel/".request()->id,['token'=>session("user")['access_token']]);

        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $record= $ret['body']['data'];
            showMsg(1,"取消成功");
        }else{
            if($ret['body']['status_code'] == 401){
                showMsg(202,"登录超时");
            }

        }
    }

    function aboutus()
    {
        $data = $this->getContact();
        $this->getUserInfo();
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
        $this->getUserInfo();
        return view('home/index/joinprocess',compact('data'));
    }

    function joinylt()
    {
        $this->getUserInfo();
        return view('home/index/joinylt');
    }

    function jointrain()
    {
        $this->getUserInfo();
        return view('home/index/jointrain');
    }


    function joinpccmorocess()
    {
        $data = $this->getContact();
        $this->getUserInfo();
        return view('home/index/joinpccmorocess',compact('data'));
    }

    function joinpccm()
    {
        $this->getUserInfo();
        return view('home/index/joinpccm');
    }

    //提交加入pccm
    function Submitjoinpccm()
    {
        if(request()->post("type")=='pccm'){
            $type = 2;
        }elseif(request()->post("type")=='hospital'){
            $type = 1;
        }elseif(request()->post("type")=='train'){
            $type = 3;
        }
        $img = implode(",",(isset(request()->image)?request()->image:[]));
        $data = [
            'username'=>request()->post("username"),
            'mobile'=>request()->post("mobile"),
            'cert'=>request()->post("image"),
            'type'=>$type,
            'trainid'=>request()->trainid?request()->trainid:'',
            'image'=>$img

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
        if(!request()->session()->has("userinfo")) {
            $ret = $this->getApi("GET", "getAllCity", []);
            $zone = $ret['body']['data'];
            return view('home/index/register', compact('zone'));
        }else{
            return redirect("/");
        }
    }

    function login()
    {
        if(!request()->session()->has("userinfo")) {
            return view('home/index/login');
        }else{
            return redirect("/");
        }
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
        $this->getUserInfo();
        return view('home/index/loginsuccess');
    }

    //个人中心
    function User()
    {
        $this->getUserInfo();
        if(request()->session()->has("userinfo")){

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
        if(request()->session()->has("userinfo")) {
            $this->getUserInfo();
            return view('home/index/alterpsw');
        }else{
            return redirect("/login.html");
        }
    }

    //修改密码
    function password()
    {
        $param = request()->post();
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/resetpassword",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            if($ret['body']['status_code'] == 401){
                showMsg(202,$ret['body']);
            }
            showMsg(0,'提交失败');
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
        $param['cert'] = implode(",",$param['cert']?:[]);
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/profile",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            if($ret['body']['status_code'] == 401){
                showMsg(202,$ret['body']);
            }
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
        if(request()->session()->has("userinfo")) {
            $this->getUserInfo();
            return view('home/index/bed');
        }else{
            return redirect("/login.html");
        }
    }

    //医院床位
    function bedStore()
    {
        $param = request()->post();
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/bednum",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,$result);
        }else{
            if($ret['body']['status_code'] == 401){
                showMsg(202,$ret['body']);
            }
            showMsg(0,'提交失败');
        }
    }

    function forgotpwd()
    {
        return view("home/index/forgotpwd");
    }

    function resetPwd()
    {
        $param = request()->post();
        $param = array_merge(['token'=>session("user")['access_token']],$param);
        $ret = $this->getApi("POST","user/forgotpassword",$param);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];

            session(['url'=>'/login.html']);
            session(['message'=>'恭喜您修改成功！']);
            session(['title'=>'修改成功']);

            showMsg(1,$result);
        }else{
            if($ret['body']['status_code'] == 401){
                showMsg(202,$ret['body']);
            }
            showMsg(0,'提交失败');
        }
    }

    function upload()
    {
        $baseDir = './Uploads/join/';
        $store = new FileSystem($baseDir);
        $file = new File('file',$store);
        $new_filename = uniqid();
        $file->setName($new_filename);
        $data = array(
            'name'       => request()->getSchemeAndHttpHost().$baseDir.$file->getNameWithExtension(),
            'extension'  => $file->getExtension(),
            'mime'       => $file->getMimetype(),
            'size'       => $file->getSize(),
            'md5'        => $file->getMd5(),
            'dimensions' => $file->getDimensions(),
            'sourcename'=>request()->file("file")->getClientOriginalName()
        );
        try {
            $file->upload();
            showMsg(1,$data);
        } catch (\Exception $e) {
            showMsg(0);
        }

    }

    function logout()
    {

        $ret = $this->getApi("POST","logout",['token'=>session("user")['access_token']]);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];

            session(['url'=>'/login.html']);
            session(['message'=>'退出成功！']);
            session(['title'=>'退出登录']);

            request()->session()->forget('userinfo');
            request()->session()->forget('user');

            return redirect("/login.html");
        }else{
            if($ret['body']['status_code'] == 401){
                request()->session()->forget('userinfo');
                request()->session()->forget('user');
                return redirect("/login.html");
            }
            return redirect("/login.html");
        }
    }

}
