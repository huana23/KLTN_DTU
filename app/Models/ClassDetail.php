<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDetail extends Model
{
    use HasFactory;

    protected $table = 'chitietkhoi';

    protected $fillable = ['maThanhVien','maKhoi'];


    public function user()
    {
        return $this->belongsTo(User::class, 'maThanhVien', 'maThanhVien');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'maKhoi', 'maKhoi');
    }

    public function khoi()
    {
        return $this->belongsTo(ClassSubject::class, 'maKhoi', 'id');
    }

}
