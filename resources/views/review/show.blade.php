@extends('../layout/crud')

@section('title', 'Show Review')

@section('container')

    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ route('review.index') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h5 style="padding-top:4px; margin-bottom: (spacer * .25) !important;">SHOW REVIEW DETAILS</h5>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

    <form>
        <div class="form-group row col-md-6">
            <label for="id" class="col-sm-2 col-form-label">Review ID</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="id" value="{{ $review->IDReview }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="name" class="col-sm-2 col-form-label">Product Comments</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" value="{{ $review->Comments }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="category" class="col-sm-2 col-form-label">Product Rating</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="category" value="{{ $review->Rating }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="image" class="col-sm-2">Image</label>
            <div class="col-sm-10">
                <img type="image" readonly class="" id="image" src="{{ $review->Image_Review }}" width="400px">
            </div>
        </div>
    </form>

@endsection