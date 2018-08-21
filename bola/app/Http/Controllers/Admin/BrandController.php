<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Brand;
use App\Model\Admin\Classify;
use Illuminate\Http\Request;
use App\Http\Requests\BrandPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brand = new Brand;
        $data = $Brand::where('status',1)->with('hasOneCate')->paginate(10);
        return view('admin/brand/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classify = Classify::where('status', '1')->orderBy('id', 'desc')->get();
        return view('admin/brand/add',compact('classify'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandPost $request)
    {
        $input = $request->except('_token','s');
        if($filePath=uploadImageForBase64($input['image'])) {
            $input['image'] = $filePath;
           Brand::create($input) ? showMsg('1', '添加成功', URL::action('Admin\BrandController@index')) : showMsg('0', '添加失败');
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
         $classify = Classify::where('status', '1')->orderBy('id', 'desc')->get();
         $data = Classify::where('id', $id)->first();
        return view("admin.brand.edit",compact('data','classify'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandPost $request, $id)
    {   
        $input = $request->except('_token','_method','s');
        $imgurl = $input['imgurl'];
        unset($input['imgurl']);
        if(strlen($input['image'])>0){
            $input['image'] = uploadImageForBase64($input['image']);
        }
        $input['image'] ? $input['image'] : $imgurl;
        Brand::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\BrandController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $res = Brand::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        $res  = Brand::where('id', $post['id'])->update(array('status' => $post['status']));
        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
