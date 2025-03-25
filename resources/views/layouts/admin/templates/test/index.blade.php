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
        <form action="">
          <ul class="navbar-nav navbar-nav--test row">
              <li class="nav-item col-10">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Tìm kiếm bài kiểm tra">
                </form>
              </li>
              <li class="col-2">
                  <a class="nav-link btn btn-success create-new-button" href="{{route('admin.test.create')}}">+ Tạo bài kiểm tra</a>
                </li>
          </ul>
        </form>
        <div class="row">
          @if(isset($allTests) && is_object($allTests))
            @foreach($allTests as $test)
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body py-3 px-5">
                  <div class="row align-items-center">
                    <div class="col-9 col-sm-9 col-xl-9">
                      <h4>Tên bài kiểm tra : {{ $test->tenBaiThi }}</h4>
                      <p class="mb-2">Thời gian thực hiện : {{ $test->thoiGianThi }} phút</p>
                      <p class="mb-2">Ngày thi : {{ $test->ngayThi }}</p>
                      <p class="mb-2">Số lượng câu hỏi : {{ $test->soLuongCauHoi }} câu</p>
                    </div>
                    
                    <div class="col-3 col-sm-3 col-xl-3 p-0 text-center">
                        <a href="" class="badge badge-outline-success">
                            <span class="menu-icon">
                              <i class="mdi mdi-calendar-edit"></i>
                              Chỉnh sửa
                            </span>
                          </a>
                          <a href="" class="badge badge-outline-danger">
                            <span class="menu-icon"><i class="mdi mdi-delete"></i>Xoá</span>
                          </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          @endif
        </div>

    </div>
    {{$allTests->links('pagination::bootstrap-4')}}
</div>
  