<?php

/*
|--------------------------------------------------------------------------
| App\Http\Controllers\AdminController — Admin area
|--------------------------------------------------------------------------
| Handles the admin dashboard and the user-management listing. Routes that
| reach here are protected by the 'auth' and 'role:admin' middleware.
*/

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard with high-level user counts.
     */
    public function dashboard(): View
    {
        // Aggregate counts used by the dashboard cards.
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalAdmins'));
    }

    /**
     * Show a table of every registered user.
     */
    public function users(): View
    {
        // Newest accounts first.
        $users = User::orderBy('id')->get();

        return view('admin.users', compact('users'));
    }
}
