<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Sửa bài kiểm tra

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.test')}}">Bài kiểm tra</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Sửa bài kiểm tra
            </li>
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
        <form action="{{ route('admin.test.update', $oneTest->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin bài kiểm tra</p>
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
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Tên bài kiểm tra</label>
                                                <input type="text"  name="tenBaiThi" value="{{ $oneTest->tenBaiThi }}" class="form-control" placeholder="Nhập tên bài kiểm tra">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Ngày kiểm tra</label>
                                                <input type="date" name="ngayThi" value="{{ Carbon\Carbon::parse($oneTest->ngayThi)->format('Y-m-d') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Thời gian thi
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"name="thoiGianThi" value="{{ $oneTest->thoiGianThi }}"  class="form-control"  placeholder="Nhập thời gian thi ( Tính theo phút )">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="control-label text-right">Số lượng câu hỏi
                                            <span class="text-danger">(*)</span>
                                        </label>
                                      <input type="text"name="soLuongCauHoi" value="{{$oneTest->soLuongCauHoi}}"  class="form-control"  placeholder="Nhập số lượng câu hỏi">
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
