<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminsPost extends FormRequest
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
            'account'    => 'required|unique:admins',
            'password' => 'required|confirmed',
            'status'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'account.required'     => '账号不能为空！',
            'account.unique'        => '账号名称不能重复！',
            'password.required'  => '密码不能为空！',
            'password.confirmed' => '密码和重复密码不同！',
            'status.required' => '请选择状态',
        ];
    }
}
