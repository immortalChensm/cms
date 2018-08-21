<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Address;
use Illuminate\Http\Request;
use App\Http\Requests\AddressPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Address::orderBy('id', 'asc')->paginate(10);
        return view('admin/address/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/address/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressPost $request)
    {
        $input             = $request->except('_token','s');
        Address::create($input) ? showMsg('1', '添加成功', URL::action('Admin\AddressController@index')) : showMsg('0', '添加失败');
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
        $data = Address::where('id', $id)->first();
        return view('admin.address.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressPost $request, $id)
    {
        $input = $request->except('_token','_method','s');
        Address::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\AddressController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Address::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        $res  = Address::where('id', $post['id'])->update(array('status' => $post['status']));
        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
