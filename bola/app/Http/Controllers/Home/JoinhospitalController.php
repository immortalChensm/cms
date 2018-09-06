<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\JoinrecordPost;
use App\Model\Admin\Joinrecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinhospitalController extends Controller
{
    //
    public function index()
    {
        return "加入页面";
    }

    public function joinrecord(JoinrecordPost $request)
    {
        $data['username'] = $request->username;
        $data['mobile']   = $request->mobile;
        $data['cert']     = $request->cert;
        $data['status']   = 0;

        Joinrecord::create($data);
    }
}
