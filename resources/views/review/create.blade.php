@extends('layout/template')

@section('title', 'Review')

@section('css')
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<link rel="stylesheet" href="{{asset('css/user-review.css')}}">
@endsection

@section('container')
<div id="container">
    <form class="box-right-default flex-column" action="{{ route('storereview') }}" method="POST" id="box-right" enctype="multipart/form-data">
        @csrf
            <div class="flex-column head-form">
                <h1 class="poppins">REVIEW PRODUCT</h1>
                <input type="hidden" name="IDProduct" value="{{ $product->IDProduct }}">
                <p class="poppins">{{ $product->Product_Name }}</p>
            </div>
            <div class="flex-column" id="form-group">
                <div class="flex-row form-label">
                    <label class="poppins" for="rating">Product Rating</label>
                    <select class="poppins" name="Rating" id="rating">
                        <option selected disabled value="">Give rating 1-5</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="flex-row form-label" id="start">
                    <label class="poppins" for="comments">Comments</label>
                    <textarea class="form-control @error('Review') is-invalid @enderror" name="Comments" id="comments" placeholder="Review of Product"></textarea>
                    @error('Description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="flex-row form-label">
                    <label class="poppins" for="image">Review Product Photo</label>
                    <input type="file" accept="image/*" name="Image_Review" id="image">
                </div>
            </div>
            <div class="flex-row center" id="doubel-button">
                <center><button class="poppins" type="button" id="back" onclick="location.href='{{ route('shopDetails', $product->IDProduct) }}'">Cancel</button>
                <button class="poppins" type="submit" id="next">Post</button></center>
            </div>
        </form>
</div>
@endsection