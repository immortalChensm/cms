<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class UpdateNewsPost extends FormRequest
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
            'title'=>['required','min:3',Rule::unique('news')->ignore($request->id,'id')],
            'content'=>'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => '请输入新闻标题',
            'title.min'  => '标题最少3个字符',
            'title.unique'=>'标题已经存在',
            'content.required'=>'内容不可为空',
            'content.min'=>'内容最少10个字符'
        ];
    }
}
