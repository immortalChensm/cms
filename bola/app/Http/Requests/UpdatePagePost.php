<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class UpdatePagePost extends FormRequest
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
            'title'   => ['required','min:2',Rule::unique('pages')->ignore($input['id'],'id')],
            'content' => 'required',
            'status'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => '请输入标题',
            'title.unique'=>'标题已存在',
            'content.required' => '请输入描述',
            'status.required'  => '请选择状态',
        ];
    }
}
