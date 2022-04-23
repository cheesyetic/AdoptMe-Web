@extends('../layout/crud')

@section('title', 'Show Admin')

@section('container')
    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ route('admin.index') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h5 style="padding-top:4px; margin-bottom: (spacer * .25) !important;">Admin Data Control</h5>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>
    
    <form>
        <div class="form-group row col-md-6">
            <label for="id" class="col-sm-2 col-form-label">ID Admin</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="id" value="{{ $User->IDUser }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="username" value="{{ $User->username }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="firstname" value="{{ $User->fname }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="lastname" value="{{ $User->lname }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="email" value="{{ $User->email }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="phonenumber" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="phonenumber" value="{{ $User->Phone_Number }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="location" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="location" value="{{ $User->Loc_Street }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="status" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="status" value="{{ $User->role }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="image" class="col-sm-2">Profile Photo</label>
            <div class="col-sm-10">
                <img type="image" readonly class="" id="image" src="{{ $User->User_Photo }}" width="400px">
            </div>
        </div>
    </form>

@endsection