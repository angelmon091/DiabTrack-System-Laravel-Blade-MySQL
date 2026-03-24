<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientProfile;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function index()
    {
        return view('onboarding.personal-data');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'birth_day' => 'required',
            'birth_month' => 'required',
            'birth_year' => 'required',
            'diabetes_type' => 'required|string',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required|string',
        ]);

        $birthDate = $validated['birth_year'] . '-' . $this->getMonthNumber($validated['birth_month']) . '-' . $validated['birth_day'];

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

        return redirect()->route('dashboard');
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
