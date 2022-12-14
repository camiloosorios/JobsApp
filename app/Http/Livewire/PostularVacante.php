<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        //Validar que se haya cargado el PDF
        $datos = $this->validate();

        //Almacenar la hoja de vida
        $pdf = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $pdf);

        //Crear candidato de la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //Crear notificación y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //Mostrar mensaje de que se postulo correctamente
        session()->flash('mensaje', 'Se postulo correctamente a la vacante');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
