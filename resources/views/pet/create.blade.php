@extends('../layout/template')

@section('title', 'Post Adopt')

@section('css')
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<link rel="stylesheet" href="{{asset('css/user-add-product.css')}}">
@endsection

@section('container')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div id="container">
        <form class="box-right-default flex-column" action="{{ route('storepet') }}" method="POST" id="box-right" enctype="multipart/form-data">
            @csrf
            <div class="flex-column head-form">
                <h1 class="poppins">START REHOME FOR YOUR PET</h1>
            </div>
            <div class="flex-column" id="form-group">
                <div class="flex-row form-label">
                    <label class="poppins" for="name">Pet Name</label>
                    <input class="poppins mp815" type="text" name="Pet_Name" id="name" placeholder="Pet name">
                </div>
                <div class="flex-row form-label" id="start">
                    <label class="poppins" for="street">Pet Location</label>
                    <div class="flex-column address-box mp815">
                        <input class="poppins" type="text" name="Pet_Street" id="street" placeholder="Street">
                        <div class="flex-row input-group">
                            <input class="poppins" type="text" name="Pet_Districts" placeholder="Districts">
                            <input class="poppins" type="text" name="Pet_City" placeholder="City">
                        </div>
                        <div class="flex-row input-group">
                            <input class="poppins" type="text" name="Pet_Postcode" placeholder="Postal Code">
                            <input class="poppins" type="text" name="Pet_Country" placeholder="Country">
                        </div>
                    </div>
                </div>
                <div class="flex-row form-label">
                    <label class="poppins" for="fee">Adoption Fee</label>
                    <input class="poppins mp400" type="text" name="Pet_Fee" id="fee" placeholder="Adoption fee in IDR">
                </div>
                <div class="flex-row form-label">
                    <label class="poppins" for="category">Pet Category</label>
                    <select class="poppins" name="Pet_Category" id="category">
                        <option selected disabled value="">Select a category</option>
                        <option value="1">Cat</option>
                        <option value="2">Dog</option>
                    </select>
                </div>
                <div class="flex-row form-label">
                    <label class="poppins" for="type">Pet Type</label>
                    <input class="poppins mp400" type="text" name="Pet_Type" id="type" placeholder="Pet type based on category">
                </div>
                <div class="flex-row form-label">
                    <label class="poppins" for="age">Pet Age</label>
                    <input class="poppins mp400" type="number" name="Pet_Age" id="age" placeholder="Age of Pet (Months)">
                </div>
                <div class="flex-row form-label">
                    <label class="poppins" for="photo">Pet Photo</label>
                    <input type="file" accept="image/*" name="Pet_Photo" id="photo">
                </div>
                <div class="flex-row form-label" id="start">
                    <label class="poppins" for="description">Pet Description</label>
                    <textarea name="Pet_Description" id="description" placeholder="My pet is adorable. Please adopt her."></textarea>
                </div>
            </div>
            <div class="flex-row center" id="doubel-button">
                <center><button class="poppins" type="button" id="back">Cancel</button>
                <button type="submit" class="poppins" id="next">Post</button></center>
            </div>
        </form>
</div>
@endsection