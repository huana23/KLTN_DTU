<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Thêm mới thành viên</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.user')}}">Người dùng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới thành viên</li>
          </ol>
        </nav>
      </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div class="page-content">
        <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin người sử dụng</p>
                            <p>Lưu ý những trường hợp đánh dấu <span class="text-danger">(*)</span> là bắt buộc điền</p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-7 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Email
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"  name="email" class="form-control" value="{{old('email')}}"  placeholder="Nhập email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Họ và tên
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"name="hoTen" value="{{old('hoTen')}}"  class="form-control"  placeholder="Nhập họ và tên">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Mã thành viên
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"name="maThanhVien" value="{{old('maThanhVien')}}"  class="form-control"  placeholder="Nhập mã thành viên">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Điện thoại
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"name="dienThoai" value="{{old('dienThoai')}}"  class="form-control"  placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Chọn giới tính</label>
                                        <select name="gioiTinh" class="form-control">
                                          <option value="0">Male</option>
                                          <option value="1">Female</option>
                                        </select>
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Điạ chỉ
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"name="diaChi" value="{{old('diaChi')}}"  class="form-control"  placeholder="Nhập địa chỉ">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Ngày Sinh
                                        </label>
                                      <input type="date"name="ngaySinh"  class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Tải avatar
                                        </label>
                                        <div>
                                            <input type="file" name="img" id="imgUpload"  value="{{old('img')}}" accept=".png, .jpg, .jpeg" class="form-control" >
                                            <label for="imgUpload"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Nhập mật khẩu
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="password"name="password"  class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Nhập lại mật khẩu
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="password"name="re_password"  class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="send" value="send" class="btn btn-primary mr-2">Lưu lại</button>
                                    <button class="btn btn-dark">Huỷ bỏ</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
