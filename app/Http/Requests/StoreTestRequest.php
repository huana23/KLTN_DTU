<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenBaiThi' => 'required',
           'ngayThi' => 'required',    
            'thoiGianThi' => 'required|integer|min:2', 
            'soLuongCauHoi' => 'required|integer|min:2', 

        ];
    }
    public function messages(): array
    {
        return [
            'ngayThi.required' => 'Tên môn học là bắt buộc.',
            

            'thoiGianThi.required' => 'Mã khối là bắt buộc.',
            'thoiGianThi.integer' => 'Mã khối phải là một số nguyên.',
            'thoiGianThi.min' => 'Thời gian thi phải lớn hơn 1 phút',


            'soLuongCauHoi.required' => 'Số lượng câu là bắt buộc.',
            'soLuongCauHoi.integer' => 'Số lượng câu phải là một số nguyên.',
            'soLuongCauHoi.min' => 'Số lượng câu thi phải lớn hơn 1 phút',

        ];
    }
}
