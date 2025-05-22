<div class="container mt-5 mb-5 main-panel">
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="page-title mb-0">📋 Danh sách kết quả</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.class') }}">Lớp học</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped table__customer align-middle text-center">
                                <thead class="table-success">
                                    <tr>
                                        <th>Kết Quả</th>
                                        <th>Mã Thành Viên</th>
                                        <th>Tên Bài Thi</th>
                                        <th>Môn Thi</th>
                                        <th>Điểm Thi</th>
                                        <th>Số Câu Đúng</th>
                                        <th>Thời Gian Vào Thi</th>
                                        <th>Thời Gian Làm Bài</th>
                                        <th>Bài đã làm</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @forelse ($results as $index => $item)
                                        @php
                                            $seconds = $item->thoiGianLamBai;
                                            $minutes = floor($seconds / 60);
                                            $remainingSeconds = $seconds % 60;
                                        @endphp
                                        <tr>
                                            <td>Lần {{ $index + 1 }}</td>
                                            <td>{{ $item->maThanhVien }}</td>
                                            <td>{{ $item->deThi->tenBaiThi ?? 'Không xác định' }}</td>
                                            <td>{{ $item->deThi->monHoc->tenMonHoc ?? 'Không xác định' }}</td>
                                            <td><span class="badge bg-info text-dark">{{ $item->diemThi }}</span></td>
                                            <td>{{ $item->soCauDung }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->thoiGianVaoThi)->format('H:i d/m/Y') }}</td>
                                            <td>{{ $minutes }} phút {{ $remainingSeconds }} giây</td>
                                            <td>
                                                @if(auth()->user()->is_premium)
                                                    <a href="{{ route('user.class.test-result.premium', ['idClass' => $id, 'subject' => $subject, 'result'=>$item->maDeThi]) }}" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-eye-fill me-1"></i> Xem
                                                    </a>
                                                @else
                                                    <span class="text-muted">🔒 Premium</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-muted">Không có kết quả nào được tìm thấy.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->is_premium)
            <div class="alert alert-success d-flex align-items-center mt-4 shadow-sm border-success" role="alert">
                <i class="bi bi-award-fill fs-3 me-3 text-warning"></i>
                <div>
                    <h5 class="mb-1 fw-bold">Chúc mừng! Bạn đã là thành viên <span class="text-primary">Premium 🎉</span></h5>
                    <p class="mb-0 small text-dark">Bạn đã mở khóa toàn bộ quyền lợi học tập nâng cao.</p>
                    <a href="{{ route('user.premium.function') }}" class="btn btn-outline-light btn-sm mt-2 text-success border-success">
                        🎁 Xem thêm chức năng của Premium
                    </a>
                </div>
            </div>
        @else
            <div class="alert alert-warning mt-3">
                🔒 Bạn cần <strong>nâng cấp Premium</strong> để xem câu hỏi và đáp án. 
                <a href="{{ route('user.premium') }}" class="btn btn-sm btn-success ml-2">Thanh toán VNPAY</a>
            </div>
        @endif

    </div>
    </div>
</div>
