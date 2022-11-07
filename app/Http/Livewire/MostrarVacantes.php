<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{   
    /*Comunicando el template con backend  */
    /* Siempre con listeners: son los funciones que estaran a la espera de un evento*/
    /* protected $listeners = ['testPhp']; -> importante
    public function testPhp($vacante_id){
        dd($vacante_id);
    } */

    protected $listeners = ['eliminarVacante'];
    
    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id' , auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacantes' , compact('vacantes'));
    }
}
