<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;

class FiltrarVacantes extends Component
{
    public $termino;
    public $categoria;
    public $salario;

    public function leerDatos()
    {
        $this->emit('buscar', $this->termino , $this->categoria , $this->salario);
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
