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
      <div class="row mt-5">
        @if(isset($allClass) && is_object($allClass))
          @foreach($allClass as $onesClass)
        <div class="col-md-3">
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title block-class-name">{{$onesClass->tenKhoi}}</h3>
              <div class="block-options">
                <div class="dropdown">
                  <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-settings"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7" style="">
                    <h6 class="dropdown-header">Settings</h6>
                    <div class="dropdown-divider"></div>
                    
                      <a href="{{ route('admin.class.edit', $onesClass->id) }}" class="dropdown-item btn btn-info btn__customer dropdown-item__customer">
                        <span class="menu-icon"> 
                          <i class="mdi mdi-calendar-edit"></i>
                          Sửa
                        </span>
                      </a>
                      <a href="{{route('admin.class.delete', $onesClass->id)}}" class="dropdown-item btn btn-danger btn__customer dropdown-item__customer">
                        <span class="menu-icon"> <i class="mdi mdi-delete"></i>Xoá</span>
                      </a>
                      <a href="{{route('admin.class.list-class', $onesClass->id)}}" class="dropdown-item btn btn-info btn__customer dropdown-item__customer">
                        <span class="menu-icon"> 
                          <i class="mdi mdi-information"></i>
  
                          Danh sách học sinh
                        </span>
                      </a>
                      <a href="{{ route('export.list.class', ['class' => $onesClass->id]) }}" class="dropdown-item btn btn-info btn__customer dropdown-item__customer">
                        <span class="menu-icon"> 
                          <i class="mdi mdi-select-group"></i>
  
                          Xuất danh sách lớp học
                        </span>
                      </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-content">
              <p class="block-class-note">Mô tả : {{$onesClass->meTa}}</p>
              <p class="Si-So">Sỉ số: 
                <span>{{ $studentCounts[$onesClass->id] ?? 0 }}</span>
              </p>
            </div>
          </div>
        </div>
          @endforeach
        @endif
      </div>
    </div>
  {{$allClass->links('pagination::bootstrap-4')}}
  </div>

  
  