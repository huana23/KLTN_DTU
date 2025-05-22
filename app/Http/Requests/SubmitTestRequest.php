<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Test;

class SubmitTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'answers' => ['required', 'array'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $testId = $this->route('id');   
            $test = Test::find($testId);

            if (!$test) {
                $validator->errors()->add('test', 'Bài kiểm tra không tồn tại.');
                return;
            }

            $soLuongCauHoi = $test->soLuongCauHoi;
            $soCauTraLoi = count($this->input('answers', []));

            if ($soCauTraLoi < $soLuongCauHoi) {
                $validator->errors()->add('answers', "Bạn phải trả lời đủ $soLuongCauHoi câu hỏi.");
            }
        });
    }
}
