<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Fishing App!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="container-fluid">
    <div class="header bg-primary text-white">
        <div class="row align-items-center">
            <div class="col-md-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo du site" class="img-fluid site-logo-small">
            </div>
            <div class="col-md-5">
                <h1 class="rockwell-font">Concours de pêche en France</h1>
            </div>
            <div class="col-md-5 text-end">
                <ul class="list-inline">
                    @auth
                        <li class="list-inline-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Déconnexion</button>
                            </form>
                        </li>
                        <li class="list-inline-item">
                            <form id="logout-form" action="{{ route('profile.edit') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-danger">Modifier son profil</button>
                            </form>
                        </li>
                        @if(Route::currentRouteName() !== 'article.create')
                            <li class="list-inline-item">
                                <a class="btn btn-success" href="{{ route('article.create') }}">Ajouter un article</a>
                            </li>
                        @endif
                        @if(Route::currentRouteName() !== 'article.article_perso')
                            <li class="list-inline-item">
                                <a class="btn btn-success" href="{{ route('article.article_perso') }}">Voir mes articles</a>
                            </li>
                        @endif
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
        <div class="col-md-8 mx-auto text-center">
            <div class="white-band">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<footer class="bg-primary text-white text-center py-2">
    &copy; Samuel Pouyade <?php echo date("Y"); ?>
</footer>
</body>
</html>
