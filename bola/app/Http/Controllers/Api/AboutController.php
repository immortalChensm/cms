<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\Admin\Page;
class AboutController extends Controller
{
    //
    public function contact()
    {
        $ret = Page::all();
        if($ret){

            return $this->success("获取成功",$ret);
        }else{

            return $this->error("获取成功");
        }

    }
}
