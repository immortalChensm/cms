<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PositionController extends Controller
{
	//服务内容
    public function index()
    {
        $list = DB::table('position')->where(['status'=>'1'])->get();
        return view('home/position/index',compact('list'));
    }
}
