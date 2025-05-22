<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Danh sách thành viên trong lớp</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
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
              <a href="{{route('admin.class.list-class.add-user', $oneClass->id)}}" class="btn btn-danger nav-link form__search--danger">
                <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
                <span class="menu-title">Thêm thành viên</span>
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
                  <th>Họ tên</th>
                  <th>Mã Thành Viên</th>
                  <th>Giới tính</th>
                  <th>Ngày sinh</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allUser as $index => $classDetail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $classDetail->user->hoTen ?? 'N/A' }}</td>
                        <td>{{ $classDetail->user->maThanhVien ?? 'N/A' }}</td>
                        <td>
                            {{ optional($classDetail->user)->gioiTinh == 1 ? 'Nam' : 'Nữ' }}
                        </td>
                        <td>
                            {{ optional($classDetail->user)->ngaySinh ? \Carbon\Carbon::parse($classDetail->user->ngaySinh)->format('d/m/Y') : 'N/A' }}
                        </td>
                        <td>
                          <form action="{{ route('admin.class.list-class.remove-student', [
                              'maKhoi' => $classDetail->maKhoi,
                              'maThanhVien' => $classDetail->maThanhVien
                          ]) }}" 
                          method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa thành viên này khỏi lớp này không?')">
                                  Xóa thành viên
                              </button>
                          </form>                           
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>

  
  