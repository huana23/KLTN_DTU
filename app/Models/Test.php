<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'dethis';

    protected $fillable = ['tenBaiThi','ngayThi', 'thoiGianThi', 'soLuongCauHoi', 'ngayKetThucThi', 'monThi'];

    public function khois()
    {
        return $this->belongsToMany(ClassSubject::class, 'giaodethi', 'maDeThi', 'maKhoi');
    }

    public function cauhois()
    {
        return $this->belongsToMany(Question::class, 'cauhoi_dethi', 'dethi_id', 'cauhoi_id');
    }
   
    public function monHoc()
    {
        return $this->belongsTo(Subject::class, 'monThi');
    }
}
