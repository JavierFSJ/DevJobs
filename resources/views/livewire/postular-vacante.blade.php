<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2l font-bold my-4">Postularme a esta vacante</h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-500 font-bold p-2 my-5">
            {{ session('mensaje')}}
        </div>
    @endif
    <form wire:submit.prevent="postularme" class="w-96 mt-5 mb-5">
        <div class="mb-4">
            <x-input-label for="cv"  :value="__('Salario')" />
            <input id="cv" type="file" accept=".pdf" class="block mt-1 w-full" wire:model="cv"/>
        </div>
        <x-primary-button class="mt-5">
            Postularme
        </x-primary-button>
    </form>

    @error('cv')
        <livewire:mostrar-alerta :message="$message"/>
    @enderror
</div>
