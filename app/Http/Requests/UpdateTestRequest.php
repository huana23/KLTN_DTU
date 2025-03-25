<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestRequest extends FormRequest
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
            'ngayThi' => 'required|date',
            'thoiGianThi' => 'required|integer|min:10',
            'soLuongCauHoi' => 'required|integer|min:10',
            'tenBaiThi' => 'required|string|max:255',                       
        ];
    }
    public function messages(): array
    {
        return [
           'ngayThi.required' => 'Ngày thi là bắt buộc.',
            'ngayThi.date' => 'Ngày thi phải có định dạng ngày tháng hợp lệ.',

            'thoiGianThi.required' => 'Thời gian thi là bắt buộc.',
            'thoiGianThi.integer' => 'Thời gian thi phải là số nguyên.',
            'thoiGianThi.min' => 'Thời gian thi phải lớn hơn hoặc bằng 10.',

            'soLuongCauHoi.required' => 'Số lượng câu hỏi là bắt buộc.',
            'soLuongCauHoi.integer' => 'Số lượng câu hỏi phải là số nguyên.',
            'soLuongCauHoi.min' => 'Số lượng câu hỏi phải lớn hơn hoặc bằng 10.',

            'tenBaiThi.required' => 'Tên bài thi là bắt buộc.',
            'tenBaiThi.string' => 'Tên bài thi phải là một chuỗi ký tự.',
            'tenBaiThi.max' => 'Tên bài thi không được dài quá 255 ký tự.',
        ];
    }
}
