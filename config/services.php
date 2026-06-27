<?php

/*
|--------------------------------------------------------------------------
| config/services.php — Third-party service credentials
|--------------------------------------------------------------------------
| Credentials for external services. Empty by default for this project.
*/

return [

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
