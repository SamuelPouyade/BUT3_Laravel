@extends('home')

@section('content')
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

    <form action="{{ url('article') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" placeholder="Entrez un titre" name="titre">
        </div>

        <div class="form-group mb-3">
            <label for="Contenu">Ajouter le contenu:</label>
            <textarea name="Contenu" id="Contenu" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection