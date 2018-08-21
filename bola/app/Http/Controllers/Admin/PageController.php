<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PagePost;
use App\Http\Requests\UpdatePagePost;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\UpdateBannerPost;
use App\common\Base;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Page::orderBy('id', 'asc')->paginate(10);
        return view('admin/page/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Base::getMenu();
         return view('admin/page/add',compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagePost $request)
    {
            Page::create([
                'title'=>$request->title,
                'content'=>$request->content,
            ]) ? showMsg('1', '添加成功', URL::action('Admin\PageController@index')) : showMsg('0', '添加失败');
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
