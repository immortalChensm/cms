<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SystemPost extends FormRequest
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
            "config.system" => 'required',
            "config.webtitle"  => 'required',
        ];
    }

    public function messages()
    {
        return [
            "config.system.required"   => '请输入系统名称',
            "config.webtitle.required" => '请输入网站标题',

        ];
    }
}
