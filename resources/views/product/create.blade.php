@extends('../layout/crud')

@section('title', 'Create Product')

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

	<nav class="navbar navbar-light" style="background-color: #FFCC92;">
		<!-- Brand -->
		<a class="btn btn-outline-secondary navbar-brand" href="{{ url('/viewproduct') }}">Back</a>
	</nav>
	
	<div class="container-fluid">
		<h3 style="padding:4px; margin-bottom: (spacer * .25) !important;">ADD NEW PRODUCT</h3>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
	</div>
    <form class="m-3" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group col-md-6">
            <label for="ID" class="col-form-label">ID Product</label>
            <input type="id" name="id" readonly class="form-control" id="id">
        </div>
        <div class="form-group col-md-6">
            <label for="Name" class="col-form-label">Product Name</label>
            <input type="text" name="Product_Name" class="form-control @error('Product_Name') is-invalid @enderror" id="Name" placeholder="Product Name" value="{{ old('Name') }}">
            @error('Product_Name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Price" class="col-form-label">Product Price</label>
            <input type="text" name="Product_Price" class="form-control @error('Product_Price') is-invalid @enderror" id="Price" placeholder="Product Price in fee" value="{{ old('Price') }}">
            @error('Product_Price')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Category" class="col-form-label">Product Category</label>
            <select name = "Product_Category" class="custom-select my-1 mr-sm-2" class="form-control @error('Product_Category') is-invalid @enderror" id="type">
                <option value="">Choose a product category</option>
                <option value="1">Dry Food</option>
                <option value="2">Wet Food</option>
                <option value="3">Litter</option>
                <option value="4">Cage</option>
                <option value="5">Vitamins&Supplements</option>
                <option value="6">Trays</option>
                <option value="7">Toys</option>
            </select>
            @error('Product_Category')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Stock" class="col-form-label">Product Stock</label>
            <input type="number" min="1" name="Product_Stock" class="form-control @error('Product_Stock') is-invalid @enderror" id="Stock" placeholder="Product Stock" value="{{ old('Stock') }}">
            @error('Product_Stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Weight" class="col-form-label">Product Weight</label>
            <input type="number" step="0.1" name="Product_Weight" class="form-control @error('Product_Weight') is-invalid @enderror" id="Weight" placeholder="Product Weight in kg" value="{{ old('Weight') }}">
            @error('Product_Weight')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Expired" class="col-form-label">Product Expired</label>
            <input type="date" name="Product_Expired" class="form-control" id="Expired" placeholder="Product Expired" value="{{ old('Expired') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="formFile" class="col-form-label">Product Image</label>
            <input type='file' name="Product_Image" class="imageUpload form-control" multiple="false" accept="image/*" />
			<div class="imageOutput"></div>
		</div>	
        <div class="form-group col-md-6">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" name="Product_Description" id="Description" placeholder="Write the product description here" value="{{ old('Description') }}" rows="4"></textarea>
            @error('Product_Description')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-12 mt-5 text-center">
            <a type="button" href="{{ url('/viewproduct') }}" class="btn btn-outline-secondary btn-lg text-center">Cancel</a> 
            <button type="submit" class="btn btn-success btn-lg text-center">Post</button>
        </div>
    </form>

@endsection