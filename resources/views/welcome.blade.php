{{--
    welcome.blade.php — Public landing page
    ---------------------------------------
    Simple hero with links to log in or register. Authenticated visitors
    get a link straight to their dashboard.
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 text-center">
                <h1 class="display-5 fw-bold mb-3">{{ config('app.name') }}</h1>
                <p class="lead text-muted mb-4">
                    Role-based dashboards for admins and users.
                </p>

                @auth
                    <a href="{{ url('/home') }}" class="btn btn-dark btn-lg">
                        Go to my dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-dark btn-lg me-2">Log in</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg">Register</a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
