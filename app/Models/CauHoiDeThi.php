<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauHoiDeThi extends Model
{
    use HasFactory;

    protected $table = 'cauhoi_dethi';

    protected $fillable = ['cauhoi_id', 'dethi_id'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'cauhoi_id', 'id'); 
    }

    public function test()
    {
        return $this->belongsTo(Test::class, 'dethi_id', 'id');
    }
}
