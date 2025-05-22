<div class="container mt-5 mb-5">
    <div class="row mb-4">
      <div class="col-6">
          <form action="#" id="search-form">
              <div class="input-group border rounded">
                  <button class="btn btn-alt-primary dropdown-toggle btn-filtered-by-state" id="dropdown-filter-state" type="button" data-bs-toggle="dropdown" aria-expanded="false">Tất cả</button>
                  <ul class="dropdown-menu mt-1" aria-labelledby="dropdown-filter-state" style="">
                      <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="0">Chưa làm</a></li>
                      <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="1">Quá hạn</a></li>
                      <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="2">Chưa mở</a></li>
                      <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="3">Đã hoàn thành</a></li>
                      <li><a class="dropdown-item filtered-by-state" href="javascript:void(0)" data-value="4">Tất cả</a></li>
                  </ul>
                  <input type="text" class="form-control" placeholder="Tìm kiếm đề thi, tên môn học..." id="search-input" name="search-input">
              </div>
          </form>
      </div>
    </div>
    
    @if (isset($filteredClassTests) && count($filteredClassTests) > 0)
    @foreach($filteredClassTests as $index => $test)
        <div class="list-test">
            <div class="block block-rounded block-fx-pop mb-3">
                <div class="block-content block-content-full border-start border-3">
                    <div class="d-md-flex justify-content-md-between align-items-md-center">
                        <div class="p-1 p-md-3">
                            <h3 class="h4 fw-bold mb-3 d-md-flex">
                                {{ $test->tenBaiThi }}
                            </h3>
                            <p class="fs-sm text-muted mb-0">
                                <i class="fa fa-clock me-1"></i> Diễn ra từ 
                                <span>{{ \Carbon\Carbon::parse($test->ngayThi)->format('d/m/Y h:i A') }}</span> 
                                đến 
                                <span>{{ \Carbon\Carbon::parse($test->ngayKetThucThi)->format('d/m/Y h:i A') }}</span>
                            </p>
                        </div>
                        <div class="p-1 p-md-3">
                            @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($test->ngayKetThucThi)))
                                <button class="btn btn-danger border rounded-pill px-3 me-1 my-1" disabled="">Quá hạn</button>
                            @else
                                <button class="btn btn-success rounded-pill px-3 me-1 my-1" disabled="">Chưa làm</button>
                            @endif
                            <a class="btn btn-info border rounded-pill px-3 me-1 my-1" href="{{ route('user.class.test.start', $test->id) }}">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="alert alert-warning">
            Không có bài kiểm tra nào.
        </div>
    @endif
  </div>
  