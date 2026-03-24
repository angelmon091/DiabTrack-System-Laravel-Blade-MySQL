<x-guest-layout>
    <x-auth-card>
        <div class="verify-email-text">
            {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu correo electrónico haciendo clic en el enlace que te acabamos de enviar? Si no recibiste el correo, con gusto te enviaremos otro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="auth-status auth-status--success">
                {{ __('Se ha enviado un nuevo enlace de verificación al correo electrónico que proporcionaste durante el registro.') }}
            </div>
        @endif

        <div class="verify-email-actions">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button>
                    {{ __('Reenviar Correo') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-link">
                    {{ __('Cerrar Sesión') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
