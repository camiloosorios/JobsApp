<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    //Declaración de las variables del formulario
    public $titulo;
    public $descripcion;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $imagen;

    use WithFileUploads;

    //Reglas de validación de cada campo
    protected $rules = [
        'titulo' => 'required|string',
        'descripcion' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'imagen' => 'required|image|max:2048',
    ];

    public function crearVacante()
    {
        //Validación de las reglas
        $datos = $this -> validate();
    }

    public function render()
    {
        //Consultar DB
        $salarios = Salario::all();
        $categorias = Categoria::all();

        //Se retorna la vista con la consulta de los salarios
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
