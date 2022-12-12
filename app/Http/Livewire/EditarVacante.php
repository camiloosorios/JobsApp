<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{

    public $vacante_id;
    public $titulo;
    public $descripcion;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'descripcion' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'imagen_nueva' => 'nullable|image|max:2048'
    ];

    public function mount(Vacante $vacante)
    {

        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->descripcion = $vacante->descripcion;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->imagen = $vacante->imagen;

    }

    public function editarVacante()
    {

        $datos = $this->validate();

        //Si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        //Encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //Asignar los nuevos valores
        $vacante->titulo = $datos['titulo'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        //Guardar la vacante
        $vacante->save();

        //Redireccionar
        session()->flash('mensaje', 'La vacante se actualizó correctamente');
        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        //Consultar DB
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
