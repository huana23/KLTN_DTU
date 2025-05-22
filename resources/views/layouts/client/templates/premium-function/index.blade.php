<div class="container mt-5 mb-5 main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-10">

                
                <div class="alert alert-success d-flex align-items-center shadow-sm border-start border-4 border-warning mb-4" role="alert">
                    <i class="bi bi-stars fs-1 me-3 text-warning"></i>
                    <div>
                        <h4 class="fw-bold mb-1">Chào mừng bạn đến với thế giới Premium 🎁</h4>
                        <p class="mb-0 text-dark">Khám phá toàn bộ quyền lợi nâng cao dành riêng cho thành viên Premium.</p>
                    </div>
                </div>

                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-danger mb-2"><i class="bi bi-x-octagon-fill me-2"></i>Xem lại câu trả lời sai</h5>
                            <p class="text-muted mb-0">Phân tích các câu sai trong bài kiểm tra để nâng cao kiến thức.</p>
                        </div>
                        <a href="{{ route('user.premium.function.result-list-test') }}" class="btn btn-danger">
                            <i class="bi bi-eye-fill me-1"></i> Xem ngay
                        </a>
                    </div>
                </div>

                
                <div class="card border-0 shadow-sm">
                    <div class="card-body shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold text-primary mb-2"><i class="bi bi-cloud-arrow-down-fill me-2"></i>Tải đề thi nâng cao</h5>
                            <p class="text-muted mb-0">Bộ đề nâng cao được chọn lọc giúp bạn luyện thi chuyên sâu.</p>
                        </div>
                        <a href="{{ route('user.premium.function.list-test') }}" class="btn btn-primary">
                            <i class="bi bi-download me-1"></i> Tải đề
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
