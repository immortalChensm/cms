<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsPost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNewsPost;
use Illuminate\Support\Facades\URL;
use App\Model\Admin\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = News::paginate(10);
        return view("admin.news.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("admin.news.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsPost $request)
    {
        //
        $input = $request->except('_token','s');
        News::create($input) ? showMsg('1', '添加成功', URL::action('Admin\NewsController@index')) : showMsg('0', '添加失败');;
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

    public function status(Request $request)
    {
        News::where("id",$request->id)->update(['status'=>$request->status]) ? showMsg('1', '修改成功', URL::action('Admin\NewsController@index')) : showMsg('0', '暂无修改');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view("admin.news.edit",compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsPost $request,News $news)
    {
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['status'] = $request->status;
        $news->update($data) ? showMsg('1', '修改成功', URL::action('Admin\NewsController@index')) : showMsg('0', '暂无修改');
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
        $res = News::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

}
