<?php

/*
|--------------------------------------------------------------------------
| App\Http\Controllers\Auth\AuthenticatedSessionController
|--------------------------------------------------------------------------
| Handles displaying the login form, authenticating credentials, and
| logging the user out (Laravel Breeze blade-stack equivalent).
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the submitted credentials and the chosen role.
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'role' => ['required', 'in:admin,user'],
        ]);

        // Attempt to log the user in by email + password only
        // (with optional "remember me").
        $attempted = Auth::attempt(
            ['email' => $validated['email'], 'password' => $validated['password']],
            $request->boolean('remember')
        );

        if (! $attempted) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        // Enforce that the selected role matches the account's actual role.
        // The password was already verified, so we simply log back out and
        // bounce to the login page with an error (no full session reset).
        if (Auth::user()->role !== $validated['role']) {
            Auth::logout();

            throw ValidationException::withMessages([
                'role' => 'This account is not registered as a'.
                    ($validated['role'] === 'admin' ? 'n admin' : ' user').'.',
            ]);
        }

        // Protect against session fixation.
        $request->session()->regenerate();

        // Forward to "/home", which dispatches to the role dashboard.
        return redirect()->intended('/home');
    }

    /**
     * Destroy an authenticated session (logout).
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
