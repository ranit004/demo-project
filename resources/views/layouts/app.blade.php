{{--
    layouts/app.blade.php — Main authenticated layout
    -------------------------------------------------
    Bootstrap 5 (CDN) shell with a navbar showing the app name, the
    logged-in user's name + role badge, and a logout button. Child views
    inject their content via @yield('content').
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>

    {{-- Bootstrap 5 via CDN --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>
<body class="bg-light">

    {{-- Top navigation bar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/home') }}">
                {{ config('app.name') }}
            </a>

            @auth
                <div class="d-flex align-items-center ms-auto gap-3">
                    {{-- Logged-in user's name --}}
                    <span class="text-white">{{ Auth::user()->name }}</span>

                    {{-- Role badge --}}
                    @if (Auth::user()->role === 'admin')
                        <span class="badge bg-danger text-uppercase">Admin</span>
                    @else
                        <span class="badge bg-primary text-uppercase">User</span>
                    @endif

                    {{-- Logout button (POST for CSRF safety) --}}
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    {{-- Page content --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Bootstrap 5 JS bundle via CDN --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
