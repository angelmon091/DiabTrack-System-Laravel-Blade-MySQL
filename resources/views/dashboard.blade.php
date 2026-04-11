@extends('layouts.app')

@section('title', 'DiabTrack - Dashboard')

@section('content')
    <main class="container-fluid py-4 px-md-5">
        <div class="row g-4">

            <aside class="col-12 col-xl-3">
                <div class="diab-card p-4 mb-4 animate-fade-in">
                    <div class="tool-header mb-4 d-flex align-items-center text-diab-primary">
                        <span class="fw-bold">Gestión DiabTrack</span>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('tracking.nutrition.index') }}" class="action-item diab-card-hover">
                            <div class="action-icon orange"><i class="fa-solid fa-robot"></i></div>
                            <div class="ms-3">
                                <strong class="d-block">Nutrición IA</strong>
                                <p class="mb-0 extra-small text-muted">Planificación de comidas</p>
                            </div>
                        </a>
                        <a href="{{ route('tracking.summary') }}" class="action-item diab-card-hover">
                            <div class="action-icon blue"><i class="fa-solid fa-chart-line"></i></div>
                            <div class="ms-3">
                                <strong class="d-block">Gráficos</strong>
                                <p class="mb-0 extra-small text-muted">Análisis de tendencias</p>
                            </div>
                        </a>
                        <a href="{{ route('tracking.vital.create') }}" class="action-item diab-card-hover">
                            <div class="action-icon green"><i class="fa-solid fa-plus"></i></div>
                            <div class="ms-3">
                                <strong class="d-block">Registrar</strong>
                                <p class="mb-0 extra-small text-muted">Añadir entrada diaria</p>
                            </div>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="action-item diab-card-hover">
                            <div class="action-icon gray"><i class="fa-solid fa-sliders"></i></div>
                            <div class="ms-3">
                                <strong class="d-block">Ajustes</strong>
                                <p class="mb-0 extra-small text-muted">Configurar perfil</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Tip del Día -->
                <div class="diab-card p-4 mb-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <h6 class="fw-bold mb-3 text-diab-text-secondary text-uppercase letter-spacing-1 small">Tip del Día</h6>
                    <div class="d-flex align-items-start">
                        <i class="fa-regular fa-lightbulb text-diab-primary fs-5 me-3 mt-1"></i>
                        <p class="mb-0 small text-muted text-justify" style="line-height: 1.5;">{{ $tipDelDia }}</p>
                    </div>
                </div>

                <!-- Síntomas Hoy -->
                <div class="diab-card p-4 mb-4 animate-fade-in" style="animation-delay: 0.15s;">
                    <h6 class="fw-bold mb-3 text-diab-text-secondary text-uppercase letter-spacing-1 small">Síntomas Hoy</h6>
                    <div class="d-flex align-items-center">
                        <div class="act-icon me-3" style="background: {{ $sintomasHoy > 0 ? 'var(--diab-danger-light)' : 'var(--diab-success-light)' }}; color: {{ $sintomasHoy > 0 ? 'var(--diab-danger)' : 'var(--diab-success)' }};">
                            <i class="fa-solid {{ $sintomasHoy > 0 ? 'fa-triangle-exclamation' : 'fa-shield-heart' }}"></i>
                        </div>
                        <div>
                            <h4 class="fw-extrabold mb-0">{{ $sintomasHoy }}</h4>
                            <span class="text-muted extra-small">{{ $sintomasHoy == 1 ? 'síntoma reportado' : 'síntomas reportados' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Actividad Reciente -->
                <div class="diab-card p-4 d-none d-xl-block animate-fade-in" style="animation-delay: 0.2s;">
                    <h6 class="fw-bold mb-3 text-diab-text-secondary text-uppercase letter-spacing-1 small">Actividad Reciente</h6>
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-clock-rotate-left text-diab-success fs-5 me-3"></i>
                        <div>
                            <strong class="d-block small text-dark mb-1">Última Medición</strong>
                            <span class="text-muted extra-small">
                                {{ $ultimaMedicion ? $ultimaMedicion->created_at->diffForHumans() : 'Sin registros' }}
                            </span>
                        </div>
                    </div>
                </div>

            </aside>

            <section class="col-12 col-xl-9">
                <div class="d-flex justify-content-between align-items-center mb-4 animate-fade-in">
                    <h3 class="fw-bold mb-0 fs-4">Resumen de Datos <span class="text-diab-primary">Total</span></h3>
                    <div class="text-muted small d-none d-sm-block glass-effect px-3 py-1 rounded-pill border">
                        {{ date('d M, Y') }}</div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>{{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Tarjeta de Recordatorio Mensual de Peso --}}
                @if($needsWeightUpdate)
                <div class="diab-card p-4 mb-4 animate-fade-in" style="border-left: 5px solid var(--diab-primary); animation-delay: 0.15s;">
                    <form action="{{ route('dashboard.weight.store') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="act-icon me-3" style="background: var(--diab-primary-light); color: var(--diab-primary); flex-shrink: 0;">
                                    <i class="fa-solid fa-weight-scale"></i>
                                </div>
                                <div>
                                    <strong class="d-block text-dark">Actualización Mensual de Peso</strong>
                                    <p class="text-muted extra-small mb-0">
                                        @if($ultimoPesoValor)
                                            Último registro: <strong>{{ $ultimoPesoValor }} kg</strong> — Hace más de 30 días
                                        @else
                                            Aún no has registrado tu peso este mes
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                <div class="input-group" style="max-width: 180px;">
                                    <input type="number" name="weight" step="0.1" min="20" max="350" 
                                           class="form-control form-control-sm border-0 shadow-sm" 
                                           placeholder="{{ $ultimoPesoValor ?? 'Peso' }}" 
                                           required 
                                           style="background: var(--diab-bg); border-radius: 12px 0 0 12px !important; font-weight: 600;">
                                    <span class="input-group-text border-0 shadow-sm small fw-bold" 
                                          style="background: var(--diab-bg); border-radius: 0 12px 12px 0 !important;">kg</span>
                                </div>
                                <button type="submit" class="btn btn-sm text-white fw-bold shadow-sm px-3" 
                                        style="background: linear-gradient(135deg, var(--diab-primary), var(--diab-primary-hover)); border-radius: 12px; white-space: nowrap;">
                                    <i class="fa-solid fa-check me-1"></i> Guardar
                                </button>
                            </div>
                        </div>
                        @error('weight')
                            <p class="text-danger small mt-2 mb-0"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</p>
                        @enderror
                    </form>
                </div>
                @endif

                {{-- Hero Row: Glucosa + Tendencia --}}
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-5">
                        @php
                            $heroBg = '#f0f9ff';
                            $heroRadial = 'var(--diab-primary-light)';
                            if ($ultimaMedicion && $ultimaMedicion->glucose_level) {
                                $g = $ultimaMedicion->glucose_level;
                                if ($g > 140) { $heroBg = '#fff5f5'; $heroRadial = 'rgba(239, 68, 68, 0.15)'; }
                                elseif ($g < 70) { $heroBg = '#fffbeb'; $heroRadial = 'rgba(245, 158, 11, 0.15)'; }
                                else { $heroBg = '#ecfdf5'; $heroRadial = 'rgba(16, 185, 129, 0.15)'; }
                            }
                        @endphp
                        <div class="diab-card glucosa-hero p-4 h-100 d-flex flex-column justify-content-center align-items-center animate-fade-in" 
                             style="--hero-bg: {{ $heroBg }}; --hero-radial: {{ $heroRadial }}; animation-delay: 0.2s;">
                            <div class="text-center w-100">
                                <span class="text-diab-text-secondary fw-bold small mb-2 d-block text-uppercase letter-spacing-1">Glucosa en Ayunas</span>
                                <div class="d-flex align-items-baseline justify-content-center">
                                    <h1 class="display-3 fw-extrabold mb-0 text-dark">
                                        {{ $ultimaMedicion->glucose_level ?? '--' }}
                                    </h1>
                                    <span class="ms-2 fs-5 text-muted">mg/dL</span>
                                </div>

                                @if($ultimaMedicion && $ultimaMedicion->glucose_level > 140)
                                    <div class="vital-trend-pill mt-3 d-inline-block shadow-sm text-danger border-danger">
                                        <i class="fa-solid fa-triangle-exclamation me-1"></i> Nivel Elevado
                                    </div>
                                @elseif($ultimaMedicion && $ultimaMedicion->glucose_level < 70)
                                    <div class="vital-trend-pill mt-3 d-inline-block shadow-sm text-warning border-warning">
                                        <i class="fa-solid fa-droplet-slash me-1"></i> Nivel Bajo
                                    </div>
                                @else
                                    <div class="vital-trend-pill mt-3 d-inline-block shadow-sm">
                                        <i class="fa-solid fa-circle-check me-1"></i> En rango aceptable
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="diab-card p-4 h-100 d-flex flex-column animate-fade-in" style="animation-delay: 0.3s;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0 text-diab-text-secondary text-uppercase letter-spacing-1" style="font-size: 0.8rem;">Tendencia Semanal</h6>
                            </div>
                            <div class="flex-grow-1 position-relative" style="min-height: 180px;">
                                @if(collect($glucosaData)->filter()->isNotEmpty())
                                    <canvas id="glucosaChart" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></canvas>
                                @else
                                    <div class="text-center h-100 d-flex flex-column align-items-center justify-content-center">
                                        <div class="act-icon gray shadow-sm mb-2"><i class="fa-solid fa-chart-line"></i></div>
                                        <p class="text-muted small mb-0">Sin suficientes datos de glucosa esta semana</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Métricas Fusionadas --}}
                <div class="row g-4 mb-4">
                    <!-- A1c + Calorías -->
                    <div class="col-12 col-md-4">
                        <div class="diab-card p-4 h-100 animate-fade-in" style="animation-delay: 0.3s;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="act-icon me-3 fire"><i class="fa-solid fa-dna"></i></div>
                                <div>
                                    <span class="extra-small fw-bold text-muted text-uppercase">A1c Estimada</span>
                                    <h3 class="fw-extrabold mb-0">{{ $ultimaHba1c ? number_format($ultimaHba1c->hba1c, 1) . '%' : '--' }}</h3>
                                </div>
                            </div>
                            <hr class="my-2 opacity-10">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-fire text-diab-danger me-2"></i>
                                    <span class="fw-bold extra-small">Calorías</span>
                                </div>
                                <span class="fw-bold extra-small text-diab-danger">{{ $porcentajeCalorias }}%</span>
                            </div>
                            <div class="progress-container shadow-sm border-0 mb-1" style="height: 6px;">
                                <div class="progress-bar-custom shadow" style="width: {{ $porcentajeCalorias }}%; background-color: var(--diab-danger) !important;"></div>
                            </div>
                            <p class="text-muted extra-small mb-0 text-end">{{ $caloriasHoy }} / {{ $metaCalorias }} kcal</p>
                        </div>
                    </div>

                    <!-- Carbohidratos + Actividad -->
                    <div class="col-12 col-md-4">
                        <div class="diab-card p-4 h-100 animate-fade-in" style="animation-delay: 0.4s;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="act-icon me-3 move"><i class="fa-solid fa-bread-slice"></i></div>
                                <div>
                                    <span class="extra-small fw-bold text-muted text-uppercase">Carbohidratos</span>
                                    <h3 class="fw-extrabold mb-0">{{ $carbsHoy }}g</h3>
                                </div>
                            </div>
                            <hr class="my-2 opacity-10">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-bolt text-diab-warning me-2"></i>
                                    <span class="fw-bold extra-small">Actividad</span>
                                </div>
                                <span class="fw-bold extra-small text-diab-warning">{{ $porcentajeActividad }}%</span>
                            </div>
                            <div class="progress-container shadow-sm border-0 mb-1" style="height: 6px;">
                                <div class="progress-bar-custom shadow" style="width: {{ $porcentajeActividad }}%; background-color: var(--diab-warning) !important;"></div>
                            </div>
                            <p class="text-muted extra-small mb-0 text-end">{{ $actividadMinutos }} / {{ $metaActividad }} min</p>
                        </div>
                    </div>

                    <!-- Tiempo en Rango + Pasos -->
                    <div class="col-12 col-md-4">
                        <div class="diab-card p-4 h-100 animate-fade-in" style="animation-delay: 0.5s;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="act-icon me-3 feet"><i class="fa-solid fa-clock-rotate-left"></i></div>
                                <div>
                                    <span class="extra-small fw-bold text-muted text-uppercase">Tiempo en Rango</span>
                                    <h3 class="fw-extrabold mb-0">{{ $tiempoEnRango }}%</h3>
                                </div>
                            </div>
                            <hr class="my-2 opacity-10">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-shoe-prints text-diab-primary me-2"></i>
                                    <span class="fw-bold extra-small">Pasos Hoy</span>
                                </div>
                                <span class="fw-bold extra-small text-diab-primary">{{ $porcentajePasos }}%</span>
                            </div>
                            <div class="progress-container shadow-sm border-0 mb-1" style="height: 6px;">
                                <div class="progress-bar-custom shadow" style="width: {{ $porcentajePasos }}%; background-color: var(--diab-primary) !important;"></div>
                            </div>
                            <p class="text-muted extra-small mb-0 text-end">{{ number_format($pasosEstimados) }} / {{ number_format($metaPasos) }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('glucosaChart');
        if (!canvas) return;

        const labels = @json($glucosaLabels);
        const data = @json($glucosaData);

        new Chart(canvas, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Glucosa (mg/dL)',
                    data: data,
                    borderColor: '#00B4D8',
                    backgroundColor: 'rgba(0, 180, 216, 0.08)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#00B4D8',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: 0.4,
                    fill: true,
                    spanGaps: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#0F172A',
                        titleFont: { family: 'Inter', size: 11 },
                        bodyFont: { family: 'Inter', size: 12, weight: 600 },
                        padding: 10,
                        cornerRadius: 10,
                        callbacks: {
                            label: function(ctx) {
                                return ctx.parsed.y + ' mg/dL';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        suggestedMin: 60,
                        suggestedMax: 200,
                        grid: { color: 'rgba(0,0,0,0.03)' },
                        ticks: {
                            font: { family: 'Inter', size: 10 },
                            color: '#94A3B8'
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            font: { family: 'Inter', size: 10 },
                            color: '#94A3B8'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection