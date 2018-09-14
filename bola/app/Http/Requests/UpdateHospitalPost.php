<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateHospitalPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(\Illuminate\Http\Request $request)
    {
        $input = $request->all();
        return [
            //
            'name'=>['required','min:2',Rule::unique('hospital')->ignore($input['id'],'id')],
            'code'=>['required',Rule::unique('hospital')->ignore($input['id'],'id')],
            //'image'=>'required',
            //'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => '请输入医院名称',
            'name.min'  => '医院名称最少2个字符',
            'name.unique'=>'医院名称已经存在',
            'code.required'=>'请输入医院代码',
            'code.unique'=>'医院代码已经存在',
            //'image.required'=>'医院图片必须上传',
            //'status.required'=>'请选择状态',

        ];
    }
}
