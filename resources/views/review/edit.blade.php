@extends('../layout/crud')

@section('title', 'Edit Review')

@section('container')
    <nav class="navbar navbar-light mb-0 h1 justify-content-center" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="navbar-brand text-center mb-0 h1">REVIEW DATA CONTROL</a>
    </nav>

    <div class="container-fluid">
        <h3 style="padding:4px; margin-bottom: (spacer * .25) !important;">UPDATE REVIEW DATA</h3>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="m-3" action="{{ route('review.update', $review->IDReview) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group col-md-6">
            <label for="id" class="col-form-label">ID Review</label>
            <input type="char" readonly name="id" class="form-control" id="IDReview" value="{{$review->IDReview}}">
        </div>
        <div class="form-group col-md-6">
            <label for="rating" class="col-form-label">Rating</label>
            <select name = "Rating" class="custom-select my-1 mr-sm-2" class="form-control @error('Rating') is-invalid @enderror" id="Rating">
                <option value="">Choose a product ratings</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="comments" class="col-form-label">Comments</label>
            <input type="text" name="Comments" class="form-control @error('Comments') is-invalid @enderror" id="Comments" placeholder="Write product review here..." value="{{ $review->Comments }}">
        </div>
        <div class="form-group col-md-6">
            <label for="formFile" class="col-form-label">Choose Image</label>
            <input type='file' name="Image_Review" id="Image_Review" class="form-control" placeholder="">
            <img src="{{ $review->Image_Review }}" width="300px">
        </div>	
        <div class="col-md-12 mt-5 text-center">
            <a type="button" href="{{ route('review.index') }}" class="btn btn-outline-secondary btn-lg text-center">Cancel</a> 
            <button type="submit" class="btn btn-success btn-lg text-center">Save</button>
        </div>
    </form>

@endsection