<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use baidu\Controller\UploadController;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $region_parent_id = 0;
    protected $action = [];
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


    }

    public function getProvince()
    {
        return Db::table("region")->where("level",1)->get();
    }

    public function getCity()
    {
        return Db::table("region")->where("parent_id",$this->region_parent_id)->get();
    }

    public function checkPermission()
    {
        $action = substr(request()->route()->action['controller'],strrpos(request()->route()->action['controller'],'\\'));
        $this->action = explode("@",$action);
        $permission = Permission::whereRaw("action LIKE '%".$action."%'")->OrWhere("action",request()->route()->action['controller'])->first();
        if(!in_array($this->action[1],['skill'])){
            $this->middleware(['permission:'.$permission->name]);
        }

    }
}
