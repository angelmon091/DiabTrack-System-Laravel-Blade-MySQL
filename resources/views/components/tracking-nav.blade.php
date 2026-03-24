@props(['active' => 'signos'])

<section class="categories">
    <a href="{{ route('tracking.vital.create') }}" class="card {{ $active == 'signos' ? 'active-card' : '' }}">
        {{ __('Signos Vitales') }}
    </a>
    <a href="#" class="card {{ $active == 'sintomas' ? 'active-card' : '' }}">
        {{ __('Síntomas') }}
    </a>
    <a href="#" class="card {{ $active == 'nutricion' ? 'active-card' : '' }}">
        {{ __('Nutrición') }}
    </a>
    <a href="#" class="card {{ $active == 'movimiento' ? 'active-card' : '' }}">
        {{ __('Movimiento') }}
    </a>
</section>
