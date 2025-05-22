<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'ketquas';


    protected $fillable = [
        'maThanhVien',
        'maDeThi',
        'soCauDung', 'diemThi', 'thoiGianVaoThi', 'thoiGianLamBai'
    ];

    public function deThi()
    {
        return $this->belongsTo(Test::class, 'maDeThi', 'id'); 
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'maThanhVien', 'maThanhVien');
    }
    public function chiTiet()
    {
        return $this->hasMany(ChiTietBaiLam::class, 'ketqua_id', 'id');
    }
}
