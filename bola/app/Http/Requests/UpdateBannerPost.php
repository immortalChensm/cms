<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerPost extends FormRequest
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
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $input = $request->all();
        return [
            'title' => ['required', Rule::unique('banner')->ignore($input['imgid'], 'id'),'min:2'],
            'url'=>['required','url']
        ];
    }

    /**
     * 获取被定义验证规则的错误消息
     *
     * @return array
     * @translator laravelacademy.org
     */
    public function messages()
    {
        return [
            'title.required' => '标题不能为空！',
            'title.unique'=>'标题已经存在',
            'title.min'=>'标题字符最少２位',
            'url.required'   => '链接不可为空！',
            'url.url'=>'链接不正确'
        ];
    }
}
