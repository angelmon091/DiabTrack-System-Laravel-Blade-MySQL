@extends('layouts.app')

@section('title', 'DiabTrack - Dashboard')

@section('content')
<main class="container-fluid py-4 px-md-5">
    <div class="row g-4">
        
        <aside class="col-12 col-xl-3">
            <div class="glass-card p-4 mb-4">
                <div class="tool-header mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-gear me-2"></i>
                    <span class="fw-bold">Gestión DiabTrack</span>
                </div>
                
                <div class="d-flex flex-column gap-2">
                    <a href="#" class="action-item">
                        <div class="action-icon orange"><i class="fa-solid fa-robot"></i></div>
                        <div class="ms-3">
                            <strong class="d-block">Nutrición IA</strong>
                            <p class="mb-0 extra-small text-muted">Planificación de comidas</p>
                        </div>
                    </a>
                    <a href="#" class="action-item">
                        <div class="action-icon blue"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="ms-3">
                            <strong class="d-block">Gráficos</strong>
                            <p class="mb-0 extra-small text-muted">Análisis de tendencias</p>
                        </div>
                    </a>
                    <a href="#" class="action-item">
                        <div class="action-icon green"><i class="fa-solid fa-plus"></i></div>
                        <div class="ms-3">
                            <strong class="d-block">Registrar</strong>
                            <p class="mb-0 extra-small text-muted">Añadir entrada diaria</p>
                        </div>
                    </a>
                    <a href="#" class="action-item">
                        <div class="action-icon gray"><i class="fa-solid fa-sliders"></i></div>
                        <div class="ms-3">
                            <strong class="d-block">Ajustes</strong>
                            <p class="mb-0 extra-small text-muted">Configurar perfil</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="glass-card p-4 d-none d-xl-block">
                <h6 class="fw-bold mb-3 text-center">Métricas Clave Diabetes</h6>
                <img src="{{ asset('img/medios/etc/Rectangle 35.png') }}" alt="Gráfico" class="img-fluid rounded-4">
            </div>
        </aside>

        <section class="col-12 col-xl-9">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h3 class="fw-bold mb-0 fs-4">Previsualización de Datos <span class="text-primary">Total</span></h3>
                <div class="text-muted small d-none d-sm-block">{{ date('d de F, Y') }}</div>
            </div>

            <div class="glass-card glucosa-hero p-4 p-md-5 mb-4 position-relative">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <span class="text-muted fw-bold small mb-2 d-block">Glucosa en Ayunas</span>
                        <div class="d-flex align-items-baseline justify-content-center justify-content-md-start">
                            <h1 class="display-2 fw-bold mb-0">98</h1>
                            <span class="ms-2 fs-4 text-muted">mg/DL</span>
                        </div>
                        <div class="vital-trend-pill mt-3 d-inline-block">
                            <i class="fa-solid fa-circle-check me-1"></i> En rango aceptable
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12 col-md-4">
                    <div class="glass-card p-4">
                        <div class="stat-top mb-2 small fw-bold text-muted">
                            <i class="fa-solid fa-dna text-info me-2"></i> A1c Estimada
                        </div>
                        <h4 class="fw-bold mb-1">6.7%</h4>
                        <p class="text-muted extra-small mb-0">Últimos 90 días</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="glass-card p-4">
                        <div class="stat-top mb-2 small fw-bold text-muted">
                            <i class="fa-solid fa-bread-slice text-info me-2"></i> Carbohidratos
                        </div>
                        <h4 class="fw-bold mb-1">180g</h4>
                        <p class="text-muted extra-small mb-0">Meta: 200g</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="glass-card p-4">
                        <div class="stat-top mb-2 small fw-bold text-muted">
                            <i class="fa-solid fa-clock-rotate-left text-info me-2"></i> Tiempo en Rango
                        </div>
                        <h4 class="fw-bold mb-0">85%</h4>
                    </div>
                </div>
            </div>

            <h5 class="fw-bold mb-4 fs-6">Aspectos Importantes</h5>

            <div class="d-flex flex-column gap-3">
                <div class="glass-card p-3 p-md-4">
                    <div class="row align-items-center g-3">
                        <div class="col-12 col-md-3">
                            <div class="d-flex align-items-center">
                                <div class="act-icon fire me-3"><i class="fa-solid fa-fire"></i></div>
                                <div>
                                    <strong class="d-block small">Calorías</strong>
                                    <span class="text-muted extra-small">2500 / 800kcal</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-md-8 px-md-4">
                            <div class="progress-container">
                                <div class="progress-bar-custom bg-danger" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="col-3 col-md-1 text-end fw-bold small">75%</div>
                    </div>
                </div>

                <div class="glass-card p-3 p-md-4">
                    <div class="row align-items-center g-3">
                        <div class="col-12 col-md-3">
                            <div class="d-flex align-items-center">
                                <div class="act-icon move me-3"><i class="fa-solid fa-bolt"></i></div>
                                <div>
                                    <strong class="d-block small">Actividad</strong>
                                    <span class="text-muted extra-small">450 / 800kcal</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-md-8 px-md-4">
                            <div class="progress-container">
                                <div class="progress-bar-custom bg-warning" style="width: 50%"></div>
                            </div>
                        </div>
                        <div class="col-3 col-md-1 text-end fw-bold small">50%</div>
                    </div>
                </div>

                <div class="glass-card p-3 p-md-4">
                    <div class="row align-items-center g-3">
                        <div class="col-12 col-md-3">
                            <div class="d-flex align-items-center">
                                <div class="act-icon feet me-3"><i class="fa-solid fa-shoe-prints"></i></div>
                                <div>
                                    <strong class="d-block small">Pasos</strong>
                                    <span class="text-muted extra-small">6987 / 8000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-md-8 px-md-4">
                            <div class="progress-container">
                                <div class="progress-bar-custom bg-primary" style="width: 87%"></div>
                            </div>
                        </div>
                        <div class="col-3 col-md-1 text-end fw-bold small">87%</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
