@extends('../layout/headeronly')

@section('title', 'Show Pet')

@section('css')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/adopt.css') }}">

@endsection

@section('container')

<section class="container sproduct my-5 pt-3">
                <div class="row mt-5">
                    <div class ="col-lg-5 col-md-12 col-12">
                        <img class="img-fluid w-100" src="{{ $pet->Pet_Photo }}" alt="">
                    </div>

                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                        <h6>Home / Adopt</h6>
                        <h3 class="py-3">{{ $pet->Pet_Name }}</h3>
                        <h4>FREE</h4>
                        <button class="btn btn-danger mt-2" type="button" onclick="location.href='{{ route('adoptNow') }}'">Chat with Owner</button>
                        <h4 class="mt-5 mb-3">Pet Details</h4>
                        <div class="describe mb-4">
                            <p><span>Location : {{ $pet->Pet_City }}</span></p>
                            <p><span>Category : {{ $pet->Pet_Category }} *1=cat, 2=dog</span></p>
                            <p><span>Type : {{ $pet->Pet_Type }}</span></p>
                            <p><span>Age : {{ $pet->Pet_Age }}</span></p>
                            <p><span></span></p>
                            <p><span></span></p>
                            <p><span>Description : {{ $pet->Pet_Description }}</span></p>
                        </div>
                    </div>
                </div>
</section>

@endsection