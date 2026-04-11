<section>
    <header class="mb-4">
        <h3 class="fw-bold text-dark fs-5">
            <i class="fa-solid fa-id-card me-2 text-diab-primary"></i> {{ __('Información del Perfil') }}
        </h3>

        <p class="mt-1 small text-muted">
            {{ __("Actualiza los datos básicos de tu cuenta y tu dirección de correo electrónico.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label class="form-label small fw-bold text-muted text-uppercase" for="name">{{ __('Nombre completo') }}</label>
            <input id="name" name="name" type="text" class="form-control diab-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @if($errors->has('name'))
                <span class="text-danger extra-small">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="mb-4">
            <label class="form-label small fw-bold text-muted text-uppercase" for="email">{{ __('Correo Electrónico') }}</label>
            <input id="email" name="email" type="email" class="form-control diab-input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @if($errors->has('email'))
                <span class="text-danger extra-small">{{ $errors->first('email') }}</span>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="extra-small text-dark">
                        {{ __('Tu dirección de correo no está verificada.') }}
                        <button form="send-verification" class="btn btn-link p-0 extra-small text-decoration-underline text-muted">
                            {{ __('Haz clic aquí para re-enviar el correo de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 fw-medium extra-small text-success">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4 mt-4">
            <button type="submit" class="btn-diab-primary shadow-sm">{{ __('Guardar Cambios') }}</button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="small text-success fw-semibold animate-fade-in">
                    <i class="fa-solid fa-circle-check me-1"></i> {{ __('Perfil actualizado con éxito.') }}
                </div>
            @endif
        </div>
    </form>
</section>

