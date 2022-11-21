<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-5">{{ $vacante->titulo }}</h3>
        <div class="md:grid md:grid-cols-2 bg-gray-100 p-3 rounded-lg">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo día:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>


            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->Salario->salario }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-10">
        <div class="md:col-span-2">
            <img class="mb-5" src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen vacante' . $vacante->titulo }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del puesto</h2>
            <p> {{ $vacante->descripcion }} </p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta Vacante? <a class=" text-blue-500 hover:text-blue-600"
                    href="{{ route('login') }}">Obten un cuenta y aplica</a>
            </p>
        </div>


    @endguest

    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcan
    @endauth

</div>
