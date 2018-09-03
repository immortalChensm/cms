<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
class UpdateCategorysPost extends FormRequest
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
        $input = $request->all();
        return [
            //
            'name'=>['required','min:2',Rule::unique('categorys')->ignore($input['id'],'id')],
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
