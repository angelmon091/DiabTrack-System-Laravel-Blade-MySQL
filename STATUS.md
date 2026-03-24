# 🩺 DiabTrack - Estado del Proyecto (Refactorización a Laravel)

Este archivo sirve como memoria técnica del progreso de la migración del proyecto estático DiabTrack a una aplicación funcional con Laravel.

## 🚀 1. Configuración Base Realizada
- **Framework:** Laravel 11.x instalado y configurado.
- **Autenticación:** Laravel Breeze (Blade Stack) instalado y funcional.
- **Base de Datos:** MySQL (`app_laravel`) conectada y configurada en `.env`.
- **Assets:** Carpetas `css/`, `img/` y `js/` originales movidas a `public/` y referenciadas mediante `{{ asset() }}`.
- **Respaldo:** Todos los archivos HTML originales se encuentran en la carpeta `backup_views/` como referencia.

## 📊 2. Arquitectura de Datos (Modelos y Migraciones)
Se han creado y ejecutado las siguientes migraciones con una estructura profesional:
- **`users`**: Tabla base de Laravel (email, password, name).
- **`patient_profiles`**: Relación 1:1 con `users`. (Fecha nac, tipo diabetes, peso, altura, género, metas glucosa).
- **`vital_signs`**: Registro de glucosa, presión (systolic/diastolic), frecuencia cardiaca y HbA1c.
- **`symptoms` & `symptom_user`**: Catálogo de síntomas y tabla pivote (Many-to-Many) para registro histórico.
- **`nutrition_logs`**: Tipo de comida, carbohidratos, categorías (JSON) y medicación.
- **`activity_logs`**: Duración, intensidad (enum), tipo de actividad y nivel de energía.

## 🖥️ 3. Vistas y Controladores Implementados
1. **Layout Maestro (`layouts/app.blade.php`)**: Estructura base basada en el diseño original. Incluye Navbar dinámica con nombre de usuario y botón de Logout.
2. **Onboarding (`OnboardingController`)**:
   - Vista: `resources/views/onboarding/personal-data.blade.php` (antes `login_datos_personales.html`).
   - Funcionalidad: Guarda datos médicos iniciales en `patient_profiles`.
3. **Dashboard (`DashboardController`)**:
   - Vista: `resources/views/dashboard.blade.php` (antes `dashboardc.html`).
   - Funcionalidad: Muestra bienvenida personalizada y estructura base de métricas.

## 📝 4. Próximos Pasos (Pendientes)
1. **Módulo de Signos Vitales**: Convertir `signos.html` a Blade y conectar con `VitalSignController`.
2. **Módulo de Síntomas**: Convertir `sintomas.html` y manejar la relación Many-to-Many.
3. **Módulo de Nutrición**: Convertir `nutricion.html` y manejar datos JSON.
4. **Módulo de Movimiento**: Convertir `movimiento.html`.
5. **Dashboard Dinámico**: Reemplazar los datos estáticos por promedios reales de la base de datos.
6. **Reportes y Gráficas**: Implementar `visualizacion.html` usando los datos de las tablas creadas.

---
*Ultima actualización: 23 de Marzo de 2026*
