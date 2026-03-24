<?php

namespace App\Http\Requests\Onboarding;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Solo usuarios autenticados llegan aquí vía middleware
    }

    /**
     * Get the validation rules that apply to the request.
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
     * Get custom messages for validator errors.
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
