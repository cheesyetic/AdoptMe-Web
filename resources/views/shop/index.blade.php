@extends('../layout/headeronly')

@section('title', 'Shop')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@endsection

@section('container')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<div class="container-md">
    <div class="row row-cols-1 row-cols-md-3 mt-5">
    @foreach($product as $prd)
        <div class="col mb-4">
        <form action="{{ route('cartdetail.store') }}" method="POST">
        @csrf
            <input type="hidden" name="IDProduct" value="{{ $prd->IDProduct }}">
            <div class="card h-100">
            <img src="{{ $prd->Product_Image }}" class="card-img-top" alt="" width="100" height="300">
            <div class="card-body">
            <h5 h5 class="card-title">{{ $prd->Product_Name }}</h5>
            <p class="card-text">{{ $prd->Product_Description }}</p>
            <p class="card-text"><big>Rp. {{ $prd->Product_Price }}</big></p>
            <div class="col-md-12 text-center">
            <a class="btn btn-outline-danger text-center" href="{{ route('shopDetails', $prd->IDProduct) }}">View Details</a>
            <button type="submit" class="btn btn-danger text-center">Add to Cart</button>
            </div>
        </div>
      </div>
      </form>  
    </div>
    @endforeach
    </div>
</div>

@endsection