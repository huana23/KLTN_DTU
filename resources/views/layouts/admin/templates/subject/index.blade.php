<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Quản lí môn học</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lí môn học</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form action="" class="form__search">
            <select class="form-control input-sm filter  mr-10 form__search--select" name="perpage" aria-label="Default select example">
              @for($i = 20 ; $i <= 200; $i+=20)
              <option value="{{$i}}">{{$i}} bản ghi</option>
              @endfor
            </select>
            <div class="input-group form__search--group">
              <input type="text" name="keyword" value="" placeholder="Nhập từ khoá tìm kiếm" class="form-control form__search--input">
              <span class="input-group-append form__search--append">
                  <button type="submit" name="search" value="search" class="btn btn-primary btn-sm"> Tìm kiếm</button>
              </span>
              <a href="{{route('admin.subject.create')}}" class="btn btn-danger nav-link form__search--danger">
                <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
                <span class="menu-title">Thêm môn học mới</span>
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
                <th>Tên môn học</th>
                <th>Mô tả</th>
                <th>Mã khối</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($allSubjects) && is_object($allSubjects))
                @foreach($allSubjects as $onesSubject)
                <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td>{{$onesSubject->tenMonHoc}}</td>
                  <td>{{$onesSubject->meTa}}</td>
                  <td>
                    @php
                      $class = $allClass->firstWhere('id', $onesSubject->maKhoi);
                    @endphp

                    @if($class)
                      {{ $class->meTa }}
                    @else
                      Không tìm thấy khối
                    @endif
                  </td>
                        
                  <td>
                    <a href="{{route('admin.subject.edit', $onesSubject->id)}}" class="btn btn-info btn__customer">
                      <span class="menu-icon">
                        <i class="mdi mdi-calendar-edit"></i>
                      </span>
                    </a>
                    <a href="{{route('admin.subject.delete', $onesSubject->id)}}" class="btn btn-danger btn__customer">
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
  </div>
  