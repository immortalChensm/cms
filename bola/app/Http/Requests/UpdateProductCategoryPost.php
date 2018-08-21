<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class UpdateProductCategoryPost extends FormRequest
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
            'name'=>['required','min:2',Rule::unique('products_category')->ignore($request->id,'id')],
            'status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => '请输入产品分类名称',
            'name.min'  => '产品分类名称最少3个字符',
            'name.unique'=>'产品分类名称已经存在',
            'status.required'=>'请选择状态',

        ];
    }
}
