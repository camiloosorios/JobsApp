<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    //Defirnir ultimo día como una fecha
    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'descripcion',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'imagen',
        'user_id'
    ];
}
