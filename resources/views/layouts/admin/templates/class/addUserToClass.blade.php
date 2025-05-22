<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Thêm thành viên vào lớp

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.class')}}">Lớp học</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Thêm thành viên vào lớp
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
        <div>
            
            <div class="row">
                <div class="col-lg-5 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Danh sách các thành viên</div>
                        <div class="panel-description">
                            <p>Hãy chọn thành viên để thêm vào : {{$class->tenKhoi}}</p>
                            
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-lg-7 grid-margin">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <table class="table table__customer">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên thành viên</th>
                                                <th>Mã thành viên</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->hoTen }}</td>
                                                <td>{{ $user->maThanhVien }}</td>
                                                <td>
                                                    @if (!in_array($user->maThanhVien, $studentsInClass))
                                                        <form action="{{ route('admin.class.list-class.store-user') }}" method="POST">
                                                            @csrf
                                                            <input name="maThanhVien" type="hidden" value="{{ $user->maThanhVien }}">
                                                            <input name="maKhoi" type="hidden" value="{{ $class->id }}">
                                                            <button class="ms-3 btn btn-success" id="add_student">Add</button>
                                                        </form>
                                                    @else
                                                        <button class="ms-3 btn btn-secondary" disabled>Đã thêm</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    

                                </div>
                                <div class="col-md-12 grid-margin stretch-card">
                                    {{$users->links('pagination::bootstrap-4')}}
                                </div>

                                   
                                </div>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>


