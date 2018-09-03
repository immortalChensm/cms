<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class HospitalPost extends FormRequest
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
    public function rules()
    {
        return [
            //
            'name'=>['required','min:2',Rule::unique('hospital')->ignore('id')],
            'code'=>'required',
            'image'=>'required',
            //'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => '请输入医院名称',
            'name.min'  => '医院名称最少2个字符',
            'name.unique'=>'医院名称已经存在',
            'image.required'=>'医院图片必须上传',
            //'status.required'=>'请选择状态',

        ];
    }
}
