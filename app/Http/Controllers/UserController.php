<?php

/*
|--------------------------------------------------------------------------
| App\Http\Controllers\UserController — User area
|--------------------------------------------------------------------------
| Handles the standard user's dashboard. Routes that reach here are
| protected by the 'auth' and 'role:user' middleware.
*/

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the logged-in user's personal dashboard.
     */
    public function dashboard(): View
    {
        // The currently authenticated user; shown on their info card.
        $user = Auth::user();

        return view('user.dashboard', compact('user'));
    }
}
