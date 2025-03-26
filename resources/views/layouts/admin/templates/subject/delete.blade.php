<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Xoá môn học

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.subject')}}">Môn học</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Xoá môn học
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
        <form action="{{ route('admin.subject.destroy', $oneSubject->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                            <p>Bạn đang muốn xoá môn học có tên là : {{ $oneSubject->tenMonHoc }}</p>
                            <p><span class="text-danger">Lưu ý : không thể khôi phục môn học sau khi xoá . Hãy chắc chắn bạn muốn chọn tính năng này</span></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-7 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Tên môn học
                                                <span class="text-danger">(*)</span>
                                            </label>
                                          <input type="text" readonly  name="tenMonHoc" class="form-control" value="{{ $oneSubject->tenMonHoc }}"  placeholder="Nhập tên môn học">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Mô tả
                                                <span class="text-danger">(*)</span>
                                            </label>
                                          <input type="text"name="meTa" readonly  value="{{ $oneSubject->meTa }}"  class="form-control"  placeholder="Nhập họ mô tả">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Chọn khối</label>
                                            <select name="maKhoi" class="form-control" disabled >
                                                @if(isset($allClass) && is_object($allClass))
                                                    @foreach($allClass as $class)
                                                        <option value="{{ $class->id }}" 
                                                                @if(old('maKhoi') == $class->id) selected @endif>
                                                            {{ $class->tenKhoi }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <button type="submit" name="send" value="send" class="btn btn-primary mr-2">Xoá</button>
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
