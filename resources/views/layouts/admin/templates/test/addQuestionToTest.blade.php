<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
                Thêm câu hỏi vào bài thi

        </h3>
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.class')}}">Lớp học</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Thêm câu hỏi vào bài thi
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
                <div class="col-lg-3 grid-margin">
                    <div class="panel-head">
                        <div class="panel-title">Danh sách các câu hỏi</div>
                        <div class="panel-description">
                            <p>Hãy chọn câu hỏi để thêm vào :</p>
                            
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-lg-9 grid-margin">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <table class="table table__customer">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Câu hỏi</th>
                                                <th>Môn học</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$question->cauHoi}}</td>
                                                <td>{{$question->monHoc->tenMonHoc}}</td>
                                                <td>
                                                    @if ($addedQuestionsCount >= $test->soLuongCauHoi)
                                                        <button class="ms-3 btn btn-secondary" disabled>Đã đủ câu hỏi</button>
                                                    @elseif (!in_array($question->id, $questionsInTest))
                                                        <form action="{{ route('admin.test.list-question.store-test') }}" method="POST">
                                                            @csrf
                                                            <input name="cauhoi_id" type="hidden" value="{{ $question->id }}">
                                                            <input name="dethi_id" type="hidden" value="{{ $test->id }}">
                                                            <button class="ms-3 btn btn-success">Add</button>
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
                                    {{-- {{$users->links('pagination::bootstrap-4')}} --}}
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


