<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    //
    use Helpers;

    public function success($msg,$data)
    {
        $data = ['status_code'=>1,'message'=>$msg,'data'=>$data];
        //header();
        //// 响应类型
        //header('Access-Control-Allow-Methods:POST');
        //// 响应头设置
        //header('Access-Control-Allow-Headers:x-requested-with,content-type');
        return $this->response->array($data)->withHeader('Access-Control-Allow-Origin','*')->withHeader('Access-Control-Allow-Methods','GET,POST')->withHeader('Access-Control-Allow-Headers','x-requested-with,content-type');
    }

    public function error($msg)
    {
        $data = ['status_code'=>0,'message'=>$msg];
        return $this->response->array($data)->withHeader('Access-Control-Allow-Origin','*')->withHeader('Access-Control-Allow-Methods','GET,POST')->withHeader('Access-Control-Allow-Headers','x-requested-with,content-type');
    }

    public function checkLogin()
    {
        $user = \Auth::guard("api")->user();
        if(isset($user->id) && !empty($user->id)){
            return true;
        }else{
            return false;
        }
    }
}
