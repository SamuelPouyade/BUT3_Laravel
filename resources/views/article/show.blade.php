@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="btn btn-secondary">Retour à l'accueil</a>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h1>{{ $article->titre }}</h1>
                        <p class="lead">{{ $article->Contenu }}</p>
                        <p>Écrit par : {{ $article->user->name }} | Date de création : {{ $article->created_at }}</p>
                        @auth
                            @if ($article->user_id === auth()->user()->id)
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-info">Modifier</a>
                                <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            @endif
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
