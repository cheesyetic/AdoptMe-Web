@extends('../layout/headeronly')

@section('title', 'Adopt')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@endsection

@section('container')

<div class="container-fluid">
<div class="d-inline-flex p-2 bd-highlight">
    <a class="btn btn-primary mx-1" href="{{ url('/postpet') }}">Offer Adoption Now!</a>
</div>
</div>
<div class="container-md">
<div class="row row-cols-1 row-cols-md-3">
@foreach($pet as $pet)
<div class="col mb-4">
<div class="card h-100">
    <img src="{{$pet->Pet_Photo}}" class="card-img-top" alt="" width="100" height="300">
<div class="card-body">
    <h5 h5 class="card-title">{{$pet->Pet_Name}}</h5>
    <p class="card-text">{{$pet->Pet_Description}}</p>
    <p class="card-text"><big class="text-warning">Rp. {{$pet->Pet_Fee}}</big></p>
<div class="col-md-12 text-center">
    <a class="btn btn-outline-dark text-center" href="{{ route('adoptDetails', $pet->PetID) }}">View Details</a>
    <a class="btn btn-info text-center" href="{{ route('adoptNow') }}">Adopt Now</a>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
@endsection