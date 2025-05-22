<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
           @if (isset($classes) && count($classes) > 0)
            @foreach($classes as $index => $subject)
                <div class="col-md-6 col-xl-4 mb-5">
                    <div class="block block-rounded h-100">
                        <div class="block-content bg-body-light text-center">
                            <h3 class="fs-4 mb-3">
                                {{ $subject->tenMonHoc }}
                            </h3>
                            <h5 class="text-muted mb-3 line-height-custom" style="font-size:13px">
                                {{ $subject->meTa }}
                            </h5>
                            <div class="push">
                                <span class="badge bg-info text-uppercase fw-bold py-2 px-3">
                                    {{ $subject->khoi->tenKhoi }}
                                </span>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col-12">
                                    <a class="btn w-100 btn-secondary btn-view-group" href="{{ route('admin.result.list', ['id' => $subject->maKhoi , 'subject' => $subject->id]) }}">
                                        <i class="bi bi-emoji-expressionless-fill navicon"></i> Xem kết quả
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            <div class="col-12 text-center mt-5">
                <div class="alert alert-warning" role="alert">
                    Chưa có lớp nào
                </div>
            </div>
        @endif
        </div>
    </div>
</div>
