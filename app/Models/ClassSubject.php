<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenKhoi',
        'meTa',


    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'chitietkhoi', 'maKhoi', 'maThanhVien');
    }
    public function dethis()
    {
        return $this->belongsToMany(Test::class, 'giaodethi', 'maKhoi', 'maDeThi');
    }

    public function subjects() {
        return $this->hasMany(Subject::class, 'maKhoi');
    }



    protected $table = 'khois';
}
