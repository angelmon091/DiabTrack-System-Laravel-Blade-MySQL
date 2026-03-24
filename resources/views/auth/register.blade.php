<x-guest-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <x-text-input 
                type="text" 
                name="name" 
                :value="old('name')" 
                placeholder="{{ __('Nombre Completo') }}" 
                required 
                autofocus 
                autocomplete="name"
                icon="fa-regular fa-user" 
            />
            <x-input-error :messages="$errors->get('name')" />
            
            <!-- Email Address -->
            <x-text-input 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="{{ __('Correo Electrónico') }}" 
                required 
                autocomplete="username"
                icon="fa-regular fa-envelope" 
            />
            <x-input-error :messages="$errors->get('email')" />

            <!-- Password -->
            <x-text-input 
                type="password" 
                name="password" 
                placeholder="{{ __('Contraseña') }}" 
                required 
                autocomplete="new-password"
                icon="fa-solid fa-lock" 
            />
            <x-input-error :messages="$errors->get('password')" />

            <!-- Confirm Password -->
            <x-text-input 
                type="password" 
                name="password_confirmation" 
                placeholder="{{ __('Confirmar Contraseña') }}" 
                required 
                autocomplete="new-password"
                icon="fa-solid fa-lock" 
            />
            <x-input-error :messages="$errors->get('password_confirmation')" />
            
            <x-primary-button>
                {{ __('Registrarse') }}
            </x-primary-button>

            <p class="footer-link">
                {{ __('¿Ya tienes una cuenta?') }} 
                <a href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
            </p>
        </form>
    </x-auth-card>
</x-guest-layout>
