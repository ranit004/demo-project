<?php

/*
|--------------------------------------------------------------------------
| App\Http\Middleware\RoleMiddleware — Role-based access control
|--------------------------------------------------------------------------
| Restricts a route to users of a given role. Registered in Kernel.php as
| the 'role' alias and used like: ->middleware('role:admin').
|
| If the visitor is not logged in they are sent to the login page; if they
| are logged in but hold the wrong role they receive a 403 response.
*/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  The role required to access the route.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Must be authenticated first.
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Authenticated, but the role does not match what the route requires.
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized. This area is restricted to the "'.$role.'" role.');
        }

        return $next($request);
    }
}
