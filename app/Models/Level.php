<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenMucDo',
        'meTa',


    ];
    public function cauHois()
    {
        return $this->hasMany(Question::class, 'maMucDo', 'id');
    }
    protected $table = 'mucdokhos';
}
