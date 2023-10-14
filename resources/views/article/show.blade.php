@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h1>{{ $article->titre }}</h1>
                        <p class="lead">{{ $article->Contenu }}</p>
                        <p>Écrit par : {{ $article->user->name }} | Date de création : {{ $article->created_at }}</p>
                        <h2>Commentaires</h2>
                        @foreach ($article->commentaires as $commentaire)
                            <div class="">
                                <p>{{ $commentaire->contenu }}</p>
                                <p>Écrit par : {{ $commentaire->user->name }} | Date : {{ $commentaire->created_at }}</p>
                            </div>
                        @endforeach
                        @auth
                                @if ($article->user_id === auth()->user()->id)
                                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-info">Modifier</a>
                                    <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                @endif
                                    <form action="{{ route('comment.store', $article->id) }}" method="POST">
                                    @csrf
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        <div class="form-group">
                                            <label for="contenu">Commenter :</label>
                                            <textarea name="contenu" class="form-control" id="contenu" rows="4"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
                                    </form>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
