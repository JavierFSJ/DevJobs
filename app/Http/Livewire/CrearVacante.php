<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{   
    /* Properties */
    public $titulo , $salario , $categoria , $empresa , $ultimo_dia , $descripcion , $imagen;
    
    /* Validaciones */
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required|numeric|between:1,9',
        'categoria' => 'required|numeric|between:1,7',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable'
    ];

    public function crearVacante()
    {
        $this->validate();
    }

    public function render()
    {   
        //Consultar la base de datos
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante' , compact('salarios' , 'categorias'));
    }
}
