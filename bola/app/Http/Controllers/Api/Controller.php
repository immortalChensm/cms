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
        return ['status_code'=>1,'message'=>$msg,'data'=>$data];
    }

    public function error($msg)
    {
        return ['status_code'=>0,'message'=>$msg];
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
