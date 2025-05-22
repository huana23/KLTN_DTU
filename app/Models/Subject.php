<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenMonHoc',
        'meTa',
        'maKhoi',


    ];

    public function cauHois()
    {
        return $this->hasMany(Question::class, 'maMonHoc', 'id');
    }


    public function khoi()
{
    return $this->belongsTo(ClassSubject::class, 'maKhoi', 'id');
}

    
    protected $table = 'monhocs';

}
