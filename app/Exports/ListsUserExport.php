<?php

namespace App\Exports;

use App\Models\ClassDetail;
use App\Models\ClassSubject;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ListsUserExport implements FromArray, WithHeadings
{
    protected $classId;
    protected $tenLop;

    public function __construct($classId)
    {
        $this->classId = $classId;
        $this->tenLop = optional(ClassSubject::find($classId))->tenKhoi ?? 'Không rõ';
    }

    public function array(): array
    {
        $allUser = ClassDetail::where('maKhoi', $this->classId)->with('user')->get();
        $rows = [];

        foreach ($allUser as $user) {
            $rows[] = [
                $user->user->hoTen,
                $user->maThanhVien,
                $user->user->email,
                $user->user->dienThoai,
                $user->user->diaChi,
            ];
        }

        return $rows;
    }

    public function headings(): array
    {
        return [
            ["Danh Sách Lớp: " . $this->tenLop],
            ['Họ và tên', 'Mã sinh viên', 'Email', 'Số điện thoại', 'Địa chỉ']
        ];
    }
}
