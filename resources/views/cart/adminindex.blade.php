@extends('../layout/indexcrud')

@section('title', 'Cart Control')

@section('container')

	<div class="container-fluid">
		<h2 style="padding:4px; margin-bottom: (spacer * .25) !important;">Data Cart</h2>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">	
	</div>
	<div class="table-info-group m-4 mt-1">
		<table class="table table-striped table-bordered table-hover text-center">
			<thead>
				<tr>
					<th scope="col" style="width:200px">ID Cart</th>
					<th scope="col">No Invoice</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach( $cart as $cart )
			<tr>
					<th scope="row">{{ $cart->IDCart }}</th>
					<td>{{ $cart->no_invoice }}</td>
                    <td>{{ $cart->status_cart }}</td>
                    <td>{{ $cart->created_at }}</td>
					<td style="width:500px">
						<form action="{{ route('deleteCart', $cart->IDCart) }}" method="POST" class="d-inline">
							<a class="btn btn-info mx-1" href="{{ route('showcart', $cart->IDCart) }}">Show</a>						
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