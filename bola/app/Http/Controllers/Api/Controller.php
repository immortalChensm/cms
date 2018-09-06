<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    //
    use Helpers;

    public function success($ret)
    {
        return ['status'=>1,'msg'=>'请求成功','result'=>$ret];
    }

    public function error()
    {
        return ['status'=>0,'msg'=>'请求失败'];
    }
}
