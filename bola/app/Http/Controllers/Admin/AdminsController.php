<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admins;
use Illuminate\Http\Request;
use App\Http\Requests\AdminsPost;
use App\Http\Requests\UpdateAdminPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Model\Admin\Roles;
use Spatie\Permission\Models\Role;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $data = Admins::orderBy('id', 'asc')->paginate(10);
        return view('admin/admins/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = \App\Model\Admin\Role::all();
        return view('admin.admins.add',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminsPost $request)
    {

        $input             = $request->except('_token', 'password_confirmation','s');
        $input['password'] = bcrypt($input['password']);
        $roleid = $input['roleid'];
        unset($input['roleid']);
        if( $user = Admins::create($input)){
            $role = $this->getRole($roleid);
            $user->assignRole($role);
            showMsg('1', '添加成功', URL::action('Admin\AdminsController@index'));
        }else{
            showMsg('0', '添加失败');
        }


        // ? showMsg('1', '添加成功', URL::action('Admin\AdminsController@index')) : showMsg('0', '添加失败');

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
        $data = Admins::where('id', $id)->first();
        return view('admin.admins.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateAdminPost $UpdateAdminPost, $id)
    {
        $input = $request->all();
        $admins       = Admins::where('id', $id)->first();
        $admins->account = $input['account'];
        $input['password'] && ($admins->password = bcrypt($input['password']));
        $admins->status = $input['status'];


        $admins->save() ? showMsg('1', '修改成功', URL::action('Admin\AdminsController@index')) : showMsg('0', '暂无修改');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $data = Admins::where('id', $id)->first();
        if($data['account'] == 'admin'){
            showMsg('0', '超级账号禁止删除');
        }

        $res = Admins::destroy($id);

        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        $data = Admins::where('id', $post['id'])->first();
        if($data['account'] == 'admin'){
            showMsg('0', '超级账号禁止禁用');
        }

        $res  = Admins::where('id', $post['id'])->update(array('status' => $post['status']));
        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }


    //用户的权限列表
    public function role(Admins $user,$userid)
    {
//        $allroles = \App\Model\Admin\Roles::all();
//        $roles = $user->where("id",$userid)->first()->roles;

        $allroles = Role::all();

        $user = $user->where("id",$userid)->first();
        $allRoles = [];
        foreach($allroles as $item){
            if($user->hasRole($item->name)){
                $allRoles[$item->id] = ["name"=>$item->name,"status"=>1];
            }else{
                $allRoles[$item->id] = ["name"=>$item->name,"status"=>0];
            }
        }
        return view("admin.admins.role",compact('roles','allRoles','user'));
    }

    //给用户分配角色或移除角色
    public function storeOrRemoveRole(Admins $user,$userid)
    {

        $select_roleid = request()->all("selectid")['selectid'];
        $userModel = $user->where("id",$userid)->first();
        foreach($select_roleid as $pid=>$status){
            if(is_numeric($pid)){
                $role = $this->getRole($pid);
                if($status=='on'){
                    $userModel->assignRole($role);
                }elseif($status=='off'){
                    $userModel->removeRole($role);
                }

            }
        }
        showMsg('1', '保存成功',URL::action('Admin\AdminsController@index'));
    }

    public function getRole($pid)
    {
        return Role::where("id",$pid)->first();
    }
}
