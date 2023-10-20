@extends('home')

@section('content')
    <h1>Modifier article : {{ $article->titre }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control" id="titre" placeholder="Entrez un titre" name="titre" value="{{ $article->titre }}">
        </div>

        <div class="form-group mb-3">
            <label for="Contenu">Ajouter le contenu :</label>
            <textarea name="Contenu" id="Contenu" cols="30" rows="10" class="form-control">{{ $article->Contenu }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="date">Date :</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $article->date }}">
        </div>

        <div class="form-group mb-3">
            <label for="image">Nouvelle image :</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group mb-3">
            <label>Image actuelle :</label>
            <img src="{{ asset('storage/' . $article->image) }}" alt="Image actuelle" class="article-image">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
