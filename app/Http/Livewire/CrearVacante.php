<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    /* Properties */
    public $titulo, $salario, $categoria, $empresa, $ultimo_dia, $descripcion, $imagen;

    /* Validaciones */
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required|numeric',
        'categoria' => 'required|numeric',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable|image|max:1024'
    ];

    use WithFileUploads;

    public function crearVacante()
    {
        /* Realiza las validaciones del formulario */
        $datos = $this->validate();

        //Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        $nombreImagen = str_replace('public/vacantes/', '', $imagen);

        //Crear la vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $nombreImagen,
            'user_id' => auth()->user()->id
        ]);

        //Redireccion y mensaje
        session()->flash('mensaje' , 'La vacante se publico correctamente');
        return redirect()->route('vacante.index');
        
    }

    public function render()
    {
        //Consultar la base de datos
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
