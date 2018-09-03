<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Model\Admin\Admins;
use App\Http\Requests\LoginPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function index(){
        if(\Auth::check()){
            return redirect()->action('Admin\IndexController@home');
        }
        return view('admin/login');
    }

    public function login(LoginPost $request){
        $input = $request->input();
        $admins = Admins::where(array('account' => $input['account'], 'status' => '1'))->first();
        empty($admins) && showMsg('0', '账号错误或已禁用');
        if (!Hash::check($input['password'], $admins->password)) {
            showMsg('0', '密码错误');
        }
        session(['admin' => $admins]);
        $user = request(['account','password']);
        \Auth::guard("admin")->attempt($user);


        showMsg('1', '登录成功', URL::action('Admin\IndexController@home'));



    }

     //退出登录
    public function logout(Request $request)
    {
         $request->session()->forget('admin');
        \Auth::logout();
         return redirect("/admin");
    }
}
