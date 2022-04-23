@extends('../layout/indexcrud')

@section('title', 'Article Control')

@section('container')
	
	<div class="container-fluid">
		<h2 style="padding:4px; margin-bottom: (spacer * .25) !important;">Data Article</h2>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">
		<div class="d-inline-flex p-2 bd-highlight">
			<a class="btn btn-primary mx-1" href="{{ url('/postarticle') }}">Add New Article</a>
		</div>		
	</div>
	<div class="table-info-group m-4 mt-1">
		<table class="table table-striped table-bordered table-hover text-center">
			<thead>
				<tr>
					<th scope="col">ID Article</th>
					<th scope="col">Judul Article</th>
					<th scope="col">Description</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach( $article as $art )
			<tr>
					<th scope="row">{{ $art->IDArticle }}</th>
					<td>{{ $art->Title }}</td>
					<td>{{ $art->Description }}</td>
					<td style="width:500px">
						<form action="{{ route('article.destroy', $art->IDArticle) }}" method="POST" class="d-inline">
							<a class="btn btn-info mx-1" href="{{ route('article.show',$art->IDArticle) }}">Show</a>
							<a class="btn btn-warning mx-1" href="{{ route('article.edit',$art->IDArticle) }}">Edit</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger mx-1" >Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

	</div>
	
@endsection