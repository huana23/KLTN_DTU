<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Quản lí bài kiểm tra</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lí bài kiểm tra</li>
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
              <a href="{{route('admin.test.create')}}" class="btn btn-danger nav-link form__search--danger">
                <span class="menu-icon"><i class="mdi mdi-account-multiple-plus mr-1"></i> </span>
                <span class="menu-title">Thêm bài kiểm tra</span>
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
                <th>Tên bài kiểm tra</th>
                <th>Ngày kiểm tra</th>
                <th>Ngày kết thúc</th>
                <th>Thời gian kiểm tra</th>
                <th>Số lượng câu hỏi</th>
                <th>Hành Động</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($allTest) && is_object($allTest))
                @foreach($allTest as $onesTest)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{$onesTest->tenBaiThi}}</td>
                    <td>{{ \Carbon\Carbon::parse($onesTest->ngayThi)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($onesTest->ngayKetThucThi)->format('d/m/Y') }}</td>

                  <td>{{$onesTest->thoiGianThi}} phút</td>
                  <td>{{$onesTest->soLuongCauHoi}} câu</td>
                        
                  <td>
                    
                    <div class="block-options">
                      <div class="dropdown">
                        <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="mdi mdi-settings"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7" style="">
                            <a href="{{ route('admin.test.edit', $onesTest->id) }}" class="btn btn-info btn__customer dropdown-item dropdown-item__customer">
                              <span class="menu-icon">
                                <i class="mdi mdi-calendar-edit"></i>
                                Sửa bài kiểm tra
                              </span>
                            </a>
                            <a href="{{route('admin.test.delete', $onesTest->id)}}" class="btn btn-danger btn__customer dropdown-item dropdown-item__customer">
                              <span class="menu-icon"><i class="mdi mdi-delete"></i>Xoá bài kiểm tra</span>
                              
                            </a>
                            <a href="{{route('admin.test.list-test',  $onesTest->id)}}" class="dropdown-item btn btn-info btn__customer dropdown-item__customer">
                              <span class="menu-icon"> 
                                <i class="mdi mdi-information"></i>
                                Danh sách câu hỏi
                              </span>
                            </a>
                            <a href="{{route('admin.test.assign-exam',  $onesTest->id)}}" class="dropdown-item btn btn-info btn__customer dropdown-item__customer">
                              <span class="menu-icon"> 
                                <i class="mdi mdi-google-classroom"></i>
                                Giao bài kiểm tra
                              </span>
                            </a>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  {{$allTest->links('pagination::bootstrap-4')}}
  </div>

  
  