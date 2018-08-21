<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Cates;
use Illuminate\Http\Request;
use App\Http\Requests\CatesPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cates::orderBy('id', 'asc')->paginate(10);
        return view('admin/cates/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/cates/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatesPost $request)
    {
        $input = $request->except('_token','s');
       // $image = base64_decode(str_replace("data:image/png;base64,","",$input['image']));
        if($filePath=uploadImageForBase64($input['image'])) {
            $input['image'] = $filePath;
           Cates::create($input) ? showMsg('1', '添加成功', URL::action('Admin\CatesController@index')) : showMsg('0', '添加失败');
        }else{
            showMsg('0', '图片无法保存');
        }
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
        $cates = Cates::where('id', $id)->first();
        return view("admin.cates.edit",compact('cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatesPost $request, $id)
    {   
        $input = $request->except('_token','_method','s');
        $imgurl = $input['imgurl'];
        unset($input['imgurl']);
        if(strlen($input['image'])>0){
            $input['image'] = uploadImageForBase64($input['image']);
        }
        $input['image'] ? $input['image'] : $imgurl;
        Cates::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\CatesController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $res = Cates::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        $res  = Cates::where('id', $post['id'])->update(array('status' => $post['status']));
        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
