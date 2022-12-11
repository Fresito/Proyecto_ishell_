<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    use HasFactory;

    protected $table = 'tb_nivel';
    protected $primaryKey = 'id_nivel';
    protected $fillable = [
        'nivel'
    ];
    
}