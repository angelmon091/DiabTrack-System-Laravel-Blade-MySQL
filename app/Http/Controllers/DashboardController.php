<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->user()->patientProfile) {
            return redirect()->route('onboarding.index');
        }
        
        return view('dashboard');
    }
}
