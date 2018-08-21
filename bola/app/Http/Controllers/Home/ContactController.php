<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {

        $list = DB::table('address')->where(['status'=>'1'])->get();
        return view('home/index/contact',compact('list'));
    }
}
