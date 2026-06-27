<?php

/*
|--------------------------------------------------------------------------
| config/cache.php — Cache stores
|--------------------------------------------------------------------------
| The file store is used by default to keep the app dependency-free.
*/

use Illuminate\Support\Str;

return [

    'default' => env('CACHE_DRIVER', 'file'),

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
            'lock_connection' => 'default',
        ],

    ],

    'prefix' => env(
        'CACHE_PREFIX',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'
    ),

];
