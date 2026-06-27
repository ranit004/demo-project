<?php

/*
|--------------------------------------------------------------------------
| App\Http\Controllers\RedirectController — Post-login dispatcher
|--------------------------------------------------------------------------
| Breeze redirects authenticated users to "/home" after login. This
| controller inspects the user's role and forwards them to the correct
| dashboard (admin or user).
*/

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    /**
     * Redirect the authenticated user to their role-specific dashboard.
     */
    public function index(): RedirectResponse
    {
        $user = Auth::user();

        // Send admins and users to their respective dashboards.
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }
}
