<?php
namespace App\Http\Controllers\Admin;

use App\Model\Admin\Train;
use Illuminate\Http\Request;
use App\Http\Requests\TrainPost;
use Illuminate\Support\Facades\URL;


class TrainController extends Controller
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
    public function index(Request $request)
    {
        $data = Train::search($request->title)->orderBy('id', 'asc')->paginate(10);
        return view('admin/train/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/train/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainPost $request)
    {
        $input             = $request->except('_token','s');
        $status = ['on'=>1,'off'=>0];
        $input['status'] = $status[isset($input['status'])?$input['status']:'off'];
        Train::create($input) ? showMsg('1', '添加成功', URL::action('Admin\TrainController@index')) : showMsg('0', '添加失败');
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
        $data = Train::where('id', $id)->first();
        return view('admin.train.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainPost $request, $id)
    {
        $input = $request->except('_token','_method','s');
        $status = ['on'=>1,'off'=>0];
        $input['status'] = $status[isset($input['status'])?$input['status']:'off'];
        Train::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\TrainController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Train::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        //print_r($post);exit;
        $res  = Train::where('id', $post['id'])->update(array('status' => $post['status']));
        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
