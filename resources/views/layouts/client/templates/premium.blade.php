<div class="container mt-5 mb-5 main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h2 class="text-primary mb-3">
                            <i class="bi bi-stars text-warning me-2"></i> Gói Premium
                        </h2>
                        <p class="mb-3 text-muted">Nâng cấp tài khoản để trải nghiệm đầy đủ quyền lợi học tập nâng cao.</p>

                        <div class="mb-4">
                            <h4 class="text-danger fw-bold">
                                <i class="bi bi-cash-coin me-2"></i> Chỉ với 299.000₫ / trọn đời
                            </h4>
                            <p class="text-secondary fst-italic small">Thanh toán một lần – sử dụng vĩnh viễn</p>
                        </div>

                        <ul class="list-group list-group-flush text-start mb-4">
                            <li class="list-group-item">
                                <i class="bi bi-check-circle-fill text-success me-2"></i> Xem chi tiết câu trả lời, đáp án đúng/sai
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-check-circle-fill text-success me-2"></i> Truy cập bộ đề nâng cao chuyên sâu
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-check-circle-fill text-success me-2"></i> Rèn luyện kỹ năng & chuẩn bị thi tốt hơn
                            </li>
                        </ul>

                        @if (!auth()->user()->is_premium)
                        <form action="{{ route('payment.vnpay', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="is_premium" value="true">
                            <button type="submit" name="redirect" class="btn btn-success btn-lg px-5">
                                <i class="bi bi-credit-card-2-front-fill me-2"></i> Nâng cấp ngay với VNPAY
                            </button>
                        </form>
                        @else
                            <div class="alert alert-success mt-3 mb-0">
                                <i class="bi bi-award-fill me-2"></i> Bạn đã là thành viên Premium 🎉
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
