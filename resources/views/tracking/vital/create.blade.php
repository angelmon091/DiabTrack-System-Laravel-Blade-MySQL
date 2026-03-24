@extends('layouts.app')

@section('title', 'DiabTrack - Registro de Signos Vitales')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ingreso_de_datos_global.css') }}">
@endsection

@section('content')
<main class="container">
    <h1>{{ __('Registro de Datos') }}</h1>

    <x-tracking-nav active="signos" />

    <form class="main-content" action="{{ route('tracking.vital.store') }}" method="POST">
        @csrf
        
        <section class="form-section">
            <div class="input-group">
                <label>{{ __('Nivel de Glucosa') }}: <strong id="glucose_val">120</strong>mg/dL</label>
                <input type="range" name="glucose_level" min="40" max="300" value="{{ old('glucose_level', 120) }}" oninput="document.getElementById('glucose_val').innerText = this.value">
                <x-input-error :messages="$errors->get('glucose_level')" />
            </div>

            <div class="input-group">
                <label>{{ __('Presión Arterial (Sistólica/Diastólica)') }}:</label>
                <div class="d-flex gap-2">
                    <input type="number" name="systolic" class="form-control bg-transparent text-white" placeholder="Sist." value="{{ old('systolic') }}">
                    <input type="number" name="diastolic" class="form-control bg-transparent text-white" placeholder="Diast." value="{{ old('diastolic') }}">
                </div>
                <x-input-error :messages="$errors->get('systolic')" />
                <x-input-error :messages="$errors->get('diastolic')" />
            </div>

            <div class="input-group">
                <label>{{ __('Frecuencia Cardiaca') }}: <strong id="heart_val">75</strong>bpm</label>
                <input type="range" name="heart_rate" min="40" max="200" value="{{ old('heart_rate', 75) }}" oninput="document.getElementById('heart_val').innerText = this.value">
                <x-input-error :messages="$errors->get('heart_rate')" />
            </div>

            <div class="input-group">
                <label>{{ __('Hemoglobina Glicosilada (HbA1c)') }}:</label>
                <input type="number" step="0.1" name="hba1c" class="form-control bg-transparent text-white" placeholder="% de HbA1c" value="{{ old('hba1c') }}">
                <x-input-error :messages="$errors->get('hba1c')" />
            </div>
        </section>

        <aside class="timing-panel">
            <h3>{{ __('Momento de la Medición') }}</h3>
            <input type="hidden" name="measurement_moment" id="measurement_moment" value="{{ old('measurement_moment', 'Ayunas') }}">
            
            <div class="timing-grid">
                @php
                    $moments = [
                        ['id' => 'Ayunas', 'icon' => 'wb_sunny.png', 'label' => 'Ayunas'],
                        ['id' => 'Antes de Comer', 'icon' => 'no_meals_ouline.png', 'label' => 'Antes de Comer'],
                        ['id' => 'Después de Comer', 'icon' => 'restaurant.png', 'label' => 'Después de Comer'],
                        ['id' => 'Al Dormir', 'icon' => 'bedtime.png', 'label' => 'Al Dormir'],
                    ];
                @endphp

                @foreach($moments as $moment)
                    <button type="button" 
                            class="time-btn {{ old('measurement_moment', 'Ayunas') == $moment['id'] ? 'active-btn' : '' }}" 
                            onclick="setMoment('{{ $moment['id'] }}', this)">
                        <img src="{{ asset('img/medios/iconos/' . $moment['icon']) }}" alt="{{ $moment['label'] }}">
                        <span>{{ __($moment['label']) }}</span>
                    </button>
                @endforeach
            </div>
            <x-input-error :messages="$errors->get('measurement_moment')" />
        </aside>

        <div class="form-actions">
            <button type="reset" class="btn-borrar">{{ __('Borrar') }}</button>
            <button type="submit" class="btn-guardar">{{ __('Guardar') }}</button>
        </div>
    </form>

</main>
@endsection

@section('scripts')
<script>
    function setMoment(val, btn) {
        document.getElementById('measurement_moment').value = val;
        document.querySelectorAll('.time-btn').forEach(b => b.classList.remove('active-btn'));
        btn.classList.add('active-btn');
    }
</script>
@endsection
