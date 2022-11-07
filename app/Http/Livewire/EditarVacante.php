<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public
        $idVacante,
        $titulo,
        $salario,
        $categoria,
        $empresa,
        $ultimo_dia,
        $descripcion,
        $imagen,
        $imagenNueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required|numeric',
        'categoria' => 'required|numeric',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagenNueva' => 'nullable|image|max:1024'
    ];

    public function mount(Vacante $vacante)
    {
        $this->idVacante = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        /* Carbon para fechas */
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
        $data = $this->validate();
        $vacante = Vacante::find($this->idVacante);

        //Si hay una nueva imagen
        if ($this->imagenNueva) {
            $imagen = $this->imagenNueva->store('public/vacantes');
            $data['imagen'] = str_replace('public/vacantes/' , '' , $imagen);
        }

        //Encontrar la vacante a editar
        $vacante->titulo = $data['titulo'];
        $vacante->salario_id = $data['salario'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->empresa = $data['empresa'];
        $vacante->ultimo_dia = $data['ultimo_dia'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->imagen = $data['imagen'] ?? $vacante->imagen;

        //Guardar la vacante 
        $vacante->save();

        //Redirección
        session()->flash('mensaje', 'Lo vacante se actualizó Correctament');
        return redirect()->route('vacante.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante', compact('salarios', 'categorias'));
    }
}
