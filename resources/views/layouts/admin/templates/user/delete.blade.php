<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
            Xoá thành viên
        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.user')}}">Người dùng</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Xoá thành viên
            </li>
          </ol>
        </nav>
      </div>

      <div class="page-content">
        <form action="{{ route('admin.user.destroy', $oneUser->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                            <p>Bạn đang muốn xoá thành viên có email là : {{ $oneUser->email }}</p>
                            <p><span class="text-danger">Lưu ý : không thể khôi phục thành viên sau khi xoá . Hãy chắc chắn bạn muốn chọn tính năng này</span></p>
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
                                          <input type="text" readonly  name="email" class="form-control" value="{{old('email', ($oneUser->email) ?? '')}}"  placeholder="Nhập email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Mã thành viên
                                                <span class="text-danger">(*)</span>
                                            </label>
                                          <input type="text"name="maThanhVien" readonly value="{{old('maThanhVien', ($oneUser->maThanhVien) ?? '')}}"  class="form-control"  placeholder="Nhập mã thành viên">
                                        </div>
                                    </div>                                                                                              
                                    
                                    <div class="col-lg-12">
                                        <button type="submit" name="send" value="send" class="btn btn-danger mr-2">Xoá thành viên</button>
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
