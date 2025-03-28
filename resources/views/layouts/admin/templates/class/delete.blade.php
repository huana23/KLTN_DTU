<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Xoá lớp học

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.class')}}">Lớp học</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Xoá lớp học
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
        <form action="{{ route('admin.class.destroy', $oneClass->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                            <p>Bạn đang muốn xoá tên lớp có tên là : {{ $oneClass->tenKhoi }}</p>
                            <p><span class="text-danger">Lưu ý : không thể khôi phục tên lớp sau khi xoá . Hãy chắc chắn bạn muốn chọn tính năng này</span></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-7 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="" class="control-label text-right">Tên lớp học
                                                <span class="text-danger">(*)</span>
                                                </label>
                                                    <input type="text" readonly  name="tenKhoi" value="{{ $oneClass->tenKhoi }}" class="form-control" placeholder="Nhập tên lớp học">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="" class="control-label text-right">Mô tả
                                                    <span class="text-danger">(*)</span>
                                                </label>
                                                    <input type="text" readonly name="meTa" value="{{ $oneClass->meTa }}" class="form-control" placeholder="Nhập mô tả">
                                            </div>
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
