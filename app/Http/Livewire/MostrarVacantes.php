<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    //Se configuran los métodos que escuchan un evento
    // protected $listeners = ['prueba'];

    // public function prueba()
    // {

    // }
    
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante)
    {

        //Borramos la publicación
        $vacante->delete();

    }

    public function render()
    {
        //Consultar vacantes del usuario con paginación
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
