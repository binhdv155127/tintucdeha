<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'Ten' => 'required|min:2|max:255|unique:theloai,Ten'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute phải đủ từ 2-255 ký tự',
            'max' => ':attribute phải đủ từ 2-255 ký tự',
            'unique'=> ':attribute không được trùng'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên danh mục tin tuc',
        ];
    }
}
