<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
//        if(\Auth::check()){
//            return redirect()->action('Admin\IndexController@home');
//        }
        return view('admin.index.index');
    }
}
