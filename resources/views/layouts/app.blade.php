<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Site</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #202529;
            color: #e8e8e8;
        }
        a, .text-link {
            color: #c95987;
        }
        a:hover, .text-link:hover {
            color: #903175;
        }
        .card {
            background-color: #202529;
            border: 1px solid #903175;
        }
        .card-title {
            color: #c95987;
        }
        .card-text, .card-subtitle {
            color: #e8e8e8;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(201,89,135,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/ %3E%3C/svg%3E");
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:#c95987; color:#e8e8e8; font-weight:600; height: 75px">
    <div class="container">
        <a class="navbar-brand text-[#c95987]" href="{{ url('/') }}" style="color:#e8e8e8">AnimeSite</a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            @guest
            <!-- Гость видит только Вход -->
            <li class="nav-item">
                <a class="nav-link text-[#e8e8e8]" href="{{ route('login') }}" style="color:#e8e8e8">Вход</a>
            </li>
            @endguest

            @auth
            <!-- Авторизованный пользователь видит только Профиль -->
            <li class="nav-item">
                <a class="nav-link text-[#e8e8e8]" href="{{ route('profile') }}" style="color:#e8e8e8">Профиль</a>
            </li>
            @endauth
        </ul>
        </div>
    </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
