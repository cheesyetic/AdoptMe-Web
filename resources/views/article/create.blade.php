@extends('../layout/crud')

@section('title', 'Create Article')

@section('container')

	<nav class="navbar navbar-light" style="background-color: #FFCC92;">
		<!-- Brand -->
		<a class="btn btn-outline-secondary navbar-brand" href="{{ url('/viewarticle') }}">Back</a>
	</nav>
	
	<div class="container-fluid">
		<h3 style="padding:4px; margin-bottom: (spacer * .25) !important;">ADD NEW ARTICLE</h3>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
	</div>
    <form class="m-3" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group col-md-6">
            <label for="ID" class="col-form-label">ID Article</label>
            <input type="char" readonly name="IDArticle" class="form-control" id="id">
        </div>
        <div class="form-group col-md-6">
            <label for="Title" class="col-form-label">Title</label>
            <input type="text" name="Title" class="form-control @error('Title') is-invalid @enderror" id="Title" placeholder="Write article title here...">
        @error('Title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Caption" class="col-form-label">Caption</label>
            <textarea class="form-control @error('Description') is-invalid @enderror" name="Description" id="Caption" placeholder="Write the article caption here..." rows="4"></textarea>
            @error('Description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="formFile" class="col-form-label">Choose Image</label>
            <input type='file' name="Photo" class="imageUpload form-control" multiple="false" accept="image/*" />
			<div class="imageOutput"></div>
		</div>	
        <div class="col-md-12 mt-5 text-center">
            <a type="button" href="viewArticle.php" class="btn btn-outline-secondary btn-lg text-center">Cancel</a> 
            <button type="submit" class="btn btn-success btn-lg text-center">Upload</button>
        </div>
    </form>

@endsection