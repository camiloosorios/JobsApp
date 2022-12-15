<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class FiltarVacantes extends Component
{

    //Declaración de las variables del formulario
    public $termino;
    public $categoria;
    public $salario;

    public function leerDatosFormulario()
    { 
        //Comunicación con el elemento padre
        $this->emit('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {

        //Consultas a la DB
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
