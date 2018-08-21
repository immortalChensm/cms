<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
	//服务内容
    public function index()
    {
        return view('home/service/index');
    }

    //服务品牌
    public function customer(){
    	$brand = DB::table('classify')->where(['status'=>'1'])->get();
        foreach ($brand as $key => $val) {
            $brand[$key]->list = DB::table('brand')->where(['pid'=>$val->id])->get();
        }
    	return view('home/service/customer', compact('brand'));
    }

    //成功案例
    public function case(){
        $case = DB::table('cates')->where(['status'=>'1'])->get();
        return view('home/service/case',compact('case'));
    }

}
