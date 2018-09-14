<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;
use App\Model\Admin\Hospital;
use App\Model\Admin\Pyhsician;
use App\Model\Users;
use JWTAuth;
class AuthenticationController extends Controller
{
    //
    public function store(AuthorizationRequest $request)
    {

        $input = request()->all();
        $key = $input['key'];
        $code = \Cache::get($key);
        if(!$code){
            return $this->error('验证码已失效');
        }
        if(!hash_equals($input['code'],$code['code'])){
            return $this->error('验证码不正确');
        }
        $hospital = Hospital::where("id",$input['hospitalid'])->first();
        if(!$hospital){
            return $this->error('您选择的医院不存在');
        }
        if($hospital['code']!=$input['hospital_code']){
            return $this->error('医院代码不正确');
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

        if (!$token = auth("api")->login($user)) {
            return $this->error('注册失败');
        }
        \Cache::forget($key);
        return $this->success('注册成功',[
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60,
            'user'=>\Auth::guard("api")->user()

        ]);

    }
    public function update()
    {
        $token = auth("api")->refresh();
        return $this->success('刷新成功',[
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
    public function destroy()
    {
        auth("api")->logout();
        return $this->response->noContent();
    }

    function login(LoginRequest $request)
    {

        //app('Dingo\Api\Auth\Auth')\Auth::guard("api")
        if (!$token = auth("api")->attempt(['mobile'=>$request->mobile,'password'=>$request->password])) {
            return $this->error('账号或密码错误');
        }

        //验证医生是否可以登录
        if(auth("api")->user()->physician->status==0){
            return $this->error('此账号已经禁用');
        }

        return $this->success('登录成功',[
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
}
