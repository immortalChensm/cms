<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class UpdateProductPost extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            //
            'title'=>['required','min:2',Rule::unique('products')->ignore($request->id,'id')],
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => '请输入产品名称',
            'title.min'  => '产品名称最少3个字符',
            'title.unique'=>'产品名称已经存在',
            'status.required'=>'请选择状态',

        ];
    }
}
