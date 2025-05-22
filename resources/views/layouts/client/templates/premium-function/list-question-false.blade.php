<div class="container mt-5 mb-5 main-panel">
    <div class="content-wrapper">
        <h3 class="mb-4">🛑 Danh sách các câu trả lời sai</h3>

        @forelse ($questions as $index => $item)
            @php
                $question = $item->cauhoi;
                $selectedAnswer = $item->dapAnDaChon;
                $correctAnswer = $question->dapAn;
            @endphp

            <div class="mb-3 p-4 border rounded bg-light shadow-sm">
                <p class="fw-bold">Câu {{ $index + 1 }}: {{ $question->cauHoi }}</p>

                @foreach (['A', 'B', 'C', 'D'] as $option)
                    @php
                        $value = $question->{'dapAn' . $option};
                        $isChecked = $selectedAnswer == $value;
                        $isCorrect = $isChecked && $selectedAnswer == $correctAnswer;
                    @endphp

                    <label class="form-check d-flex align-items-center gap-2 @if($isChecked && !$isCorrect) text-decoration-line-through @endif">
                        <input class="form-check-input" type="radio" disabled {{ $isChecked ? 'checked' : '' }}>
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

                <p class="mt-2 text-success">✅ Đáp án đúng: <strong>{{ $correctAnswer }}</strong></p>
            </div>
        @empty
            <div class="alert alert-info">Bạn không có câu sai nào!</div>
        @endforelse
    </div>
</div>
