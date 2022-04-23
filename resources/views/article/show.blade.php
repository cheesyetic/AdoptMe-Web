@extends('../layout/crud')

@section('title', 'Show Article')

@section('container')

    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ url('/viewarticle') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h5 style="padding-top:4px; margin-bottom: (spacer * .25) !important;">SHOW ARTICLE</h5>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

    <form>
        <div class="form-group row col-md-6">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="title" value="{{ $article->Title }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="description" readonly class="form-control" id="description" value="{{ $article->Description }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="image" class="col-sm-2">Image</label>
            <div class="col-sm-10">
                <img type="image" readonly class="" id="image" src="{{ $article->Photo }}" width="400px">
            </div>
        </div>
    </form>

@endsection