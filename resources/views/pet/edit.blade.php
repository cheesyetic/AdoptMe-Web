@extends('../layout/crud')

@section('title', 'Edit Pet')

@section('container')

    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ route('pet.index') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h3 style="padding:4px; margin-bottom: (spacer * .25) !important;">ADOPTION PET DATA CONTROL</h3>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

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

    <form class="m-3" action="{{ route('pet.update', $pet->PetID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id" class="col-form-label">ID Pet</label>
            <input type="id" readonly class="form-control" id="id" value="{{ $pet->PetID }}" required>
        </div>
        <div class="form-group">
            <label for="name" class="col-form-label">Pet Name</label>
            <input type="text" name="Pet_Name" class="form-control" id="name" placeholder="Pet Name" value="{{ $pet->Pet_Name }}" required>
        </div>
        <div class="form-group">
            <label for="street" class="col-form-label">Pet Location</label>
            <input type="text" class="form-control" name="Pet_Street" id="street" placeholder="Street" value="{{ $pet->Pet_Street }}" required>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <input type="text" name="Pet_Districts" class="form-control" id="districts" placeholder="districts" value="{{ $pet->Pet_Districts }}" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="Pet_City" class="form-control" id="city" placeholder="city" value="{{ $pet->Pet_City }}" required>
            </div>
            <div class="form-group col-md-6">
                <input type="number" name="Pet_Postcode" class="form-control" id="postcode" placeholder="Postal Code" value="{{ $pet->Pet_Postcode }}" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="Pet_Country" class="form-control" id="country" placeholder="country" value="{{ $pet->Pet_Country }}" required>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="fee" class="col-form-label">Adoption Fee</label>
            <input type="text" name="Pet_Fee" class="form-control" id="price" placeholder="Adopt fee in IDR" value="{{ $pet->Pet_Fee }}">
        </div>
        <div class="form-group col-md-6">
            <label for="category" class="col-form-label">Pet Category</label>
            <select name = "Pet_Category" class="custom-select my-1 mr-sm-2" class="form-control" id="type">
                <option value="">Choose a pet category</option>
                <option value="1" {{ $pet->Pet_Category == 1 ? 'selected' : '' }}>Cat</option>
                <option value="2" {{ $pet->Pet_Category == 2 ? 'selected' : '' }}>Dog</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="type" class="col-form-label">Pet Type</label>
            <input type="text" name="Pet_Type" class="form-control" id="type" placeholder="Pet Type" value="{{ $pet->Pet_Type}}">
        </div>
        <div class="form-group col-md-6">
            <label for="age" class="col-form-label">Pet Age</label>
            <input type="number" min="1" name="Pet_Age" class="form-control" id="age" placeholder="Pet Age in month" value="{{ $pet->Pet_Age }}">
        </div>
        <div class="form-group col-md-6">
            <label for="description" class="col-form-label">Description</label>
            <textarea class="form-control" name="Pet_Description" id="description" placeholder="My pet is adorable. Please adopt her." rows="4">{{ $pet->Pet_Description }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="formFile" class="col-form-label">Pet Image</label>
            <input type='file' name="Pet_Photo" class="imageUpload form-control" placeholder="">
            <img src="{{ $pet->Pet_Photo }}" width="300px">
        </div>	
        <div class="col-md-12 text-center">
            <a type="button" href="/viewpet" class="btn btn-outline-secondary btn-lg text-center">Cancel</a> 
            <button type="submit" class="btn btn-warning btn-lg text-center">Update</a>
        </div>
    </form>

@endsection