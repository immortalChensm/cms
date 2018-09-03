<?php
namespace App\Http\Controllers\Admin;


use App\Http\Requests\PyhsicianPost;
use App\Model\Admin\Categorys;

use App\Model\Admin\Consulation;
use App\Model\Admin\Hospital;
use App\Model\Admin\Position;
use App\Model\Admin\Pyhsician;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\URL;

class ConsulationController extends Controller
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
        $hospital = $this->getPyhsician();
        $whereRaw = "";
        if(request()->hospitalid && is_numeric(request()->hospitalid)){
            $whereRaw.= "userid=".request()->hospitalid." AND ";
        }
        if(request()->status && is_numeric(request()->status)){
            $whereRaw.= "status=".request()->status." AND ";
        }
        if(request()->username){
            $whereRaw.= "name='".trim(request()->username)."' AND ";
        }
        if(request()->mobile){
            $whereRaw.= "mobile=".trim(request())->mobile." AND ";
        }
        if($whereRaw){
            $whereRaw = substr($whereRaw,0,-4);
        }else{
            $whereRaw = 1;
        }

        $data = Consulation::whereRaw($whereRaw)->orderBy('id', 'asc')->with(["hospital","pyhsician"])->paginate(10);


        return view('admin/consulation/index',compact('data','subject','hospital'));
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
    private function getPyhsician()
    {
        return Pyhsician::where("status",1)->get();
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
        $data = Consulation::where('id', $id)->first();
        $hospital = $this->getHospital();
        return view('admin.consulation.edit', compact('data','hospital'));
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
    public function update(Request $request, $id)
    {
        $input             = $request->except('_token','s','_method');
        $positionid = $request->assign_hospitalid;
        $type       = $request->type;
        if($type == 'cancel'){
            $input['status'] = 2;
        }elseif($type == 'save'){
            $input['status'] = 1;
            $input['assign_hospitalid'] = $positionid;
            $input['assign_time'] = date("Y-m-d H:i:s");
        }
        unset($input['type']);

        Consulation::where('id', $id)->update($input) ? showMsg('1', '修改成功',URL::action('Admin\ConsulationController@index')) : showMsg('0', '修改失败');
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
