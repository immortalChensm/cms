<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Roles;
use App\Http\Requests\CategorysPost;
use App\Http\Requests\UpdateCategorysPost;
use Illuminate\Support\Facades\URL;
use App\Model\Admin\Categorys;
class SkillController extends Controller
{
    public function __construct()
    {

        //$this->checkPermission();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        //$data = $this->getCategorys();
        $data = Categorys::where("parent_id",$id)->get();

        return view("admin.skill.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = $this->getCategorys();
        //$category = Categorys::where("id",$id)->first();
        return view("admin.skill.add",compact('category'));
    }

    private function getCategorys()
    {
        $category = Categorys::all();

        if(count($category)>0){
            $data = \PHPTree::makeTreeForHtml($category);
        }else{
            $data = $category;
        }
        return $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorysPost $request)
    {
        //
        $input = $request->except('_token','s');
        if($input['parent_id']==0){
            showMsg('0', '请选择科室');
        }
        Categorys::create($input) ? showMsg('1', '添加成功', '/admin/skill/index/'.$input['parent_id']) : showMsg('0', '添加失败');;
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
        $categorys = $this->getCategorys();
        $category = Categorys::where("id",$id)->first();
        return view("admin.skill.edit",compact('category','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorysPost $Postrequest,$id)
    {
        //
        $category       = Categorys::where('id', $id)->first();
        $category->name = $Postrequest->post("name");
        $category->link = $Postrequest->post("link");
        //$category->parent_id = $Postrequest->post("parent_id");
        //if($category->parent_id==0){
        //    showMsg('0', '请选择科室');
        //}
        $category->sort = $Postrequest->post("sort");
        $category->save() ? showMsg('1', '修改成功', '/admin/skill/index/'.$category->parent_id) : showMsg('0', '暂无修改');
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
        if(Categorys::where("parent_id",$id)->first()){
            showMsg('1', '该菜单下有子菜单不能删除');
        }else{
            $res = Categorys::destroy($id);
            $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
        }

    }

}
