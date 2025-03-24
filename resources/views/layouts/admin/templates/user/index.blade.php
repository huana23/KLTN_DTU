<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Quản lí người dùng</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Quản lí người dùng</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('admin.user') }}" class="form__search">
          @php
            $perpage = request('perpage') ?: old('perpage')
          @endphp
          <select class="form-control input-sm filter  mr-10 form__search--select" name="perpage" aria-label="Default select example">
            @for($i = 10 ; $i <= 200; $i+=10)
            <option {{ ($perpage == $i) ? 'selected' : ''}} value="{{$i}}"> {{$i}} bản ghi</option>
            @endfor
          </select>
          <div class="input-group form__search--group">
            <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}" placeholder="Nhập từ khoá tìm kiếm" class="form-control form__search--input">
            <span class="input-group-append form__search--append">
                <button type="submit" name="search" value="search" class="btn btn-primary btn-sm"> Tìm kiếm</button>
            </span>
            <a href="{{route('admin.user.create')}}" class="btn btn-danger nav-link form__search--danger">
              <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
              <span class="menu-title">Thêm mới thành viên</span>
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
              <th>Mã Thành Viên</th>
              <th>Avatar</th>
              <th>Thông tin thành viên</th>
              <th>Địa chỉ</th>
              <th>Hành Động</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($allUsers) && is_object($allUsers))
            @foreach($allUsers as $oneUser)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $oneUser->maThanhVien }}</td>
              <td><img class="img-staff" src="{{ asset($oneUser->img) }}" alt="avatar"></td>
              <td>
                <div class="info-item name">
                    {{ $oneUser->hoTen }}
                </div>
                <div class="info-item email">
                  {{ $oneUser->email }}
                </div>
                <div class="info-item phone">
                  {{ $oneUser->dienThoai }}
                </div>
              </td>
              <td>
                <div class="address-item text-truncate">
                  {{ $oneUser->diaChi }}
                </div>
              </td>
              <td>
                <a href="{{route('admin.user.edit', $oneUser->id)}}" class="btn btn-info btn__customer">
                  <span class="menu-icon">
                    <i class="mdi mdi-calendar-edit"></i>
                  </span>
                </a>
                <a href="{{route('admin.user.delete', $oneUser->id)}}" class="btn btn-danger btn__customer">
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
  {{$allUsers->links('pagination::bootstrap-4')}}
</div>
