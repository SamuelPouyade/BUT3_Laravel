@extends('home')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-success">Retour à l'accueil</a>
    <h1>Ajouter un article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('article') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" placeholder="Entrez un titre" name="titre">
        </div>

        <div class="form-group mb-3">
            <label for="Contenu">Ajouter le contenu:</label>
            <textarea name="Contenu" id="Contenu" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="date">Date du concours de pêche</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>

        <div class="form-group mb-3">
            <label for="image">Télécharger une image :</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
