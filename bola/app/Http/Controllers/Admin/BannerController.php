<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\BannerPost;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\UpdateBannerPost;

class BannerController extends Controller
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
        $data = Banner::orderBy('id', 'asc')->paginate(10);
        return view('admin/banner/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/banner/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerPost $request)
    {
        $image = $request->post("image");

        $title = $request->post("title");
        $url = $request->post("url");
        $status = $request->post("status");

        $statusWitch = ['on'=>1,'off'=>0];
        $status = $statusWitch[isset($request['status'])?$request['status']:'off'];

        if($filePath=uploadImageForBase64($image)) {

            $image = $filePath;

            Banner::create(compact('image', 'title', 'url', 'status')) ? showMsg('1', '添加成功', URL::action('Admin\BannerController@index')) : showMsg('0', '添加失败');;

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
        //
        $banner = Banner::find($id);
        return view("admin.banner.edit",compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdateBannerPost $bannerRequest,$id)
    {

        $image = $bannerRequest->post("image");
        $filePath = $bannerRequest->post("imgurl");
        if(strlen($image)>0){
            $filePath = uploadImageForBase64($image);
        }
        $banner       = Banner::where('id', $id)->first();
        $banner->id = $bannerRequest->post("imgid");
        $banner->title = $bannerRequest->post("title");

        $status = ['on'=>1,'off'=>0];
        $input_status = $status[isset($bannerRequest->status)?$bannerRequest->status:'off'];

        $banner->status = $input_status;
        $banner->image = $filePath;
        $banner->url = $bannerRequest->post("url");
        $banner->save() ? showMsg('1', '修改成功', URL::action('Admin\BannerController@index')) : showMsg('0', '暂无修改');
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
        $res = Banner::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }


    public function uploadImage(Request $request)
    {

    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();

        $res  = Banner::where('id', $post['id'])->update(array('status' => $post['status']));

        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
