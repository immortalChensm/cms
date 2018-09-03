<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class PyhsicianPost extends FormRequest
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
            'username'=>['required','min:2',Rule::unique('pyhsician')->ignore($request->id,'id')],
        ];
    }

    public function messages()
    {
        return [
            'username.required'   => '请输入医生名字',
            'username.min'  => '医生名字最少2个字符',
            'username.unique'=>'医生名字已经存在',
        ];
    }
}
