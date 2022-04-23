@extends('../layout/indexcrud')

@section('title', 'User Control')

@section('container')

	<div class="container-fluid">
		<h2 style="padding:4px; margin-bottom: (spacer * .25) !important;">Data User</h2>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">
	</div>
	<div class="table-info-group m-4 mt-1">
		<table class="table table-striped table-bordered table-hover text-center">
			<thead>
				<tr>
					<th scope="col" style="width:200px">ID User</th>
					<th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach( $User as $usr )
			<tr>
					<th scope="row">{{ $usr->IDUser }}</th>
					<td>{{ $usr->username }}</td>
                    <td>{{ $usr->fname }}</td>
                    <td>{{ $usr->lname }}</td>
					<td style="width:500px">
						<form action="{{ route('user.destroy', $usr->IDUser) }}" method="POST" class="d-inline">
							<a class="btn btn-info mx-1" href="{{ route('user.show', $usr->IDUser) }}">Show</a>						
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