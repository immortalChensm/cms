<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\GuestRequest;
use Illuminate\Http\Request;
use App\Model\Admin\Hospital;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Categorys;
use App\Model\Admin\Joinrecord;
class GuestController extends Controller
{
    //
    function joinHospital(GuestRequest $request)
    {
        $data['username'] = $request->username;
        $data['mobile']   = $request->mobile;
        $data['status']   = 0;
        $data['type']     = $request->type;
        if($request->cert) {
            $certPath=uploadImageForBase64($request->cert);
        }
        $data['cert'] = isset($certPath)?$certPath:'';
        if($record=Joinrecord::create($data)){
            return $this->success("添加成功",$record);
        }else{
            return $this->error("添加失败");
        }
    }
}
