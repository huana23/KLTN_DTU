<div class="container mt-5 mb-5 main-panel">
    <div class="content-wrapper">

        <div class="d-flex justify-content-between align-items-center p-3 border bg-light rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="bi bi-clipboard-check me-1"></i>  Bài kiểm tra đã làm
                        </li>
                    </ol>
                </nav>
        </div>

        <div class="container mt-5">
            <h2 class="text-center fw-bold text-dark mb-4">
                📝 {{ $test->tenBaiThi }}
            </h2>

            <p class="fw-semibold fs-5 text-muted">Tổng số câu hỏi: <strong>{{ $test->soLuongCauHoi }} câu</strong></p>

            <div class="mt-4">
                @forelse ($questions as $index => $item)
                    @php 
                        $question = $item->question;
                        
                        $userAnswer = $answers[$question->id] ?? null;
                    @endphp

                    <div class="mb-2 p-4 border rounded shadow-sm bg-white">
                        <p class="fw-bold">
                            Câu {{ $index + 1 }}: {{ $question->cauHoi }}
                        </p>
            
                        @foreach (['A', 'B', 'C', 'D'] as $option)
                            @php
                                $value = $question->{'dapAn' . $option};
                                
                                $isChecked = $userAnswer && $userAnswer['selected_answer'] == $value;
                                $isCorrect = $userAnswer && $userAnswer['selected_answer'] == $value && $userAnswer['correct'] == 1;
                            @endphp

                            <label class="form-check d-flex align-items-center gap-2 @if($isChecked && !$isCorrect) text-decoration-line-through @endif">
                                <input class="form-check-input" type="radio" disabled
                                    {{ $isChecked ? 'checked' : '' }}>
                                <span class="form-check-label">
                                    {{ $option }}. {{ $value }}
                                    @if($isCorrect)
                                        <i class="ms-1 text-success">(Đúng)</i>
                                    @elseif($isChecked)
                                        <i class="ms-1 text-danger">(Sai)</i>
                                    @endif
                                </span>
                            </label>
                        @endforeach

                        @if (!$userAnswer || $userAnswer['correct'] != 1)
                            <p class="mt-2 text-success">✅ Đáp án đúng: <strong>{{ $item->question->dapAn }}</strong></p>
                            
                        @endif
                    </div>
                @empty
                    <div class="alert alert-warning text-center">Không có câu hỏi nào để hiển thị.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

