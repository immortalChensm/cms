<?php

namespace App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticable;
class Admins extends Authenticable
{
    protected $rememberTokenName = '';
    protected $table = 'admins';
    protected $primary_key = 'id';
    public $timestamps = true;
    protected $guarded = [];

    protected $menu = [];

    //用户所拥有的角色
    public function roles()
    {
        return $this->belongsToMany(\App\Model\Admin\Roles::class, 'user_role', 'user_id', 'role_id')->withPivot([
            'user_id', 'role_id'
        ]);
    }

    //给用户分配一个角色
    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }

    //取消用户的角色
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }

    //判断用户是否拥有指定的角色
    public function hasRole($role)
    {
        //print_r($role);
        return !!$role->intersect($this->roles)->count();
    }

    //判断用户是否拥有指定的权限
    public function hasPermission($permission)
    {
        //TODO;;
        //当前用户的权限＝＝权限所持有的角色
        if($this->account=='admin'){
            return true;
        }
        $role = $this->roles->toArray();
        $roleIds = [];
        foreach($role as $k=>$v){
            $roleIds[] = $v['pivot']['role_id'];
        }
        $role_permissions = Roles::whereIn("id",$roleIds)->get();

        $permissionS = [];
        $menu = [];
        foreach($role_permissions as $item){
            foreach ($item->permissions as $p){

                if(strpos($p->action,"index")!==false){
                    $menu[$p->module][] = $p->title;
                }
                if(strpos($p->action,",")!==false){
                    $temp = explode(",",$p->action);
                    foreach($temp as $key=>$val){
                        $permissionS[$val] = $val;

                    }

                }else{
                    $permissionS[$p->action] = $p->action;

                }

            }
        }
        if(array_key_exists(request()->route()->getAction()['controller'],$permissionS)){
            return true;
        }else{
           return false;
        }
        $this->menu = $menu;
        //return $this->hasRole($permission->roles);
        //return true;
    }

    public function getMenu()
    {
        $role = $this->roles->toArray();
        $roleIds = [];
        foreach($role as $k=>$v){
            $roleIds[] = $v['pivot']['role_id'];
        }
        $role_permissions = Roles::whereIn("id",$roleIds)->get();
        $menu = [];
        foreach($role_permissions as $item){
            foreach ($item->permissions as $p){
                if(strpos($p->action,"index")!==false){
                    //$temp = [];
                    //$temp[$p->title] = [$p->route,$p->expression];
                    $menu[$p->module][] = [$p->title=>[$p->route,$p->expression]];
                }
            }
        }

        return $menu;
    }
}
