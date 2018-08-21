<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use baidu\Controller\UploadController;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __get($name)
    {
        // TODO: Implement __get() method.
        if($name=="UploadController"){
            return new UploadController();
        }
    }

    public function __construct()
    {
        $sys = DB::table("config")->get();
        print_r(\Auth::user());
        file_put_contents("/mnt/bola/bola/init.log",\Auth::user());

    }
}
