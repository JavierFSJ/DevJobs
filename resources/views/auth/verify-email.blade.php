<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Es necesario confirmar tu cuenta antes de continuar, envia tu email de verificación dando click en el botón y despues verifica tu cuenta.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Hemos enviado un nuevo email de confirmación a tu cuenta de correo.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Verifica tu email') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class=" text-lg font-bold text-gray-600 hover:text-gray-900">
                    {{ __('Cerrar Sesion') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
