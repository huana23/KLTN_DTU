<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Chọn lớp để giao bài kiểm tra</h3>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.test')}}">Bài kiểm tra</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giao bài kiểm tra</li>
            </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <table class="table table__customer">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên lớp</th>
                    <th>Mô tả</th>
                    <th>Hành Động</th>
                  </tr>
                </thead>
                <tbody>
                    @if(isset($allClasses) && is_object($allClasses))
                        @foreach($allClasses as $onesClass)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$onesClass->tenKhoi}}</td>
                            <td>{{$onesClass->meTa}}</td>
                            <td>
                                @if (!in_array($onesClass->id, $assignedExams))
                                    <form action="{{ route('admin.test.assign-exam.to-user') }}" method="POST">
                                        @csrf
                                        <input name="maKhoi" type="hidden" value="{{ $onesClass->id }}">
                                        <input name="maDeThi" type="hidden" value="{{ $test->id }}">
                                        <button class="ms-3 btn btn-success">Giao bài kiểm tra</button>
                                    </form>
                                @else
                                    <button class="ms-3 btn btn-secondary" disabled>Đã thêm</button>
                                @endif
                            </td>  

                        </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>