<x-guest-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('onboarding.store') }}">
            @csrf
            
            <p class="field-label-top">{{ __('Fecha de Nacimiento') }}</p>
            <div class="date-row">
                <div class="select-wrapper">
                    <label>{{ __('Día') }}</label>
                    <select name="birth_day">
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" {{ old('birth_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="select-wrapper">
                    <label>{{ __('Mes') }}</label>
                    <select name="birth_month">
                        @foreach(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $month)
                            <option value="{{ $month }}" {{ old('birth_month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-wrapper">
                    <label>{{ __('Año') }}</label>
                    <select name="birth_year">
                        @for ($i = date('Y'); $i >= 1920; $i--)
                            <option value="{{ $i }}" {{ old('birth_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <x-input-error :messages="$errors->get('birth_day')" />
            <x-input-error :messages="$errors->get('birth_month')" />
            <x-input-error :messages="$errors->get('birth_year')" />

            <div class="input-group-container">
                <x-input-label value="{{ __('Tipo de Diabetes') }}" />
                <select class="full-select" name="diabetes_type">
                    <option value="Diabetes Mellitus Tipo 1" {{ old('diabetes_type') == 'Diabetes Mellitus Tipo 1' ? 'selected' : '' }}>Diabetes Mellitus Tipo 1</option>
                    <option value="Diabetes Mellitus Tipo 2" {{ old('diabetes_type') == 'Diabetes Mellitus Tipo 2' ? 'selected' : '' }}>Diabetes Mellitus Tipo 2</option>
                    <option value="Diabetes Gestacional" {{ old('diabetes_type') == 'Diabetes Gestacional' ? 'selected' : '' }}>Diabetes Gestacional</option>
                </select>
                <x-input-error :messages="$errors->get('diabetes_type')" />
            </div>

            <div class="input-group-container">
                <x-input-label value="{{ __('Peso (kg)') }}" />
                <x-text-input type="number" step="0.1" name="weight" :value="old('weight')" placeholder="00.0" />
                <x-input-error :messages="$errors->get('weight')" />
            </div>

            <div class="input-group-container">
                <x-input-label value="{{ __('Estatura (cm)') }}" />
                <x-text-input type="number" name="height" :value="old('height')" placeholder="000" />
                <x-input-error :messages="$errors->get('height')" />
            </div>

            <div class="gender-section">
                <x-input-label value="{{ __('Género') }}" />
                <div class="radio-group">
                    <label class="custom-radio">
                        <input type="radio" name="gender" value="Masculino" {{ old('gender') == 'Masculino' ? 'checked' : '' }}> 
                        <span>{{ __('Masculino') }}</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="gender" value="Femenino" {{ old('gender') == 'Femenino' ? 'checked' : '' }}> 
                        <span>{{ __('Femenino') }}</span>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('gender')" />
            </div>

            <x-primary-button>
                {{ __('Registrar Datos') }}
            </x-primary-button>
        </form>
    </x-auth-card>
</x-guest-layout>
