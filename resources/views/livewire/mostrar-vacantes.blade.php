<div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b-2 my-2 mt-0 md:flex md:justify-between">
            <div class="space-y-3">
                <a href="{{ route('vacante.show' , $vacante) }}" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500 font-bold"> Ultimo día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-col md:flex-row gap-3 items-strech md:items-center mt-5 md:mt-0 px-10">
                <a href="#"
                    class="text-center bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold  hover:bg-slate-600 transition-colors">
                    Candidatos
                </a>
                <a href="{{ route('vacante.edit' , $vacante ) }}"
                    class="text-center bg-blue-800 py-2 px-4 rounded-lg text-white text-sm font-bold hover:bg-blue-600 transition-colors">
                    Editar
                </a>
                {{-- Comunicar con php component/controller --}}
                {{-- Siempre emit --}}
                {{-- <button wire:click="$emit('test' , {{ $vacante->id }})" href="#" --}}
                {{-- Comunicar a js --}}
                <button wire:click="$emit('deleteElement' , {{ $vacante->id }})" href="#"
                    class="text-center bg-red-600 py-2 px-4 rounded-lg text-white text-sm font-bold hover:bg-red-400 transition-colors">
                    Borrar
                </button>
            </div>
        </div>
    @empty
        <div class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar!</div>
    @endforelse

    <div class="px-2 mb-2">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        /* Comunicacion con livewire */
        Livewire.on('deleteElement', vacanteId => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "La vacante será eliminada de manera permanente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    //Eliminar la vacante del servidor
                    Livewire.emit('eliminarVacante' , vacanteId )

                    Swal.fire(
                        'Eliminado!',
                        'Eliminado correctamente.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
