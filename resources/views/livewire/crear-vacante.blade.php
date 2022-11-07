<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante' >
    <div>
        <x-input-label for="tiutlo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('email')" placeholder="Titulo Vacante"/>
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario')" />

        <select wire:model="salario" id="salario" class="rounded-md shadow-sm  w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value=" ">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>

        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select wire:model="categoria" id="categoria" class="rounded-md shadow-sm  w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value=" ">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>

        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('email')" placeholder="Empresa: ej. Netflix, Uber, Shopify."/>
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('email')" placeholder="Empresa: ej. Netflix, Uber, Shopify."/>
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion')" />
        <textarea wire:model="descripcion" id="descripcion" cols="30" rows="10" style="resize: none;"
            class="rounded-md shadow-sm  w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            placeholder="Descripción del puesto"
        ></textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        <div class="my-5">
            @if($imagen)
                Imagen:
                <img src="{{$imagen->temporaryUrl()}}">
            @endif
        </div>


        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <x-primary-button>
        {{ __('Crear Vacante') }}
    </x-primary-button>
</form>
