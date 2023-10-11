<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Découvrez les concours de pêches proches de chez vous !</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container-fluid mt-5 p-0"> <!-- Utilisation de container-fluid pour la largeur totale de la page -->
    <div class="header bg-primary text-white">
        <div class="row align-items-center"> <!-- Utilisation de row pour aligner les éléments du header -->
            <div class="col-md-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo du site" class="img-fluid site-logo-small">
            </div>
            <div class="col-md-6">
                <h1>Concours de pêche en France</h1>
            </div>
            <div class="col-md-4 text-end">
                <ul class="list-inline">
                    @auth
                        <li class="list-inline-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <li class="list-inline-item">
                            <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('register') }}" class="btn btn-primary">Créer un compte</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5 p-0">
    <div class="row">
        <div class="col-md-8">
            <div class="white-band">
                @yield('content')
            </div>
        </div>
    </div>
</div>

</body>
</html>
