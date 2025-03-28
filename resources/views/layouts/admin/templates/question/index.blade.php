<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Quản lí câu hỏi</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lí câu hỏi</li>
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
              <a href="{{route('admin.question.create')}}" class="btn btn-danger nav-link form__search--danger">
                <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
                <span class="menu-title">Thêm câu hỏi</span>
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
              @if(isset($allQuestion) && is_object($allQuestion))
                @foreach($allQuestion as $onesQuestion)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{$onesQuestion->cauHoi}}</td>
                    <td>{{$onesQuestion->monHoc->tenMonHoc}}</td>
                    <td>{{$onesQuestion->mucDo->tenMucDo}}</td>
                    <td>{{$onesQuestion->ghiChu}}</td>



                    
                        
                  <td>
                    <a href="{{route('admin.question.edit', $onesQuestion->id)}}" class="btn btn-info btn__customer">
                      <span class="menu-icon">
                        <i class="mdi mdi-calendar-edit"></i>
                      </span>
                    </a>
                    <a href="{{route('admin.question.delete', $onesQuestion->id)}}" class="btn btn-danger btn__customer">
                      <span class="menu-icon"><i class="mdi mdi-delete"></i></span>
                    </a>
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  {{$allQuestion->links('pagination::bootstrap-4')}}
  </div>

  
  