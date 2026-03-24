<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiabTrack - Información Personal</title>
    <link href="{{ asset('css/datos_personales.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <main class="main-container">
        <div class="brand-section">
            <h1 class="logo">D<span>ia</span>bTrack</h1>
            <p class="slogan">Monitorea tu salud, vive mejor</p>
            <p class="description">Con Diabtrack lleva un control más inteligente para una vida más saludable</p>
        </div>

        <section class="login-card">
            @if ($errors->any())
                <div style="color: red; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="personal-form" action="{{ route('onboarding.store') }}" method="POST">
                @csrf
                
                <p class="field-label-top">Fecha de Nacimiento</p>
                <div class="date-row">
                    <div class="select-wrapper">
                        <label>Dia</label>
                        <select name="birth_day">
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="select-wrapper">
                        <label>Mes</label>
                        <select name="birth_month">
                            @foreach(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select-wrapper">
                        <label>Year</label>
                        <select name="birth_year">
                            @for ($i = date('Y'); $i >= 1950; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="input-group">
                    <label class="field-label">Tipo de Diabetes</label>
                    <select class="full-select" name="diabetes_type">
                        <option value="Diabetes Mellitus Tipo 1">Diabetes Mellitus Tipo 1</option>
                        <option value="Diabetes Mellitus Tipo 2">Diabetes Mellitus Tipo 2</option>
                        <option value="Diabetes Mellitus Tipo 3">Diabetes Mellitus Tipo 3</option>
                        <option value="Diabetes Mellitus Tipo 4">Diabetes Mellitus Tipo 4</option>
                    </select>
                </div>

                <div class="input-group">
                    <label class="field-label">Peso (kg)</label>
                    <input type="text" class="full-input" name="weight" placeholder="00.0">
                </div>

                <div class="input-group">
                    <label class="field-label">Estatura (cm)</label> 
                    <input type="text" class="full-input" name="height" placeholder="000">
                </div>

                <div class="gender-section">
                    <label class="field-label">Genero</label>
                    <div class="radio-group">
                        <label class="custom-radio">
                            <input type="radio" name="gender" value="Masculino"> <span>Masculino</span>
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="gender" value="Femenino"> <span>Femenino</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-primary">Registrar Datos</button>
                
            </form>
        </section>
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <div class="links">
                <a href="#">Políticas de Privacidad</a>
                <a href="#">Términos y Condiciones</a>
                <a href="#">Desarrolladores</a>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-apple"></i>
                <a href="#"><i class="fa-brands fa-reddit"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>
