@extends('../layout/headeronly')

@section('title', 'User Reviews')

@section('css')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/review.css') }}">

@endsection

@section('container')

<div class="container">
            <div class="container-fluid">
                <div class="d-inline-flex p-2 bd-highlight">
                    <a class="btn btn-outline-secondary mx-1 mb-4" href="{{ route('shopDetails', $product->IDProduct) }}">< Back to Product</a>
                </div>
            </div>
            <div class="mgb-40 padb-30 auto-invert line-b-4 align-center">
                <h4 class="font-cond-l fg-accent lts-md mgb-10" contenteditable="false">Not Yet Convinced?</h4>
                <h1 class="font-cond-b fg-text-d lts-md fs-300 fs-300-xs no-mg" contenteditable="false">Read Customer Reviews</h1>
                <div class="bttn-check">
                    <center><a class="btn btn-warning text-center mt-2" href="{{ route('postreview', $product->IDProduct) }}">Add Your Review</a></center>
                </div>
            </div>
            @foreach($review as $rvw)
            <ul class="hash-list cols-3 cols-1-xs pad-30-all align-center text-sm">
                <li>
                    <img src="" class="wpx-100 mb-4" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                    <p><small class="font-cond-w case-u lts-sm fs-80 fg-text-l" contenteditable="false">Rating Product : {{$rvw->Rating}}/5</small></p>
                    <p class="fs-110 font-cond-l" contenteditable="false">"{{$rvw->Comments}}"</p>
                    <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">{{$rvw->user->fname}} {{$rvw->user->lname}}</h5>
                </li>
            </ul>
            @endforeach
</div>

@endsection