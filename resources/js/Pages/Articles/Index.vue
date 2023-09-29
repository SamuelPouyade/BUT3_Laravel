@extends('layouts.app')

@section('content')

<div class="row">

<div class="col-lg-10">
    <h2>Mon blog avec Laravel</h2>
</div>

<div class="col-lg-2">
    <a class="btn btn-success" href="{{ url('article/create') }}">Ajouter un article</a>
</div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">
<p>{{ $message }}</p>
</div>

@endif



<div class="container">
<div class="row">
    @foreach ($articles as $index => $article)
    <div class="col-md-4">
        <div class="card card-body">
            <a href="{{ url('article/'. $article->id) }}">
                <h2>
                    {{ $article->titre }}
                </h2>
            </a>
            <p>Ecrit par: {{ $article->auteur }} | date: {{ $article->created_at }}</p>
            <a href="{{ url('article/'. $article->id) }}" class="btn btn-outline-primary">En savoir plus</a>
        </div>
    </div>
    @endforeach
</div>
</div>


@endsection
