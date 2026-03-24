<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        @if (session('status'))
            <div class="auth-status auth-status--success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <x-text-input 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="{{ __('Correo Electrónico') }}" 
                required 
                autofocus 
                autocomplete="username"
                icon="fa-regular fa-envelope" 
            />
            <x-input-error :messages="$errors->get('email')" />

            <x-primary-button>
                {{ __('Enviar Enlace') }}
            </x-primary-button>

            <p class="footer-link">
                {{ __('¿Recordaste tu contraseña?') }} 
                <a href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
            </p>
        </form>
    </x-auth-card>
</x-guest-layout>
