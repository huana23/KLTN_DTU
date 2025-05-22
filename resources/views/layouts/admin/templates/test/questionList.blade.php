<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Danh sách câu hỏi</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách câu hỏi</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="" class="form__search">
            <select class="form-control input-sm filter  mr-10 form__search--select" name="perpage" aria-label="Default select example">
              @for($i = 10 ; $i <= 200; $i+=10)
              <option value="{{$i}}">{{$i}} bản ghi</option>
              @endfor
            </select>
            <div class="input-group form__search--group">
              <input type="text" name="keyword" value="" placeholder="Nhập từ khoá tìm kiếm" class="form-control form__search--input">
              <span class="input-group-append form__search--append">
                  <button type="submit" name="search" value="search" class="btn btn-primary btn-sm"> Tìm kiếm</button>
              </span>
              <a href="{{route('admin.test.list-test.add-question', $oneTest->id)}}" class="btn btn-danger nav-link form__search--danger">
                <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
                <span class="menu-title">Thêm câu hỏi vào bài thi</span>
              </a>
          </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <table class="table table__customer">
            <thead>
              <tr>
                <th>STT</th>
                <th>Câu hỏi</th>
                <th>Tên môn học</th>
                <th>Mức độ khó</th>
                <th>Ghi chú</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
                @if($allQuestion && $allQuestion->isNotEmpty())
                @foreach($allQuestion as $onesQuestion)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $onesQuestion->question->cauHoi }}</td>
                        <td>{{ $onesQuestion->question->monHoc->tenMonHoc }}</td>
                        <td>{{ $onesQuestion->question->mucDo->tenMucDo }}</td>
                        <td>{{ $onesQuestion->question->ghiChu }}</td>
                        <td>
                            <form action="{{ route('admin.class.list-test.remove-question-by-id', ['id' => $onesQuestion->question->id]) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa câu hỏi này không?')">
                                    Xóa câu hỏi
                                </button>
                            </form>
                        </td>                         
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="5">Không có câu hỏi nào trong đề thi.</td>
                    </tr>
                @endif
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $allQuestion->links('pagination::bootstrap-4') }}
    </div>
  </div>

  
  