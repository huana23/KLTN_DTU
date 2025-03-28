<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreQuestionRequest extends FormRequest
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
            'cauHoi'   => ['required', 'string', 'max:255'],
            'dapAnA'   => ['required', 'string', 'max:255'],
            'dapAnB'   => ['required', 'string', 'max:255'],
            'dapAnC'   => ['required', 'string', 'max:255'],
            'dapAnD'   => ['required', 'string', 'max:255'],
            'dapAn'    => [
                'required', 
                'string',
                Rule::in([request('dapAnA'), request('dapAnB'), request('dapAnC'), request('dapAnD')])
            ],
            'ghiChu'   => ['nullable', 'string', 'max:255'],
            'maMonHoc' => ['required', 'integer', 'exists:monhocs,id'],
            'maMucDo'  => ['required', 'integer', 'exists:mucdokhos,id'],
        ];
    }

    public function withValidator($validator)
        {
            $validator->after(function ($validator) {
                $dapAnA = trim($this->input('dapAnA'));
                $dapAnB = trim($this->input('dapAnB'));
                $dapAnC = trim($this->input('dapAnC'));
                $dapAnD = trim($this->input('dapAnD'));

                // Kiểm tra nếu bất kỳ đáp án nào rỗng
                if (empty($dapAnA) || empty($dapAnB) || empty($dapAnC) || empty($dapAnD)) {
                    $validator->errors()->add('dapAn', 'Các đáp án không được để trống.');
                    return;
                }

                $answers = [$dapAnA, $dapAnB, $dapAnC, $dapAnD];

                // Kiểm tra đáp án có trùng nhau không
                if (count($answers) !== count(array_unique($answers))) {
                    $validator->errors()->add('dapAn', 'Các đáp án A, B, C, D không được trùng nhau.');
                }
            });
        }

    public function messages(): array
    {
        return [
            'cauHoi.required'   => 'Vui lòng nhập nội dung câu hỏi.',
            'cauHoi.max'        => 'Câu hỏi không được vượt quá 255 ký tự.',

            'dapAnA.required'   => 'Vui lòng nhập đáp án A.',
            'dapAnB.required'   => 'Vui lòng nhập đáp án B.',
            'dapAnC.required'   => 'Vui lòng nhập đáp án C.',
            'dapAnD.required'   => 'Vui lòng nhập đáp án D.',

            'dapAn.required'    => 'Vui lòng chọn đáp án đúng.',
            'dapAn.in'          => 'Đáp án đúng phải trùng với một trong bốn đáp án A, B, C, D.',

            'maMonHoc.required' => 'Vui lòng chọn môn học.',
            'maMonHoc.exists'   => 'Mã môn học không hợp lệ.',

            'maMucDo.required'  => 'Vui lòng chọn mức độ câu hỏi.',
            'maMucDo.exists'    => 'Mã mức độ không hợp lệ.',
        ];
    }
}
