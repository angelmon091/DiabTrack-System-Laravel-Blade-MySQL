<?php

namespace App\Http\Controllers;

use App\Http\Requests\Onboarding\PersonalDataRequest;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function index()
    {
        return view('onboarding.personal-data');
    }

    public function store(PersonalDataRequest $request)
    {
        $validated = $request->validated();

        $birthDate = sprintf('%04d-%02d-%02d', 
            $validated['birth_year'], 
            $this->getMonthNumber($validated['birth_month']), 
            $validated['birth_day']
        );

        PatientProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'birth_date' => $birthDate,
                'diabetes_type' => $validated['diabetes_type'],
                'weight' => $validated['weight'],
                'height' => $validated['height'],
                'gender' => $validated['gender'],
            ]
        );

        return redirect()->route('dashboard')->with('status', __('Datos registrados correctamente.'));
    }

    private function getMonthNumber($monthName)
    {
        $months = [
            'Enero' => '01', 'Febrero' => '02', 'Marzo' => '03', 'Abril' => '04',
            'Mayo' => '05', 'Junio' => '06', 'Julio' => '07', 'Agosto' => '08',
            'Septiembre' => '09', 'Octubre' => '10', 'Noviembre' => '11', 'Diciembre' => '12'
        ];
        return $months[$monthName] ?? '01';
    }
}
