@extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ route('article.create') }}">Ajouter un article</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $index => $article)
                <div class="col-md-6">
                    <div class="card card-body">
                        <a href="{{ route('article.show', $article->id) }}">
                            <h2>{{ $article->titre }}</h2>
                        </a>
                        <p>
                            Écrit par: {{ $article->user->name }} | Date: {{ $article->created_at }}
                        </p>
                        <p>{{ substr($article->Contenu, 0, 100) }}...</p>
                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-primary">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
