@extends('../layout/indexcrud')

@section('title', 'Review Control')

@section('container')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <h2 style="padding:4px; margin-bottom: (spacer * .25) !important;">Data Review Control</h2>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">
    </div>

    <div class="table-info-group m-4 mt-1">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID Review</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $review as $rvw )
            <tr>
                    <th scope="row">{{ $rvw->IDReview }}</th>
                    <td>{{ $rvw->Rating }}</td>
                    <td style="width:500px">
                        <form action="{{ route('review.destroy', $rvw->IDReview) }}" method="POST" class="d-inline">
                            <a class="btn btn-info mx-1" href="{{ route('review.show',$rvw->IDReview) }}">Show</a>
                            <a class="btn btn-warning mx-1" href="{{ route('review.edit',$rvw->IDReview) }}">Edit</a>
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