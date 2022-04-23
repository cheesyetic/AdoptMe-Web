@extends('../layout/crud')

@section('title', 'Edit Article')

@section('container')

	<nav class="navbar navbar-light" style="background-color: #FFCC92;">
		<!-- Brand -->
		<a class="btn btn-outline-secondary navbar-brand" href="{{ url('/viewarticle') }}">Back</a>
	</nav>
	
	<div class="container-fluid">
		<h3 style="padding:4px; margin-bottom: (spacer * .25) !important;">EDIT ARTICLE</h3>
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

    <form class="m-3" action="{{ route('article.update', $article->IDArticle) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group col-md-6">
            <label for="ID" class="col-form-label">ID Article</label>
            <input type="char" readonly name="IDArticle" class="form-control" id="id" value="{{$article->IDArticle}}">
        </div>
        <div class="form-group col-md-6">
            <label for="Title" class="col-form-label">Title</label>
            <input type="text" name="Title" class="form-control @error('Title') is-invalid @enderror" id="Title" placeholder="Write article title here..." value="{{ $article->Title }}">
        </div>
        <div class="form-group col-md-6">
            <label for="Caption" class="col-form-label">Caption</label>
            <textarea class="form-control @error('Description') is-invalid @enderror" name="Description" id="Caption" placeholder="Write the article caption here..." rows="4">{{ $article->Description }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="formFile" class="col-form-label">Choose Image</label>
            <input type='file' name="Photo" class="form-control" placeholder="" value="{{ $article->Photo }}">
            @if($article->Photo)
            <img id="Photo" src="{{ $article->Photo }}" height="70" width="70">
            @endif
		</div>	
        <div class="col-md-12 mt-5 text-center">
            <a type="button" href="{{ url('/viewarticle') }}" class="btn btn-outline-secondary btn-lg text-center">Cancel</a> 
            <button type="submit" class="btn btn-success btn-lg text-center">Save Data</button>
        </div>
    </form>

@endsection