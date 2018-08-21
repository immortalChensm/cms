<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductCategoryPost as Pcategory;

use App\Model\Admin\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductCategoryPost as Pupdatecategory;
use Illuminate\Support\Facades\URL;
use App\Model\Admin\News;
class ProductcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$data = ProductCategory::paginate(10);
        $data = $this->getCategorys();

        return view("admin.product.category-index",compact('data'));
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
        return view("admin.product.category-add",compact('category'));
    }

    private function getCategorys()
    {
        $category = ProductCategory::all();

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
    public function store(Pcategory $request)
    {
        //
        $input = $request->except('_token','s');
        $data['name'] = $request->name;
        $data['icon'] = $request->icon;
        $data['image'] = $request->image;
        $data['status'] = $request->status;
        $data['desc'] = $request->desc;
        $data['parent_id'] = $request->parent_id;

        if($data['icon']){
            $iconfile = uploadImageForBase64($data['icon']);
            $data['icon'] = $iconfile;
        }
        if(is_array($data['image'])){
            $imageFiles = [];
            foreach ($data['image'] as $image){
                if($image){
                    $imageFiles[] = uploadImageForBase64($image);
                }

            }
            $data['image'] = implode(",",$imageFiles);
        }

        ProductCategory::create($data) ? showMsg('1', '添加成功', URL::action('Admin\ProductcategoryController@index')) : showMsg('0', '添加失败');;
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
        ProductCategory::where("id",$request->id)->update(['status'=>$request->status]) ? showMsg('1', '修改成功', URL::action('Admin\ProductcategoryController@index')) : showMsg('0', '暂无修改');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $category = $this->getCategorys();

        $productCategory->image = explode(",",$productCategory->image);

        return view("admin.product.category-edit",compact('productCategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Pupdatecategory $request)
    {
        $data['name'] = $request->name;
        //$data['icon'] = $request->icon;
        //$data['image'] = $request->image;
        $data['status'] = $request->status;
        $data['desc'] = $request->desc;
        $data['parent_id'] = $request->parent_id;
        if($request->icon){
            $iconfile = uploadImageForBase64(trim($request->icon));
            $data['icon'] = $iconfile;
        }
        if(is_array($request->image)){
            $imageFiles = [];
            foreach ($request->image as $image){
                if($image){
                    $imageFiles[] = uploadImageForBase64($image);
                }

            }
            $temp = implode(",",$imageFiles);
            if($temp){
                $data['image'] = $temp;
            }
        }
        //$category = ProductCategory::where("id",$request->id)->first();
        ProductCategory::where("id",$request->id)->update($data) ? showMsg('1', '修改成功', URL::action('Admin\ProductcategoryController@index')) : showMsg('0', '暂无修改');
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
        $res = ProductCategory::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

}
