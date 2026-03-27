<?php

namespace App\Http\Controllers;

use App\Services\DashboardMetricsService;
use Illuminate\Http\Request;

/**
 * Clase DashboardController
 * 
 * Gestiona la visualización del panel principal del usuario, integrando 
 * las métricas de salud procesadas por el servicio correspondiente.
 */
class DashboardController extends Controller
{
    /**
     * Instancia del servicio de métricas.
     *
     * @var DashboardMetricsService
     */
    protected $metricsService;

    /**
     * Crea una nueva instancia del controlador.
     *
     * @param DashboardMetricsService $metricsService
     * @return void
     */
    public function __construct(DashboardMetricsService $metricsService)
    {
        $this->metricsService = $metricsService;
    }

    /**
     * Muestra el panel de control con analíticas y resumen para el usuario autenticado.
     * 
     * Verifica si el usuario tiene un perfil de paciente completado antes de 
     * renderizar la vista con las métricas de salud.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user = auth()->user();
        
        // Redirigir al proceso de configuración inicial si el perfil no existe
        if (!$user->patientProfile) {
            return redirect()->route('onboarding.index');
        }

        // Obtener los datos procesados a través de la capa de servicios (Service Layer)
        $metrics = $this->metricsService->getDashboardMetrics($user->id);

        return view('dashboard', $metrics);
    }
}
