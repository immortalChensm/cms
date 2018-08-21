<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = "roles";

    protected $guarded = [];

    //查看用户所拥有的权限
    public function permissions()
    {
        return $this->belongsToMany(\App\Model\Admin\Permissions::class,'role_permission','role_id','permission_id')->withPivot(['role_id','permission_id']);
    }

    //给角色分配权限
    public function assignPermission($permission)
    {
        return $this->permissions()->save($permission);
    }

    //移除角色的权限
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    //判断该角色是否拥有指定的权限
    public function hasPermission($permission)
    {
        return $permission->contains($this->permissions());

    }
}
