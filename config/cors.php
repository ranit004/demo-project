<?php

/*
|--------------------------------------------------------------------------
| config/cors.php — Cross-Origin Resource Sharing
|--------------------------------------------------------------------------
| Settings consumed by the global HandleCors middleware. Defaults are
| permissive enough for a same-origin Blade app.
*/

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
