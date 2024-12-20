<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html,body {
            height: 100%;
            width: 100%;
            margin: 0;
        }
        .navbar {
            flex-wrap: nowrap; /* Empêche les éléments de s'empiler */
        }

        .navbar .ms-auto {
            display: flex;
            align-items: center;
        }

        .navbar .nav-link {
            margin-right: 10px;
        }

        .navbar-light.bg-light {
            background-color: #ff7f32 !important;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
        }

        .container {
            background-color: #fff5e6;
            border-radius: 8px;
            padding: 10px;
            border: 2px solid #333;
        }

        h1, h3 {
            color: #ff7f32;
        }

        .navbar-brand {
            color: #333 !important;
        }

        .alert-warning {
            background-color: #ffbf00;
            color: #ffffff;
            border: 2px solid #333;
        }

        .list-group-item {
            border-left: 5px solid #ff7f32;
            background-color: #fff;
            color: #333;
        }

        .list-group-item:hover {
            background-color: #ffe6cc;
            border-left: 5px solid #e65c00;
        }

        h1, h3 {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }

        .navbar-toggler-icon {
            background-color: #333;
        }

        .navbar-toggler {
            border: none;
            background-color: #ff7f32;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2230%22 height=%2230%22 viewBox=%220 0 30 30%22 fill=%22none%22%3E%3Cpath fill=%22%23fff%22 d=%22M5 7h20M5 15h20M5 23h20%22/%3E%3C/svg%3E');
            background-size: 30px;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body class="d-flex flex-column">
<div class="container mb-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
        <a class="navbar-brand" href="/" style="color: #333;">Accueil</a>
        <div class="collapse navbar-collapse d-flex flex-sp" id="navbarNav">
            <ul class="navbar-nav d-flex">
                <div class="d-flex justify-content-between">
                    <li class="nav-item">

                        <a class="nav-link" href="/articles" style="color: #fff;">Articles</a>
                    </li>
                    @auth
                            <li class="nav-item">
                                <span class="nav-link text-white">Bonjour, {{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light">Déconnexion</button>
                                </form>
                            </li>
                    @endauth
                </div>
            </ul>
        </div>
    </nav>




</div>

<div class=" d-flex" style="flex: 1;" >
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
