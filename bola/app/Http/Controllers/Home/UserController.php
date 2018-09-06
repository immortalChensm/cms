<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\ReferraPost;
use App\Http\Requests\Home\UserPosts;
use App\Model\Admin\Hospital;
use App\Model\Home\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Pyhsician;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function register()
    {
        return '注册页面';
    }

    public function login()
    {
        return "登录页面";
    }

    public function doRegister(UserPosts $request)
    {
        $input = request()->all();
        $key = $input['key'];
        $code = \Cache::get($key);
//        if(!$code){
//            showMsg('0', '验证码已失效');
//        }
//        if(!hash_equals($input['code'],$code['code'])){
//            showMsg('0', '验证码不正确');
//        }
        $hospital = Hospital::where("id",$input['hospitalid'])->first();
        if(!$hospital){
            showMsg('0', '您选择的医院不存在');
        }
        if($hospital['code']!=$input['hospital_code']){
            showMsg('0', '医院代码不正确');
        }
        unset($input['key']);
        $user = Users::create([
            "name"=>$input['mobile'],
            "password"=>bcrypt($input['password']),
            "mobile"=>$input['mobile']
        ]);

        Pyhsician::create([
            "mobile"=>$input['mobile'],
            "username"=>$input['mobile'],
            "hospitalid"=>$input['hospitalid'],
            "hospital_code"=>$input['hospital_code'],
            "userid"=>$user['id']
        ]);

        //将当用户设置为登录状态
        //echo session(["user"=>["mobile"=>$user->mobile,"userid"=>$user->id]]);
        $result = Auth::guard("web")->login($user);
        //echo \Auth::guard("web")->attempt(['mobile'=>$user->mobile,'password'=>$user->password]);
        //showMsg('1', '注册成功',URL::action('Admin\HospitalController@index'));

    }

    public function doLogin(Request $request)
    {
        $input = $request->input();
        $user = Users::where(array('mobile' => $input['mobile']))->first();
        empty($user) && showMsg('0', '账号错误或已禁用');
        if (!Hash::check($input['password'], $user->password)) {
            showMsg('0', '密码错误');
        }
        session(['admin' => $admins]);
        $user = request(['mobile','password']);
        Auth::guard("web")->attempt($user);

        echo "login success";
        //showMsg('1', '登录成功', URL::action('Admin\IndexController@home'));
    }


}
