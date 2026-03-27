<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase PersonalDataRequest
 * 
 * Reglas de validación para los datos personales del usuario.
 * Asegura que los datos personales sean válidos antes de ser procesados.
 */
class PersonalDataRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Solo usuarios autenticados llegan aquí vía middleware
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'birth_day' => ['required', 'integer', 'min:1', 'max:31'],
            'birth_month' => ['required', 'string'],
            'birth_year' => ['required', 'integer', 'min:1920', 'max:' . date('Y')],
            'diabetes_type' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'numeric', 'min:20', 'max:300'],
            'height' => ['required', 'numeric', 'min:50', 'max:250'],
            'gender' => ['required', 'string', 'in:Masculino,Femenino'],
        ];
    }

    /**
     * Obtiene mensajes personalizados para errores de validación.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'weight.min' => __('El peso debe ser al menos 20kg.'),
            'weight.max' => __('El peso no puede exceder los 300kg.'),
            'height.min' => __('La estatura debe ser al menos 50cm.'),
            'height.max' => __('La estatura no puede exceder los 250cm.'),
            'gender.in' => __('Seleccione un género válido.'),
        ];
    }
}
