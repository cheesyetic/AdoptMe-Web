@extends('../layout/admintemplate')

@section('css')
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<link rel="stylesheet" href="{{asset('css/admin-edit-profile.css')}}">
@endsection

@section('title', 'Edit Profile')

@section('container')
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

    <div id="container">
        <form class="box-right-default flex-column" action="{{ route('updateprofileadmin') }}" method="POST" enctype="multipart/form-data" id="box-right">
        @csrf
        @method('PUT')
            <div class="poppins flex-column head-form center">
                <h1 class="poppins">EDIT PROFILE</h1>
                <img src="{{ $User->User_Photo }}" alt="">
                <label class="poppins center" for="photo"></label>
                <input type="file" accept="image/*" name="User_Photo" id="photo">
            </div>
            <div class="flex-column" id="form-group">
                <div class="flex-column form-label">
                    <label class="poppins" for="username">Username</label>
                    <input class="poppins" type="text" name="username" id="username" placeholder="Username" value="{{ $User->username }}" required>
                </div>
                <div class="flex-row input-group">
                    <div class="flex-column form-label">
                        <label class="poppins" for="fname">First Name</label>
                        <input class="poppins" type="text" name="fname" id="fname" placeholder="First Name" value="{{ $User->fname }}" required>
                    </div>
                    <div class="flex-column form-label">
                        <label class="poppins" for="lname">Last Name</label>
                        <input class="poppins" type="text" name="lname" id="lname" placeholder="Last Name" value="{{ $User->lname }}" required>
                    </div>
                </div>
                <div class="flex-column form-label">
                    <label class="poppins" for="email">Email</label>
                    <input class="poppins" type="email" name="email" id="email" placeholder="E-Mail" value="{{ $User->email }}" required>
                </div>
                <div class="flex-column form-label">
                    <label class="poppins" for="phone">Phone Number</label>
                    <input class="poppins" type="text" name="Phone_Number" id="phone" placeholder="Phone Number" value="{{ $User->Phone_Number }}">
                </div>
                <div class="flex-column form-label">
                    <label class="poppins" for="street">Address</label>
                    <div class="flex-column address-box">
                        <input class="poppins" type="text" name="Loc_Street" id="street" placeholder="Street" value="{{ $User->Loc_Street }}">
                        <div class="flex-row input-group">
                            <input class="poppins" type="text" name="Loc_Districts" placeholder="Districts" value="{{ $User->Loc_Districts }}">
                            <input class="poppins" type="text" name="Loc_City" placeholder="City" value="{{ $User->Loc_City }}">
                        </div>
                        <div class="flex-row input-group">
                            <input class="poppins" type="text" name="Loc_Postcode" placeholder="Postal Code" value="{{ $User->Loc_Postcode }}">
                            <input class="poppins" type="text" name="Loc_Country" placeholder="Country" value="{{ $User->Loc_Country }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-row center" id="doubel-button">
                <center><button class="poppins" type="button" id="back" onclick="window.location='{{ url("/homeadmin") }}'">Cancel</button>
                <button class="poppins" type="submit" id="next">Save</button></center>
            </div>
        </form>
</div>
@endsection