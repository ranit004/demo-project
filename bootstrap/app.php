<?php

/*
|--------------------------------------------------------------------------
| bootstrap/app.php — Application bootstrap (Laravel 13 slim skeleton)
|--------------------------------------------------------------------------
| Configures routing, middleware and exception handling in one place
| (replacing the old Http/Console kernels). Here we:
|   - load the web + console routes and the health check endpoint,
|   - register the custom 'role' middleware alias (RoleMiddleware),
|   - set where authenticated users are sent from guest-only pages.
*/

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    // On Vercel, the filesystem is read-only except /tmp.
    // api/index.php sets APP_STORAGE=/tmp/storage before booting.
    // Locally this env var is absent, so we fall back to storage/.
    ->useStoragePath(env('APP_STORAGE', dirname(__DIR__) . '/storage'))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Custom alias used by route groups: ->middleware('role:admin')
        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);

        // Authenticated users hitting guest pages (login/register) are
        // forwarded to "/home", which dispatches to their role dashboard.
        $middleware->redirectUsersTo('/home');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
