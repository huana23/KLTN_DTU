<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoDeThi extends Model
{
    use HasFactory;

    protected $table = 'giaodethi';

    protected $fillable = ['maKhoi', 'maDeThi'];

}
