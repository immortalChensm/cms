<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VerifycodeRequest;
use Illuminate\Http\Request;
class VerifycodeController extends Controller
{
    //
    public function code(VerifycodeRequest $request)
    {
        $phone = $request->phone;
            // 生成4位随机数，左侧补0
        $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);

//        try {
//            $result = "验证码发送处理";
//        } catch () {
//            $ret = "验证码发送异常处理";
//        }

        $key = 'verificationCode_'.str_random(15);
        $expiredAt = now()->addMinutes(10);
        // 缓存验证码 10分钟过期。
        \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

//        return [
//            "status"=>1,
//            "key"=>$key,
//            "code"=>"暂时测试的code:".$code
//        ];
        return $this->success("获取成功",['verifykey'=>$key,'verifycode'=>$code]);

    }
}
