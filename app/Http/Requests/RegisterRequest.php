<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'hoTen' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:6',
            're_password' => 'required|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            'hoTen.required' => 'Vui lòng nhập họ tên.',
        'hoTen.string' => 'Họ tên phải là chuỗi ký tự.',
        'hoTen.max' => 'Họ tên không được vượt quá 255 ký tự.',
        'email.required' => 'Nhập thông tin vào email.',
        'email.email' => 'Email chưa đúng định dạng.',
        'email.unique' => 'Email đã được sử dụng.',
        'password.required' => 'Nhập thông tin vào mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        're_password.required' => 'Vui lòng xác nhận lại mật khẩu.',
        're_password.same' => 'Xác nhận mật khẩu không khớp.',


        ];
    }
}
