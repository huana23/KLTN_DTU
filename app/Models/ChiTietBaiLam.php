<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietBaiLam extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_bai_lam';

    protected $fillable = [
        'ketqua_id',
        'cauhoi_id',
        'dapAnDaChon',
        'correct',
    ];

    public function ketqua()
    {
        return $this->belongsTo(Result::class, 'ketqua_id', 'id');
    }

    
    public function cauhoi()
    {
        return $this->belongsTo(Question::class, 'cauhoi_id', 'id');
    }
}
