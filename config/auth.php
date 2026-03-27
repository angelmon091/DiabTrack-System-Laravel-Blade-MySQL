<?php

use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guardias de autenticación
    |--------------------------------------------------------------------------
    |
    | A continuación, puedes definir cada guardia de autenticación para tu aplicación.
    | Por supuesto, se ha definido una gran configuración predeterminada para ti
    | que utiliza el almacenamiento de sesiones más el proveedor de usuarios Eloquent.
    |
    | Todos los guardias de autenticación tienen un proveedor de usuarios, que define cómo se recuperan realmente los usuarios de tu base de datos u otro sistema de almacenamiento utilizado por la aplicación. Normalmente, se utiliza Eloquent.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Proveedores de usuarios
    |--------------------------------------------------------------------------
    |
    | Todos los guardias de autenticación tienen un proveedor de usuarios, que define cómo se recuperan realmente los usuarios de tu base de datos u otro sistema de almacenamiento utilizado por la aplicación. Normalmente, se utiliza Eloquent.
    |
    | Si tienes múltiples tablas o modelos de usuarios, puedes configurar múltiples proveedores para representar el modelo / tabla. Estos proveedores pueden ser asignados a cualquier guardia de autenticación adicional que hayas definido.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Restablecimiento de contraseñas
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración especifican el comportamiento de la funcionalidad de restablecimiento de contraseña de Laravel, incluyendo la tabla utilizada para el almacenamiento de tokens y el proveedor de usuarios que se invoca para recuperar realmente los usuarios.
    |
    | El tiempo de expiración es el número de minutos que cada token de restablecimiento será considerado válido. Esta característica de seguridad mantiene los tokens de corta duración para que tengan menos tiempo de ser adivinados. Puedes cambiar esto según sea necesario.
    |
    | El ajuste de limitación es el número de segundos que un usuario debe esperar antes de generar más tokens de restablecimiento de contraseña. Esto evita que el usuario genere rápidamente una gran cantidad de tokens de restablecimiento de contraseña.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tiempo de espera de confirmación de contraseña
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir el número de segundos antes de que expire la ventana de confirmación de contraseña y se solicite a los usuarios que vuelvan a introducir su contraseña a través de la pantalla de confirmación. Por defecto, el tiempo de espera dura tres horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
