<?php

/*
|--------------------------------------------------------------------------
| public/index.php — HTTP entry point (Laravel 13)
|--------------------------------------------------------------------------
| Every web request is routed here by the web server. It boots the
| framework and hands the captured request to the application.
*/

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Illuminate\Foundation\Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
