<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Xoá bài kiểm tra

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.test')}}">Bài kiểm tra</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Xoá bài kiểm tra
            </li>
          </ol>
        </nav>
      </div>
      <div class="page-content">
        <form action="{{ route('admin.test.destroy', $oneTest->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                            <p>Bạn đang muốn xoá bài kiểm tra có tên là : {{ $oneTest->tenBaiThi }}</p>
                            <p><span class="text-danger">Lưu ý : không thể khôi phục bài kiểm sau khi xoá . Hãy chắc chắn bạn muốn chọn tính năng này</span></p>
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
                                                    <input type="text" readonly name="tenBaiThi" value="{{ $oneTest->tenBaiThi }}" class="form-control" placeholder="Nhập tên bài kiểm tra">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="" class="control-label text-right">Ngày kiểm tra</label>
                                                    <input type="date" readonly name="ngayThi" value="{{ Carbon\Carbon::parse($oneTest->ngayThi)->format('Y-m-d') }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Thời gian thi
                                                <span class="text-danger">(*)</span>
                                            </label>
                                          <input type="text" readonly name="thoiGianThi" value="{{ $oneTest->thoiGianThi }}"  class="form-control"  placeholder="Nhập thời gian thi ( Tính theo phút )">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Số lượng câu hỏi
                                                <span class="text-danger">(*)</span>
                                            </label>
                                          <input type="text"  readonly name="soLuongCauHoi" value="{{$oneTest->soLuongCauHoi}}"  class="form-control"  placeholder="Nhập số lượng câu hỏi">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <button type="submit" name="send" value="send" class="btn btn-danger mr-2">Xoá</button>
                                        <button class="btn btn-dark">Huỷ bỏ</button>
                                    </div>
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
