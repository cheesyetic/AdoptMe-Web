@extends('../layout/indexcrud')

@section('title', 'Pet Control')

@section('container')
    <div class="container-fluid">
        <h2 style="padding:4px; margin-bottom: (spacer * .25) !important;">Adoption Data Control</h2>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">
    </div>

    <div class="table-info-group m-4 mt-1">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID Pet</th>
                    <th scope="col">Pet Name</th>
                    <th scope="col">Pet Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $pet as $adopt )
            <tr>
                    <th scope="row">{{ $adopt->PetID }}</th>
                    <td>{{ $adopt->Pet_Name }}</td>
                    <td><img src="{{ $adopt->Pet_Photo }}" width="50px"></td>
                    <td style="width:500px">
                        <form action="{{ route('pet.destroy', $adopt->PetID) }}" method="POST" class="d-inline">
                            <a class="btn btn-info mx-1" href="{{ route('pet.show',$adopt->PetID) }}">Show</a>
                            <a class="btn btn-warning mx-1" href="{{ route('pet.edit',$adopt->PetID) }}">Edit</a>
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