<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressPost extends FormRequest
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
            'area'   => 'required',
            'mobile'  => 'required',
            'address' => 'required',
            'status'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'area.required'   => '请输入所在区域',
            'mobile.required'  => '请输入联系电话',
            'address.required' => '请输入具体地址',
            'status.required'  => '请选择状态',
        ];
    }
}
