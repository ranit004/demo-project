{{--
    auth/register.blade.php — Registration form
    -------------------------------------------
    Bootstrap-styled registration form posting to the 'register' route.
    New accounts are created with the 'user' role.
--}}
@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <h2 class="h4 mb-4 text-center">Create account</h2>

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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name"
                   value="{{ old('name') }}"
                   class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="form-control" required>
        </div>

        <button type="submit" class="btn btn-dark w-100">Register</button>
    </form>

    <p class="text-center mt-3 mb-0">
        Already registered?
        <a href="{{ route('login') }}">Log in</a>
    </p>
@endsection
