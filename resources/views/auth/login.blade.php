{{--
    auth/login.blade.php — Login form
    ---------------------------------
    Bootstrap-styled login form posting to the 'login' route. The user
    selects which role they are logging in as (Admin or User); the chosen
    role is verified against the account's actual role on submit.
--}}
@extends('layouts.guest')

@section('title', 'Log in')

@section('content')
    <h2 class="h4 mb-4 text-center">Log in</h2>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Role selector: Admin or User --}}
        <div class="mb-3">
            <label class="form-label d-block">Login as</label>
            <div class="btn-group w-100" role="group" aria-label="Select role">
                <input type="radio" class="btn-check" name="role" id="role-admin"
                       value="admin" autocomplete="off"
                       {{ old('role', 'admin') === 'admin' ? 'checked' : '' }} required>
                <label class="btn btn-outline-danger" for="role-admin">Admin</label>

                <input type="radio" class="btn-check" name="role" id="role-user"
                       value="user" autocomplete="off"
                       {{ old('role') === 'user' ? 'checked' : '' }}>
                <label class="btn btn-outline-primary" for="role-user">User</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}"
                   class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input id="remember" type="checkbox" name="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Remember me</label>
        </div>

        <button type="submit" class="btn btn-dark w-100">Log in</button>
    </form>

    <p class="text-center mt-3 mb-0">
        Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>
@endsection
