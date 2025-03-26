<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
           'tenMonHoc' => 'required',    
            'maKhoi' => 'required|integer', 
        ];
    }
    public function messages(): array
    {
        return [
            'tenMonHoc.required' => 'Tên môn học là bắt buộc.',
            

            'maKhoi.required' => 'Mã khối là bắt buộc.',
            'maKhoi.integer' => 'Mã khối phải là một số nguyên.',
        ];
    }
}
