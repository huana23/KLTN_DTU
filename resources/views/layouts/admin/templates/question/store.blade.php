<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Thêm mới câu hỏi

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.question')}}">câu hỏi</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Thêm mới câu hỏi
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
        <form action="{{ route('admin.question.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Nhập thông tin câu hỏi</p>
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
                                            <label for="" class="control-label text-right">Câu hỏi
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="cauHoi" value="{{ old('cauHoi') }}" class="form-control" placeholder="Nhập câu hỏi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Đáp án A
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="dapAnA" value="{{ old('dapAnA') }}" class="form-control" placeholder="Nhập đáp án A">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Đáp án B
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="dapAnB" value="{{ old('dapAnB') }}" class="form-control" placeholder="Nhập đáp án B">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Đáp án C
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="dapAnC" value="{{ old('dapAnC') }}" class="form-control" placeholder="Nhập đáp án C">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Đáp án D
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="dapAnD" value="{{ old('dapAnD') }}" class="form-control" placeholder="Nhập đáp án D">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Câu trả lời đúng là
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="dapAn" value="{{ old('dapAn') }}" class="form-control" placeholder="Nhập đáp án đúng">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="" class="control-label text-right">Ghi chú
                                            <span class="text-danger">(*)</span>
                                            </label>
                                                <input type="text"  name="ghiChu" value="{{ old('ghiChu') }}" class="form-control" placeholder="Nhập ghi chú">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Chọn tên môn học</label>
                                        <select name="maMonHoc" class="form-control">
                                            @if(isset($allNameSubjects) && is_object($allNameSubjects))
                                                @foreach($allNameSubjects as $name)
                                                    <option value="{{ $name->id }}">
                                                        {{ $name->tenMonHoc }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Chọn mức độ</label>
                                        <select name="maMucDo" class="form-control">
                                            @if(isset($allLevel) && is_object($allLevel))
                                                @foreach($allLevel as $name)
                                                    <option value="{{ $name->id }}">
                                                        {{ $name->tenMucDo }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        
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
