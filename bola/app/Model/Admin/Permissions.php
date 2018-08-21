<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    //
    protected $table = "permissions";

    protected $guarded = [];

    //得到该权限属于哪个权限
    public function roles()
    {
        return $this->belongsToMany(\App\Model\Admin\Roles::class,'role_permission','permission_id','role_id')->withPivot(['role_id','permission_id']);
    }


}
