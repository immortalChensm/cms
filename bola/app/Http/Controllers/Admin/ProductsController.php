<?php
namespace App\Http\Controllers\Admin;

use App\Model\Admin\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ProductPost;
use App\Http\Requests\UpdateProductPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use App\Model\Admin\ProductCategory;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'asc')->paginate(10);
        return view('admin/product/index',compact('data'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->getCategorys();

        return view('admin/product/add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductPost $request)
    {

        $input             = $request->except('_token','s');

        if($request['image']){
            $imageFile = uploadImageForBase64($request['image']);
        }

        $input['image'] = $imageFile;
        Product::create($input) ? showMsg('1', '添加成功', URL::action('Admin\ProductsController@index')) : showMsg('0', '添加失败');
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
        $data = Product::where('id', $id)->first();
        $category = $this->getCategorys();
        return view('admin.product.edit', compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductPost $request, $id)
    {
         $input = $request->except('_token','_method','s');

        if($request['image']){
            $imageFile = uploadImageForBase64($request['image']);
            $input['image'] = $imageFile;
        }

        Product::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\ProductsController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Product::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        $res  = Product::where('id', $post['id'])->update(array('status' => $post['status']));
        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
