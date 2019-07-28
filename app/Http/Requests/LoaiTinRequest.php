<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiTinRequest extends FormRequest
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
            'Ten'=>'required|min:2|max:100|unique:loaitin,Ten',
            'TheLoai'=>'required'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute phải đủ từ 2-100 ký tự',
            'max' => ':attribute phải đủ từ 2-100 ký tự',
            'unique'=> ':attribute không được trùng'
        ];
    }
    public function attributes(){
        return [
            'Ten' => 'Tên danh mục tin tuc',
            'TheLoai' => 'Tên danh mục tin tuc'
        ];
    }
}
