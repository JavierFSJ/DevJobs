<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    protected $listeners = ['buscar' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
    }

    public function render()
    {   
        $vacantes = Vacante::when($this->termino , function($query){
            $query->where('titulo' , 'LIKE' , '%' . $this->termino . "%");      
        })
        ->when($this->categoria , function($query){
            $query->where('categoria' , $this->categoria);      
        })
        ->when($this->salario , function($query){
            $query->where('salario_id' , $this->salario);      
        })
        ->paginate(15);

        return view('livewire.home-vacantes', compact('vacantes'));
    }
}
