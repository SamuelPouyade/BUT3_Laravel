@extends('home')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-success">Retour à l'accueil</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($articles as $index => $article)
                @if (Auth::check() && $article->user_id === Auth::user()->id)
                    <div class="col-md-6 mb-4 mx-auto">
                        <div class="card card-body">
                            <a href="{{ route('article.show', $article->id) }}">
                                <h2>{{ $article->titre }}</h2>
                            </a>
                            <p>
                                Écrit par : {{ $article->user->name }}
                            </p>
                            <p>{{ substr($article->Contenu, 0, 100) }}...</p>
                            @if ($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Image" class="article-image">
                            @endif
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-primary">En savoir plus</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        @include('vendor.pagination.default', ['paginator' => $articles])
    </div>
@endsection
