<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
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
            'tenKhoi' => 'required|unique:khois,tenKhoi',
            
            'meTa' => 'required',    

        ];
    }

    public function messages(): array
    {
        return [
            'tenKhoi.required' => 'Tên lớp học là bắt buộc.',
            'tenKhoi.unique' => 'Tên lớp học đã tồn tại.',

            'meTa.required' => 'Mô tả là bắt buộc.',


        ];
    }
}
