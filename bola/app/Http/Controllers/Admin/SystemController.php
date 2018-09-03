<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\System;
use Illuminate\Http\Request;

use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\SystemPost;
use App\Http\Requests\UpdatePagePost;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\UpdateBannerPost;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
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
        //$data = Page::orderBy('id', 'asc')->paginate(10);
        $config = Db::table("config")->get();
        $system = configsystem();
        return view('admin/system/index',compact('config','system'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/page/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SystemPost $request)
    {
            $input = $request->except(['_token','s']);
            $data = $input;
            $insertData = [];

            foreach($data['config'] as $field=>$value){
                $temp = [];
                $temp['name'] = $field;
                $temp['value'] = $value;
                //$insertData[] = $temp;
                $isset = Db::table("config")->where("name",$field)->first();
                if($isset->name==$field){
                    Db::table("config")->where("name",$field)->update([
                        "name"=>$field,
                        "value"=>$value
                    ]);
                }else{
                    Db::table("config")->insert([
                        "name"=>$field,
                        "value"=>$value
                    ]);
                }

            }
            showMsg('1', '保存成功', URL::action('Admin\SystemController@index'));
            //Db::table("config")->insert($insertData) ? showMsg('1', '添加成功', URL::action('Admin\SystemController@index')) : showMsg('0', '添加失败');
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
        $page = Page::find($id);
        return view("admin.page.edit",compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePagePost $pageRequest,$id)
    {
        $page       = Page::where('id', $id)->first();

        $page->title = $pageRequest->post("title");
        $page->status = $pageRequest->post("status");
        $page->content = $pageRequest->post("content");

        $page->save() ? showMsg('1', '修改成功', URL::action('Admin\PageController@index')) : showMsg('0', '暂无修改');
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
        $res = Page::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

}
