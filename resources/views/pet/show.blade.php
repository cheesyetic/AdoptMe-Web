@extends('../layout/crud')

@section('title', 'Show Pet')

@section('container')
    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ route('pet.index') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h5 style="padding-top:4px; margin-bottom: (spacer * .25) !important;">SHOW ADOPT DETAILS</h5>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

    <form>
        <div class="form-group row col-md-6">
            <label for="id" class="col-sm-2 col-form-label">Pet ID</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="id" value="{{ $pet->PetID }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="name" class="col-sm-2 col-form-label">Pet Name</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" value="{{ $pet->Pet_Name }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="street" class="col-sm-2 col-form-label">Pet Location</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" value="{{ $pet->Pet_Street }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="fee" class="col-sm-2 col-form-label">Pet Fee</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="fee" value="{{ $pet->Pet_Fee }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="category" class="col-sm-2 col-form-label">Pet Category</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="category" value="{{ $pet->Pet_Category }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="type" class="col-sm-2 col-form-label">Pet Type</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="type" value="{{ $pet->Pet_Type }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="stock" class="col-sm-2 col-form-label">Pet Age</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="age" value="{{ $pet->Pet_Age }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="description" readonly class="form-control" id="description" value="{{ $pet->Pet_Description }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="image" class="col-sm-2">Image</label>
            <div class="col-sm-10">
                <img type="image" readonly class="" id="image" src="{{ $pet->Pet_Photo }}" width="400px">
            </div>
        </div>
    </form>

@endsection