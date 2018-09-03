<?php
namespace App\Http\Controllers\Admin;


use App\Http\Requests\PyhsicianPost;
use App\Model\Admin\Categorys;

use App\Model\Admin\Hospital;
use App\Model\Admin\Position;
use App\Model\Admin\Pyhsician;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\URL;


class PyhsicianController extends Controller
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
        $subject  = $this->getSubjectRoom();
        $hospital = $this->getHospital();
        $whereRaw = "";
        if(request()->subjectid && is_numeric(request()->subjectid)){
            $whereRaw.= "subjectid=".request()->subjectid." AND ";
        }
        if(request()->skillid && is_numeric(request()->skillid)){
            $whereRaw.= "skillid LIKE '%".request()->skillid."%' AND ";
        }
        if(request()->hospitalid && is_numeric(request()->hospitalid)){
            $whereRaw.= "hospitalid=".request()->hospitalid." AND ";
        }
        if($whereRaw){
            $whereRaw = substr($whereRaw,0,-4);
        }else{
            $whereRaw = 1;
        }
        $data = Pyhsician::search(request()->username)->whereRaw($whereRaw)->orderBy('id', 'asc')->with(["subject","skill","position"])->paginate(10);

        $skillids = [];
        foreach($data as $k=>$v){
            $skillids = explode(',',$v->skillid);
            $data[$k]->skillitem = $this->getSkill($skillids)->toArray();
        }

        return view('admin/pyhsician/index',compact('data','subject','hospital'));
    }

    private function getSkill($skillids)
    {
        return Categorys::whereIn("id",$skillids)->get();
    }

    private function getSubjectRoom()
    {
        return Categorys::where("parent_id",0)->get();
    }

    private function getHospital()
    {
        return Hospital::where("status",1)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $subject = $this->getSubjectRoom();
        $province = $this->getProvince();
        return view('admin/product/add',compact('subject','province'));
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
        $input['skillid'] = implode(",",$input['skillid']);
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
        $data = Pyhsician::where('id', $id)->first();
        $data->skills = explode(",",$data->skillid);

        $subject  = $this->getSubjectRoom();
        $position = $this->getPosition();
        return view('admin.pyhsician.edit', compact('data','subject','position'));
    }

    private function getPosition()
    {
        return Position::where("status",1)->get();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PyhsicianPost $request, $id)
    {
        $input             = $request->except('_token','s','_method','skill-edit-id');
        if($request['image']){
            $imageFile = uploadImageForBase64($request['image']);
            $input['image'] = $imageFile;
        }else{
            unset($input['image']);
        }
        $input['skillid'] = implode(",",$input['skillid']);
        $status = ['on'=>1,'off'=>0];
        $input['status'] = $status[isset($input['status'])?$input['status']:'off'];
        $input['recommend'] = $status[isset($input['recommend'])?$input['recommend']:'off'];
        Pyhsician::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\PyhsicianController@index')) : showMsg('0', '修改失败');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Pyhsician::destroy($id);
        $res ? showMsg('1', '删除成功') : showMsg('0', '删除失败');
    }

    //更新状态
    public function status(Request $request)
    {
        $post = $request->all();
        if($post['type']=='status'){
            $res  = Pyhsician::where('id', $post['id'])->update(array('status' => $post['status']));
        }else{
            $res  = Pyhsician::where('id', $post['id'])->update(array('recommend' => $post['status']));
        }

        $res ? showMsg('1', '修改成功') : showMsg('0', '修改失败');
    }
}
