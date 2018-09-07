<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;
use App\Model\Admin\Hospital;
use App\Model\Admin\Pyhsician;
use App\Model\Home\Users;
use JWTAuth;
class AuthenticationController extends Controller
{
    //
    public function store(AuthorizationRequest $request)
    {

        $input = request()->all();
        $key = $input['key'];
        $code = \Cache::get($key);
//        if(!$code){
//            return $this->error('验证码已失效');
//        }
//        if(!hash_equals($input['code'],$code['code'])){
//            return $this->error('验证码不正确');
//        }
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

        if (!$token = \Auth::guard('api')->login($user)) {
            return $this->error('注册失败');
        }
        \Cache::forget($key);
        return $this->success('注册成功',[
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60,
            'user'=>\Auth::guard("api")->user()

        ]);

    }
    public function update()
    {
        $token = \Auth::guard('api')->refresh();
        //return $this->respondWithToken($token);
        return $this->response->array([$token]);
    }
    public function destroy()
    {
        \Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    function login(LoginRequest $request)
    {

        if (!$token = \Auth::guard("api")->attempt(['mobile'=>$request->mobile,'password'=>$request->password])) {
            return $this->error('账号或密码错误');
        }

        return $this->success('登录成功',[
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60,
            "user"=>\Auth::guard("api")->user()
        ]);
    }
}
