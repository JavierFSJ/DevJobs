<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv , $vacante;

    public $rules = [
        'cv' => 'required'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Almacenar curriculum
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //Crear el candidato a la vacante
        $this->vacante->cantidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        //Crear la vacante
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id , $this->vacante->titulo, auth()->user()->id ));

        //Mensaje
        session()->flash('mensaje' , 'Se envio correctamente tu informacion, mucha suerte');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
