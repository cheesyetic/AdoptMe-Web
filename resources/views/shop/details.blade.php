@extends('../layout/headeronly')

@section('title', 'Detail Product')

@section('css')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/details.css') }}">

@endsection

@section('container')
<section class="container sproduct my-5 pt-3">
                <div class="row mt-5">
                    <div class ="col-lg-5 col-md-12 col-12">
                        <img class="img-fluid w-100" src="{{ $product->Product_Image }}" alt="">
                    </div>

                    <div class="col-lg-6 col-md-12 col-12 mt-5">
                        <h6>Home / Product</h6>
                        <h3 class="py-3">{{ $product->Product_Name }}</h3>
                        <h4>Rp. {{ $product->Product_Price }}</h4>
                        <button class="btn btn-danger mt-2" type="button" onclick="location.href='{{ route('postreview', $product->IDProduct) }}'">Give Review</button>
                        <button class="btn btn-outline-dark mt-2" type="button" onclick="location.href='{{ route('userreview', $product->IDProduct) }}'">See Customer Reviews</button>
                        <h4 class="mt-5 mb-3">Product Details</h4>
                        <div class="describe mb-4">
                            <p><span>Category : {{ $product->Product_Category }}</span></p>
                            <p><span>Stock : {{ $product->Product_Stock }}</span></p>
                            <p><span>Expired : {{ $product->Product_Expired }}</span></p>
                            <p><span>Description : {{ $product->Product_Description }}</span></p>
                        </div>
                    </div>
                </div>
</section>
@endsection