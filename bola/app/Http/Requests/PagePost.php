<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PagePost extends FormRequest
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
            'title'   => ['required','min:2',Rule::unique('pages')->ignore('id')],
            'content' => 'required',
            //'status'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => '请输入标题',
            'title.unique'   => '标题已存在',
            'content.required' => '请输入描述',
            //'status.required'  => '请选择状态',
        ];
    }
}
