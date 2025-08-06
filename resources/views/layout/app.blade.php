<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD Film & Genre')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    html, body {
        height: 100%;
        margin: 0;
    }
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: #f8f9fa;
    }
    .navbar {
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .container {
        max-width: 1000px;
        flex: 1;
    }
    footer {
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 12px;
        font-size: 14px;
        margin-top: auto;
    }
    .btn-custom {
        min-width: 80px;
    }
    table th {
        background-color: #343a40;
        color: white;
    }
    .card-header {
        background-color: #f1f1f1;
        font-weight: 600;
    }
</style>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa-solid fa-clapperboard"></i> CRUD Film</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('film*') ? 'active' : '' }}" href="{{ route('film.index') }}"><i class="fa-solid fa-film"></i> Film</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('genre*') ? 'active' : '' }}" href="{{ route('genre.index') }}"><i class="fa-solid fa-tags"></i> Genre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fa-solid fa-circle-check"></i> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
    <footer>
        <p>📽️ CRUD Film & Genre | Laravel 10 - &copy; {{ date('Y') }} </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
