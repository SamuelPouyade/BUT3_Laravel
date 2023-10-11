@extends('.home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h1>{{ $article->titre }}</h1>
                        <p class="lead">{{ $article->Contenu }}</p>
                        <div class="buttons">
                            <a href="{{ url('article/'. $article->id .'/edit') }}" class="btn btn-info">Modifier</a>
                            <form action="{{ url('article/'. $article->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
