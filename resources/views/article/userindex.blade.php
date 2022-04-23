@extends('../layout/headeronly')

@section('title', 'Article')

@section('css')
<link rel="stylesheet"href="articleGede.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@endsection

@section('container')

        <div class="container-xl">
            @foreach($article as $art)
            <div class="card mb-3 mt-5">
                <img class="card-img-top" src="{{ $art->Photo }}" alt="Card image cap" height="400px">
                <div class="card-body">
                    <h1 class="card-title">{{ $art->Title }}</h1>
                    <p class="card-text">{{ $art->Description }}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ $art->updated_at }}</small></p>
                </div>
            </div>
            @endforeach
        </div>

@endsection