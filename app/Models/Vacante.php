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

    //Creamos relación entre categoria_id y la tabla Categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class); //categoria_id belongsTo Categorias
    }

    //Creamos relación entre salario_id y la tabla Salarios
    public function salario()
    {
        return $this->belongsTo(Salario::class); //salario_id belogsTo Salarios
    }

    //Creamos relación entre vacantes y candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }

    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');  //Una vacante belongsTo user
    }


    //Validar postulacion
    public function validarPostulacion($vacante)
    {
        return Candidato::where('user_id', auth()->user()->id)
                        ->where('vacante_id', $vacante->id)->count() > 0 
                        ? true : false;
    }

}
