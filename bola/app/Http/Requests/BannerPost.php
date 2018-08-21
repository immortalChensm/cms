<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerPost extends FormRequest
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
            'title'   => 'required',
            'url'    => 'required|url',
            'image' => 'required',
            'status'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'   => '请输入标题',
            'url.required'    => '请输入链接',
            'url.url'=>'请输入正确的链接',
            'image.required' => '请添加图片',
            'status.required'  => '请选择状态',
        ];
    }
}
