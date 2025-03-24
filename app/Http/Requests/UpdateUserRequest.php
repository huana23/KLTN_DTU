<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . $this->id . '|max:191',          
            'hoTen' => 'required|string|max:255',                               
            'dienThoai' => 'required|string|max:15',      
            'gioiTinh' => 'required|in:0,1',                        
            'diaChi' => 'required|string|max:255',                                 
            'maThanhVien' => 'required|string|unique:users,maThanhVien,' . $this->id . '|max:10',                     
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không đúng định dạng.',
            'email.unique' => 'Địa chỉ email này đã được sử dụng.',
            'email.max' => 'Địa chỉ email không được vượt quá 191 ký tự.',
            
            'hoTen.required' => 'Vui lòng nhập họ tên.',
            'hoTen.string' => 'Họ tên phải là một chuỗi ký tự.',
            'hoTen.max' => 'Họ tên không được vượt quá 255 ký tự.',
            
            'dienThoai.required' => 'Vui lòng nhập số điện thoại.',
            'dienThoai.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'dienThoai.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            
            'diaChi.required' => 'Vui lòng nhập địa chỉ.',
            'diaChi.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'diaChi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            
            'maThanhVien.required' => 'Vui lòng nhập mã thành viên.',
            'maThanhVien.string' => 'Mã thành viên phải là một chuỗi ký tự.',
            'maThanhVien.max' => 'Mã thành viên không được vượt quá 10 ký tự.',
            'maThanhVien.unique' => 'Mã thành viên này đã tồn tại.',
        ];
    }
}
