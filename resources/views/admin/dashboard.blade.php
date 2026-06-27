{{--
    admin/dashboard.blade.php — Admin dashboard
    -------------------------------------------
    Welcome message plus summary cards (total users / total admins) and a
    link to the user management screen.
--}}
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="h3 mb-4">Welcome, Admin {{ Auth::user()->name }}</h1>

    <div class="row g-4 mb-4">
        {{-- Total standard users --}}
        <div class="col-md-6">
            <div class="card text-bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="display-5 fw-bold mb-0">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        {{-- Total admins --}}
        <div class="col-md-6">
            <div class="card text-bg-danger shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Admins</h5>
                    <p class="display-5 fw-bold mb-0">{{ $totalAdmins }}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.users') }}" class="btn btn-dark">
        Manage Users
    </a>
@endsection
