@if (session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

<div class="container mt-5 mb-5">
    <div class="content row justify-content-center align-items-center">
        <div class="block col-lg-6 col-md-12 bg-white p-4 rounded">
            <h4 class="text-center mb-3">{{ $test->tenBaiThi }}</h4>
            <div class="exam-info mb-3">
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-clock me-2"></i></span><span> Thời gian làm bài</span>
                    </div>
                    <div class="col-6 text-end">
                        <span>{{ $test->thoiGianThi }} phút</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-calendar-days me-2"></i></span><span> Thời gian mở
                            đề</span>
                    </div>
                    <div class="col-6 text-end">
                        <span>{{ \Carbon\Carbon::parse($test->ngayThi)->format('d/m/Y h:i A') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-calendar-xmark me-2"></i></span><span> Thời gian kết
                            thúc</span>
                    </div>
                    <div class="col-6 text-end">
                        <span>{{ \Carbon\Carbon::parse($test->ngayKetThucThi)->format('d/m/Y h:i A') }}</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <span class="text-primary"><i class="far fa-circle-question me-2"></i></span><span> Số lượng câu
                            hỏi</span>
                    </div>
                    <div class="col-6 text-end">
                        <span>{{ $test->soLuongCauHoi }} câu</span>
                    </div>
                </div>
            </div>
            @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($test->ngayKetThucThi)))
                <button class="btn btn-hero btn-danger w-100" disabled role="button">Đã quá thời gian làm bài</button>    
            @else
                <a href="{{ route('user.class.test.take-test', $test->id) }}" class="btn btn-hero btn-info w-100 btn-st">Bắt đầu thi <i class="fa fa-angle-right"></i></a>
            @endif
        </div>
    </div>
</div>