<?php

/*
|--------------------------------------------------------------------------
| routes/web.php — Web routes
|--------------------------------------------------------------------------
| Defines the public landing page, the post-login dispatcher, and the
| role-protected admin and user route groups. Authentication routes
| (login/register/logout) live in routes/auth.php.
*/

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public landing page.
Route::get('/', function () {
    return view('welcome');
});

/*
 * After login Breeze redirects here; RedirectController forwards the user
 * to the dashboard matching their role.
 */
Route::get('/home', [RedirectController::class, 'index'])
    ->middleware('auth')
    ->name('home');

/*
 * Admin-only routes. Guests are sent to login; non-admins receive 403.
 */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});

/*
 * User-only routes. Guests are sent to login; non-users receive 403.
 */
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

// Login / register / logout routes.
require __DIR__.'/auth.php';
