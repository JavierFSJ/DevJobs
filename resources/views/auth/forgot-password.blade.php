<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('¿Olvidaste tu password coloca tu email de registro y enviaremos un email para poder restablecer tu password.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" novalidate>
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4 my-2">
                <x-link :href="route('register')">
                    Crear cuenta
                </x-link>

                <x-link :href="route('login')">
                    Iniciar Sesion
                </x-link>
            </div>


            <x-primary-button class="w-full justify-center mt-4">
                {{ __('Restablecer password') }}
            </x-primary-button>

        </form>
    </x-auth-card>
</x-guest-layout>
