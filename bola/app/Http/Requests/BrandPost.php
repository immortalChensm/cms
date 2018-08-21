<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandPost extends FormRequest
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
            'pid'   => 'required',
            'image'  => 'required',
            'status'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pid.required'   => '请选择所属分类',
            'image.required'  => '请上传图片',
            'status.required'  => '请选择状态',
        ];
    }
}
