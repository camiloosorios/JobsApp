<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
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

        //Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');

        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        //Crear la vacante
        Vacante::create([
            'titulo'=> $datos['titulo'],
            'descripcion'=> $datos['descripcion'],
            'salario_id'=> $datos['salario'],
            'categoria_id'=> $datos['categoria'],
            'empresa'=> $datos['empresa'],
            'ultimo_dia'=> $datos['ultimo_dia'],
            'imagen'=> $datos['imagen'],
            'user_id'=> auth()->user()->id,
        ]);

        //Crear mensaje
        session()->flash('mensaje', 'La Vacante se publicó correctamente');

        //Redireccionar al usuario al dashboard
        return redirect()->route('vacantes.index');
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
