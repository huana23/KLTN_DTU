<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Result;
use App\Models\Subject;
use App\Models\Test;


class ResultUserExport implements FromCollection, WithHeadings
{
    protected $classId;
    protected $subjectId;

    public function __construct($classId, $subjectId)
    {
        $this->classId = $classId;
        $this->subjectId = $subjectId;
    }


    public function collection()
    {
        
        $subject = Subject::find($this->subjectId);

        
        $subjects = Subject::all();

        
        $filteredSubjects = $subjects->filter(function ($subjectItem) {
            return $subjectItem->id == $this->subjectId;
        });

        
        $subjectIds = $filteredSubjects->pluck('id');
        $classTestIds = Test::whereIn('monThi', $subjectIds)->pluck('id');
        $results = Result::whereIn('maDeThi', $classTestIds)->get();

       return $results->map(function ($result) {
            
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

            return [
                'Mã sinh viên' => $result->maThanhVien,       
                'Mã đề thi' => $result->deThi->tenBaiThi,   
                'Điểm thi' => $result->diemThi,  
                'Thời gian vào thi' => $result->thoiGianVaoThi,
                'Thời gian làm bài (phút)' => $timeFormatted,
                'Số câu đúng' => $result->soCauDung ,
                'Ngày tạo' => $result->created_at->format('d/m/Y H:i')
            ];
        });

        
    }

    public function headings(): array
    {
        return [
            'Mã sinh viên',
            'Mã đề thi',
            'Điểm thi',
            'Thời gian vào thi',
            'Thời gian làm bài (phút)',
            'Số câu đúng',
            'Ngày tạo'

        ];
    }
}


