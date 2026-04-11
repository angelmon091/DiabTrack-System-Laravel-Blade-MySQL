@extends('layouts.app')

@section('title', 'DiabTrack - Configuración de Perfil')

@section('content')
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            
            <div class="settings-header animate-fade-in mb-5">
                <h2 class="fw-extrabold mb-1 fs-2">Configuración de <span class="text-diab-primary">Cuenta</span></h2>
                <p class="text-muted">Gestiona tu información personal y seguridad de forma segura</p>
            </div>

            <div class="space-y-6">
                <!-- Profile Info -->
                <div class="diab-card p-4 p-md-5 mb-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="section-icon bg-diab-primary-light text-diab-primary mb-4" style="width: 50px; height: 50px; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>
                    @include('profile.partials.update-profile-information-form')


                </div>

                <!-- Password Update -->
                <div class="diab-card p-4 p-md-5 mb-4 animate-fade-in" style="animation-delay: 0.2s;">
                    <div class="section-icon bg-diab-warning-light text-diab-warning mb-4" style="width: 50px; height: 50px; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Delete Account -->
                <div class="diab-card p-4 p-md-5 mb-5 animate-fade-in border-danger-subtle" style="animation-delay: 0.3s;">
                    <div class="section-icon bg-diab-danger-light text-diab-danger mb-4" style="width: 50px; height: 50px; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                        <i class="fa-solid fa-user-slash"></i>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
