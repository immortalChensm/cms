<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Roles;
use App\Http\Requests\RolesPost;
use App\Http\Requests\UpdateRolePost;
use Illuminate\Support\Facades\URL;
use App\Model\Admin\Permissions;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Roles::paginate(10);
        return view("admin.role.index",compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.role.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesPost $request)
    {
        //
        $input = $request->except('_token','s');
        Roles::create($input) ? showMsg('1', '添加成功', URL::action('Admin\RoleController@index')) : showMsg('0', '添加失败');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Roles::where("id",$id)->first();
        return view("admin.role.edit",compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateRolePost $RolesPostrequest,$id)
    {
        //
        $role       = Roles::where('id', $id)->first();
        $role->name = $RolesPostrequest->post("name");
        $role->description = $RolesPostrequest->post("description");
        $role->save() ? showMsg('1', '修改成功', URL::action('Admin\RoleController@index')) : showMsg('0', '暂无修改');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = Roles::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //角色的权限列表
    public function permission(Roles $role,$roleid)
    {
        //所有权限
        $allpermission = Permissions::all();
        $temp = [];
        foreach ($allpermission as $item){
            $temp[$item->module.'='.$item->description][] = $item->title.'='.$item->action.'='.$item->id;
        }
        //角色所持有的权限
        $permissions = $role->where("id",$roleid)->first()->permissions;
        $permissionsArr = [];
        foreach ($permissions as $item){
            $permissionsArr[$item->id] = $item->name;
        }
        //当前角色
        $roleinfo = $role->where("id",$roleid)->first();
        return view("admin.role.permission",compact('allpermission','permissions','roleinfo','temp','permissionsArr'));
    }

    //给角色分配或移除权限
    public function storeOrRemovePermission(Roles $role,$roleid)
    {
        $roles = $role->where("id",$roleid)->first();

        $myPermission = $role->where("id",$roleid)->first()->permissions;

        $allpermissions = Permissions::findMany(request("permissionIds"));

        $addPermissions = $allpermissions->diff($myPermission);
        if(count($addPermissions)>0){
            foreach($addPermissions as $permission){
                $roles->assignPermission($permission);
            }
        }

            $deletePermission = $myPermission->diff($allpermissions);

            if(count($deletePermission)>0){
                foreach($deletePermission as $permission){
                    $roles->deletePermission($permission);
                }
            }



        showMsg('1', '保存成功',URL::action('Admin\RoleController@index'));
    }
}
