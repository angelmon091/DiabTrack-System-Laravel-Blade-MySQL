@props(['title' => 'DiabTrack'])

<div class="main-container">
    <div class="brand-section">
        <h1 class="logo">D<span>ia</span>bTrack</h1>
        <p class="slogan">{{ __('Monitorea tu salud, vive mejor') }}</p>
        <p class="description">{{ __('Con Diabtrack lleva un control más inteligente para una vida más saludable') }}</p>
    </div>

    <div class="login-card">
        {{ $slot }}
    </div>
</div>
