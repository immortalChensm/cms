<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Model\Admin\Roles;
use App\Http\Requests\RolesPost;
use App\Http\Requests\UpdateRolePost;
use Illuminate\Support\Facades\URL;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {

        //$this->checkPermission();

    }
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
        $input['guard_name'] = "admin";
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
        $permission = Permission::all();
        //print_r($permission->toArray());exit;
        $permissionS = [];
        $current_role = Role::where("id",$roleid)->first();
        foreach($permission as $item){
            $permissionS[$item->group][] = [
                "name"=>$item->title,
                "id"=>$item->id,
                "permission"=>($current_role->hasPermissionTo($item->name)?1:0)
            ];
        }
        foreach($permissionS as $group=>$arr){
            $limit = [];
            foreach($arr as $k=>$v){
                if($v['permission'] == 1){
                    $limit[] = "1";
                }
            }
            if(count($arr) == count($limit)){
                $permissionS[$group]['select'] = $arr;
            }else{
                $permissionS[$group]['unselect'] = $arr;
            }
        }
        //print_r($permissionS);
        return view("admin.role.permission",compact('permissionS','current_role'));
    }

    public function storeOrRemovePermission(Roles $role,$roleid)
    {

        $roleModel = Role::where("id",$roleid)->first();
        $select_permissionid = request()->all("selectid")['selectid'];

        foreach($select_permissionid as $pid=>$status){
            if(is_numeric($pid)){
                $permission = $this->getPermission($pid);
                if($status=='on'){
                    $roleModel->givePermissionTo($permission);
                }elseif($status=='off'){
                    $roleModel->revokePermissionTo($permission);
                }

            }
        }
        showMsg('1', '保存成功', URL::action('Admin\RoleController@index'));
    }

    public function getPermission($pid)
    {
        return Permission::where("id",$pid)->first();
    }


}
