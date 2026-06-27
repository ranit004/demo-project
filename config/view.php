<?php

/*
|--------------------------------------------------------------------------
| config/view.php — Blade view configuration
|--------------------------------------------------------------------------
| Where Blade templates live and where compiled views are cached.
*/

return [

    'paths' => [
        resource_path('views'),
    ],

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
