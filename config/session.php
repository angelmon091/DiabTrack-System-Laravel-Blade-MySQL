<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Controlador de sesión predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción determina el controlador de sesión predeterminado que se utiliza para
    | las solicitudes entrantes. Laravel admite una variedad de opciones de almacenamiento para
    | persistir los datos de la sesión. El almacenamiento en base de datos es una excelente opción predeterminada.
    |
    | Soportados: "file", "cookie", "database", "memcached",
    |            "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Duración de la sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el número de minutos que deseas que la sesión
    | permanezca inactiva antes de expirar. Si deseas que expire
    | inmediatamente cuando se cierra el navegador, puedes indicarlo a través de la opción de configuración expire_on_close.
    |
    */

    'lifetime' => (int) env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Cifrado de sesión
    |--------------------------------------------------------------------------
    |
    | Esta opción te permite especificar fácilmente que todos los datos de tu sesión
    | deben cifrarse antes de almacenarse. Todo el cifrado es realizado
    | automáticamente por Laravel y puedes usar la sesión como normal.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Ubicación del archivo de sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza el controlador de sesión "file", los archivos de sesión se colocan
    | en el disco. La ubicación de almacenamiento predeterminada se define aquí; sin embargo,
    | eres libre de proporcionar otra ubicación donde deban almacenarse.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexión de base de datos de sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utilizan los controladores de sesión "database" o "redis", puedes especificar una
    | conexión que se utilizará para administrar estas sesiones. Esto debe
    | corresponder a una conexión en tus opciones de configuración de base de datos.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabla de base de datos de sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza el controlador de sesión "database", puedes especificar la tabla a
    | utilizar para almacenar las sesiones. Por supuesto, se define un valor predeterminado razonable
    | para ti; sin embargo, eres libre de cambiarlo a otra tabla.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Almacén de caché de sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza uno de los backends de sesión impulsados por caché del framework, puedes
    | definir el almacén de caché que se debe usar para almacenar los datos de la sesión
    | entre solicitudes. Esto debe coincidir con uno de tus almacenes de caché definidos.
    |
    | Affects: "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Lotería de limpieza de sesión
    |--------------------------------------------------------------------------
    |
    | Algunos controladores de sesión deben limpiar manualmente su ubicación de almacenamiento para deshacerse
    | de las sesiones antiguas del almacenamiento. Aquí están las probabilidades de que suceda
    | en una solicitud determinada. Por defecto, las probabilidades son 2 de 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nombre de la cookie de sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes cambiar el nombre de la cookie de sesión que es creada por
    | el framework. Normalmente, no deberías necesitar cambiar este valor
    | ya que hacerlo no otorga una mejora de seguridad significativa.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug((string) env('APP_NAME', 'laravel')).'-session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Ruta de la cookie de sesión
    |--------------------------------------------------------------------------
    |
    | La ruta de la cookie de sesión determina la ruta para la cual la cookie será
    | considerada disponible. Normalmente, esta será la ruta raíz de
    | tu aplicación, pero eres libre de cambiarla cuando sea necesario.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Dominio de la cookie de sesión
    |--------------------------------------------------------------------------
    |
    | Este valor determina el dominio y subdominios a los que está disponible la cookie de sesión.
    | Por defecto, la cookie estará disponible para el dominio raíz sin subdominios.
    | Normalmente, esto no debería cambiarse.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Cookies solo HTTPS
    |--------------------------------------------------------------------------
    |
    | Al establecer esta opción en true, las cookies de sesión solo se enviarán de vuelta
    | al servidor si el navegador tiene una conexión HTTPS. Esto evitará que
    | la cookie se te envíe cuando no se pueda hacer de forma segura.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Solo acceso HTTP
    |--------------------------------------------------------------------------
    |
    | Establecer este valor en true evitará que JavaScript acceda al
    | valor de la cookie y la cookie solo será accesible a través de
    | el protocolo HTTP. Es poco probable que desactives esta opción.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookies Same-Site
    |--------------------------------------------------------------------------
    |
    | Esta opción determina cómo se comportan tus cookies cuando se realizan solicitudes entre sitios,
    | y puede usarse para mitigar ataques CSRF. Por defecto, estableceremos este valor en "lax"
    | para permitir solicitudes seguras entre sitios.
    |
    | See: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Supported: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Partitioned
    |--------------------------------------------------------------------------
    |
    | Establecer este valor en true vinculará la cookie al sitio de nivel superior para
    | un contexto entre sitios. Las cookies particionadas son aceptadas por el navegador
    | cuando están marcadas como "secure" y el atributo Same-Site está establecido en "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

    /*
    |--------------------------------------------------------------------------
    | Serialización de sesión
    |--------------------------------------------------------------------------
    |
    | Este valor controla la estrategia de serialización para los datos de la sesión,
    | que es JSON por defecto. Establecerlo en "php" permite el almacenamiento de objetos PHP
    | en la sesión, pero puede hacer que una aplicación sea vulnerable a
    | ataques de serialización de "cadena de gadgets" si se filtra la APP_KEY.
    |
    | Supported: "json", "php"
    |
    */

    'serialization' => 'json',

];
