{{--
    user/dashboard.blade.php — Standard user dashboard
    --------------------------------------------------
    Welcome message and an info card showing the user's own details.
--}}
@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')
    <h1 class="h3 mb-4">Welcome, {{ $user->name }}</h1>

    <div class="card shadow-sm" style="max-width: 32rem;">
        <div class="card-header bg-white fw-semibold">
            My Account
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-muted">Name</span>
                <span class="fw-medium">{{ $user->name }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-muted">Email</span>
                <span class="fw-medium">{{ $user->email }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-muted">Role</span>
                <span class="badge bg-primary text-uppercase align-self-center">
                    {{ $user->role }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-muted">Member Since</span>
                <span class="fw-medium">{{ $user->created_at->format('M d, Y') }}</span>
            </li>
        </ul>
    </div>
@endsection
