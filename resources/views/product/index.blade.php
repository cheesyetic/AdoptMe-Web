@extends('../layout/indexcrud')

@section('title', 'Product Control')

@section('container')

	<div class="container-fluid">
		<h2 style="padding:4px; margin-bottom: (spacer * .25) !important;">Data Product</h2>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">
		<div class="d-inline-flex p-2 bd-highlight">
			<a class="btn btn-primary mx-1" href="{{ url('/postproduct') }}">Add New Product</a>
		</div>		
	</div>
	<div class="table-info-group m-4 mt-1">
		<table class="table table-striped table-bordered table-hover text-center">
			<thead>
				<tr>
					<th scope="col" style="width:200px">ID Product</th>
					<th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach( $product as $prd )
			<tr>
					<th scope="row">{{ $prd->IDProduct }}</th>
					<td>{{ $prd->Product_Name }}</td>
                    <td>{{ $prd->Product_Category }}</td>
                    <td>{{ $prd->Product_Price }}</td>
					<td style="width:500px">
						<form action="{{ route('product.destroy', $prd->IDProduct) }}" method="POST" class="d-inline">
							<a class="btn btn-info mx-1" href="{{ route('product.show', $prd->IDProduct) }}">Show</a>
							<a class="btn btn-warning mx-1" href="{{ route('product.edit', $prd->IDProduct) }}">Edit</a>							
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