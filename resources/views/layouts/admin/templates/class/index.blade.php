<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Quản lí lớp học</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lí lớp học</li>
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
              <a href="{{route('admin.class.create')}}" class="btn btn-danger nav-link form__search--danger">
                <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
                <span class="menu-title">Thêm lớp học</span>
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
                <th>Tên lớp</th>
                <th>Mô tả</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($allClass) && is_object($allClass))
                @foreach($allClass as $onesClass)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{$onesClass->tenKhoi}}</td>
                    <td>{{$onesClass->meTa}}</td>

                    
                        
                  <td>
                    <a href="{{ route('admin.class.edit', $onesClass->id) }}" class="btn btn-info btn__customer">
                      <span class="menu-icon">
                        <i class="mdi mdi-calendar-edit"></i>
                      </span>
                    </a>
                    <a href="{{route('admin.class.delete', $onesClass->id)}}" class="btn btn-danger btn__customer">
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
  {{$allClass->links('pagination::bootstrap-4')}}
  </div>

  
  