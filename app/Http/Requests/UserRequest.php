<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
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
            'email'=>'required|email' ,
            'password'=>'required|min:3|max:32' ,
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute phải đủ từ 2-100 ký tự',
            'max' => ':attribute phải đủ từ 2-100 ký tự',
            'email'=>':attribute bạn phải nhập đúng định dạng email',
        ];
    }
    public function attributes(){
        return [
            'email' => 'email',
            'password' => 'mật khẩu',
        ];
    }
}
