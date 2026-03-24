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
2. **Autenticación Personalizada**:
   - Login: `resources/views/auth/login.blade.php` (basado en `singin.html`).
   - Registro: `resources/views/auth/register.blade.php` (basado en `login.html`).
   - Funcionalidad: Errores de validación, CSRF y redirecciones inteligentes configuradas.
3. **Onboarding (`OnboardingController`)**:
   - Vista: `resources/views/onboarding/personal-data.blade.php` (antes `login_datos_personales.html`).
   - Funcionalidad: Guarda datos médicos iniciales en `patient_profiles`.
4. **Dashboard (`DashboardController`)**:
   - Vista: `resources/views/dashboard.blade.php` (antes `dashboardc.html`).
   - Funcionalidad: Muestra bienvenida personalizada y estructura base de métricas.

   - Tareas Adicionales: Los formularios comparten ahora la misma estructura CSS (`login.css`) base para evitar inconsistencias de diseño.
   - Seguridad: Modelos actualizados (`User` y `PatientProfile`) con validación estricta para asegurar que nadie entre al Dashboard sin antes completar su Onboarding.

## 🛠️ 4. Correcciones Técnicas e Inconsistencias
- **Conexión MySQL:** Se corrigió el archivo `.env` para usar MySQL (`app_laravel`) en lugar de SQLite.
- **Sincronización de Tablas:** Se ejecutó `migrate:fresh` para asegurar que las 15 tablas profesionales estén presentes en el servidor MySQL.
- **Estandarización UI:** Implementación de componentes Blade atómicos (`x-text-input`, `x-primary-button`, etc.) para corregir inconsistencias de diseño originales y unificar la experiencia de usuario.

## 💎 5. Estándares de Calidad (Directrices Senior)
- **Refactorización Continua:** No se permite el copiado directo de HTML inconsistente; cada migración debe pasar por una fase de limpieza y componentización.
- **Validación Robusta:** Uso obligatorio de Form Requests para cada módulo.
- **Consistencia Visual:** Unificación de tipografías, márgenes y comportamientos mediante componentes reutilizables.

## 📝 5. Próximos Pasos (Pendientes)
1. **Módulo de Signos Vitales**: Convertir `signos.html` a Blade y conectar con `VitalSignController`.
2. **Módulo de Síntomas**: Convertir `sintomas.html` y manejar la relación Many-to-Many.
3. **Módulo de Nutrición**: Convertir `nutricion.html` y manejar datos JSON.
4. **Módulo de Movimiento**: Convertir `movimiento.html`.
5. **Dashboard Dinámico**: Reemplazar los datos estáticos por promedios reales de la base de datos.
6. **Reportes y Gráficas**: Implementar `visualizacion.html` usando los datos de las tablas creadas.

---
*Ultima actualización: 23 de Marzo de 2026*
