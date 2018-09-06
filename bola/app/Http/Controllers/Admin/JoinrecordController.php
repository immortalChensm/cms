<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Joinrecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
class JoinrecordController extends Controller
{
    //
    public function index()
    {
        $join = Joinrecord::paginate(10);
        return view('admin/joinrecord/index',compact('join'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Joinrecord::where('id', $id)->first();
        return view('admin.joinrecord.edit', compact('data'));
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
        $type       = $request->type;
        if($type == 'cancel'){
            $input['status'] = 2;
        }elseif($type == 'save'){
            $input['status'] = 1;
            $input['updated_at'] = date("Y-m-d H:i:s");
        }
        unset($input['type']);

        Joinrecord::where('id', $id)->update($input) ? showMsg('1', '处理成功',URL::action('Admin\JoinrecordController@index')) : showMsg('0', '处理失败');
    }
}
