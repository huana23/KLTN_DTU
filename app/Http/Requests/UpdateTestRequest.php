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
            'tenBaiThi' => 'required|string',
            'ngayThi' => 'required|date',
            'ngayKetThucThi' => 'required|date|after:ngayThi',
            'thoiGianThi' => 'required|integer|min:2',
            'soLuongCauHoi' => 'required|integer|min:2',

        ];
    }
    public function messages(): array
    {
        return [
            'tenBaiThi.required' => 'Tên bài thi là bắt buộc.',
            'tenBaiThi.string' => 'Tên bài thi phải là một chuỗi ký tự.',

            'ngayThi.required' => 'Ngày thi là bắt buộc.',
            'ngayThi.date' => 'Ngày thi không đúng định dạng ngày.',

            'ngayKetThucThi.required' => 'Ngày kết thúc thi là bắt buộc.',
            'ngayKetThucThi.date' => 'Ngày kết thúc thi không đúng định dạng ngày.',
            'ngayKetThucThi.after' => 'Ngày kết thúc thi phải sau ngày thi.',

            'thoiGianThi.required' => 'Thời gian thi là bắt buộc.',
            'thoiGianThi.integer' => 'Thời gian thi phải là một số nguyên.',
            'thoiGianThi.min' => 'Thời gian thi phải lớn hơn 1 phút.',

            'soLuongCauHoi.required' => 'Số lượng câu hỏi là bắt buộc.',
            'soLuongCauHoi.integer' => 'Số lượng câu hỏi phải là một số nguyên.',
            'soLuongCauHoi.min' => 'Số lượng câu hỏi phải lớn hơn 1.',

        ];
    }
}
