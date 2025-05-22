<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Danh sách kết quả</h3>
            <div aria-label="breadcrumb">
                
                <a href="{{ route('export.result', ['class' => $id, 'subject' =>  $subject]) }}" class="btn btn-success">
                    Xuất kết quả học sinh
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <table class="table table__customer">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã thành viên</th>
                            <th>Tên bài thi</th>
                            <th>Điểm thi</th>
                            <th>Thời gian vào thi</th>
                            <th>Thời gian làm bài (phút)</th>
                            <th>Số câu đúng</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($results) && $results->count())
                            @foreach($results as $index => $result)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $result->maThanhVien }}</td>
                                    <td>{{ $result->deThi->tenBaiThi }}</td>
                                    <td>{{ $result->diemThi }}</td>
                                    <td>{{ $result->thoiGianVaoThi }}</td>
                                    <td>
                                        @php
                                            
                                            $minutes = floor($result->thoiGianLamBai / 60);  
                                            $seconds = $result->thoiGianLamBai % 60; 

                                            
                                            $timeFormatted = '';
                                            if ($minutes > 0) {
                                                $timeFormatted .= $minutes . ' phút';
                                            }
                                            if ($seconds > 0) {
                                                $timeFormatted .= ($minutes > 0 ? ' ' : '') . $seconds . ' giây';
                                            }

                                            
                                            $timeFormatted = $timeFormatted ?: '0 giây';
                                        @endphp
                                        {{ $timeFormatted }}
                                    </td>
                                    <td>{{ $result->soCauDung }}</td>
                                    <td>{{ $result->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center text-muted">Không có kết quả nào để hiển thị.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
