<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\PermissionPost;
use App\Http\Requests\UpdatePermissionPost;
use App\Model\Admin\Permissions;
use Illuminate\Support\Facades\URL;
class PermissionController extends Controller
{
    public function __construct()
    {

        $this->checkPermission();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permissions::paginate(10);
        return view("admin.permission.index",compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.permission.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionPost $request)
    {
        //
        $input = $request->except('_token','s');
        Permissions::create($input) ? showMsg('1', '添加成功', URL::action('Admin\PermissionController@index')) : showMsg('0', '添加失败');
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
        $permission = Permissions::where("id",$id)->first();
        return view("admin.permission.edit",compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdatePermissionPost $updatePermissionPost,$id)
    {
        //
        $permission       = Permissions::where('id', $id)->first();
        $permission->name = $updatePermissionPost->post("name");
        $permission->description = $updatePermissionPost->post("description");
        $permission->save() ? showMsg('1', '修改成功', URL::action('Admin\PermissionController@index')) : showMsg('0', '暂无修改');
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
        $res = Permissions::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }
}
