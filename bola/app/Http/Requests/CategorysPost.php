<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
class CategorysPost extends FormRequest
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
            'name'=>['required','min:2',Rule::unique('categorys')->ignore('id')],

        ];
    }

    public function messages()
    {
        return [
            'name.required'   => '请输入名称',
            'name.min'  => '名称最少2个字符',
            'name.unique'=>'名称已经存在',

        ];
    }
}
