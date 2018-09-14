<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateHospitalPost;

use App\Model\Admin\Categorys;
use App\Model\Admin\Hospital;
use App\Model\Admin\Pyhsician;
use Illuminate\Http\Request;
use App\Http\Requests\HospitalPost;
use Illuminate\Support\Facades\URL;
use App\Model\Admin\ProductCategory;

class HospitalController extends Controller
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
        $subject = $this->getSubjectRoom();
        $province = $this->getProvince();
        $whereRaw = "";
        if(request()->subjectid&&is_numeric(request()->subjectid)){
            $whereRaw.= "subjectid=".request()->subjectid." AND ";
        }
        if(request()->provinceid&&is_numeric(request()->provinceid)){
            $whereRaw.= "provinceid=".request()->provinceid." AND ";
        }
        if(request()->cityid&&is_numeric(request()->cityid)){
            $whereRaw.= "cityid=".request()->cityid." AND ";
        }
        if(request()->countyid&&is_numeric(request()->countyid)){
            $whereRaw.= "countyid=".request()->countyid." AND ";
        }
        if(request()->grade){
            $whereRaw.= "grade='".request()->grade."' AND ";
        }
        if(request()->pccm){
            $whereRaw.= "pccm='".request()->pccm."' AND ";
        }
        if(request()->skillid&&is_numeric(request()->skillid)){
            $whereRaw.= "skillid LIKE '%".request()->skillid."%' AND ";
        }
        if($whereRaw){
            $whereRaw = substr($whereRaw,0,-4);
        }else{
            $whereRaw = 1;
        }
        $data = Hospital::search(request()->hospitalname)->whereRaw($whereRaw)->orderBy('id', 'asc')->with(["subject","province","city","county","town","skill"])->paginate(2);

        $skillids = [];
        foreach($data as $k=>$v){
            $skillids = explode(',',$v->skillid);
            $data[$k]->skillitem = $this->getSkill($skillids)->toArray();
        }

        $grade_pccm = $this->getGradeAndPccm();
        return view('admin/product/index',compact('data','subject','province','grade_pccm'));
    }

    public function getPyhsician()
    {
        return Pyhsician::where("is_validate",1)->get();
    }

    private function getSkill($skillids)
    {
        return Categorys::whereIn("id",$skillids)->get();
    }

    private function getSubjectRoom()
    {
        return Categorys::where("parent_id",0)->get();
    }

    private function getGradeAndPccm()
    {
        return [
            Hospital::select(['grade'])->get(),
            Hospital::select(['pccm'])->get()
        ];
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
        $subject = $this->getSubjectRoom();
        $province = $this->getProvince();
        $physician = $this->getPyhsician();
        return view('admin/product/add',compact('category','subject','province','physician'));
    }

    public function skill(Request $request)
    {
        $result = Categorys::where("parent_id",$request->subjectid)->get();
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalPost $request)
    {

        $input             = $request->except('_token','s');
        if($request['image']){
            $imageFile = uploadImageForBase64($request['image']);
        }

        $input['image'] = $imageFile;
        $input['skillid'] = implode(",",$input['skillid_bak']);
        $status = ['on'=>1,'off'=>0];
        $input['status'] = $status[isset($input['status'])?$input['status']:'off'];
        $input['recommend'] = $status[isset($input['recommend'])?$input['recommend']:'off'];
        Hospital::create($input) ? showMsg('1', '添加成功', URL::action('Admin\HospitalController@index')) : showMsg('0', '添加失败');
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
        $data = Hospital::where('id', $id)->first();
        $data->skills = explode(",",$data->skillid);
        $category = $this->getCategorys();
        $subject = $this->getSubjectRoom();
        $province = $this->getProvince();
        $physician = $this->getPyhsician();
        return view('admin.product.edit', compact('data','category','subject','province','physician'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalPost $request, $id)
    {
        $input             = $request->except('_token','s','_method','skill-edit-id','province-edit-id','city-edit-id','county-edit-id','town-edit-id');
        if($request['image']){
            $imageFile = uploadImageForBase64($request['image']);
            $input['image'] = $imageFile;
        }else{
            unset($input['image']);
        }
        $input['skillid'] = implode(",",$input['skillid_bak']);
        $status = ['on'=>1,'off'=>0];
        $input['status'] = $status[isset($input['status'])?$input['status']:'off'];
        $input['recommend'] = $status[isset($input['recommend'])?$input['recommend']:'off'];
        Hospital::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\HospitalController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Hospital::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {

        $post = $request->all();
        if($post['type']=='status'){
            $res  = Hospital::where('id', $post['id'])->update(array('status' => $post['status']));
        }else{
            $res  = Hospital::where('id', $post['id'])->update(array('recommend' => $post['status']));
        }

        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
