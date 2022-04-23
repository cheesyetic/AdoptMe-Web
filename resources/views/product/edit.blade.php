@extends('../layout/crud')

@section('title', 'Edit Product')

@section('container')

	<nav class="navbar navbar-light" style="background-color: #FFCC92;">
		<!-- Brand -->
		<a class="btn-outline-secondary navbar-brand" href="{{ url('/viewproduct') }}">Back</a>
	</nav>

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
	
	<div class="container-fluid">
		<h3 style="padding:4px; margin-bottom: (spacer * .25) !important;">EDIT PRODUCT</h3>
		<hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
	</div>
    <form class="m-3" action="{{ route('product.update', $product->IDProduct) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group col-md-6">
            <label for="ID" class="col-form-label">ID Product</label>
            <input type="id" name="id" readonly class="form-control" id="id" value="{{ $product->IDProduct }}">
        </div>
        <div class="form-group col-md-6">
            <label for="Name" class="col-form-label">Product Name</label>
            <input type="text" name="Product_Name" class="form-control @error('Product_Name') is-invalid @enderror" id="Name" placeholder="Product Name" value="{{ $product->Product_Name}}">
            @error('Product_Name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Price" class="col-form-label">Product Price</label>
            <input type="text" name="Product_Price" class="form-control @error('Product_Price') is-invalid @enderror" id="Price" placeholder="Product Price in fee" value="{{ $product->Product_Price }}">
            @error('Product_Price')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="Category" class="col-form-label">Product Category</label>
            <select name = "Product_Category" class="custom-select my-1 mr-sm-2" class="form-control @error('Product_Category') is-invalid @enderror" id="type">
                <option value="">Choose a product category</option>
                <option value="1" {{ $product->Product_Category == 1 ? 'selected' : '' }}>Dry Food</option>
                <option value="2" {{ $product->Product_Category == 2 ? 'selected' : '' }}>Wet Food</option>
                <option value="3" {{ $product->Product_Category == 3 ? 'selected' : '' }}>Litter</option>
                <option value="4" {{ $product->Product_Category == 4 ? 'selected' : '' }}>Cage</option>
                <option value="5" {{ $product->Product_Category == 5 ? 'selected' : '' }}>Vitamins&Supplements</option>
                <option value="6" {{ $product->Product_Category == 6 ? 'selected' : '' }}>Trays</option>
                <option value="7" {{ $product->Product_Category == 7 ? 'selected' : '' }}>Toys</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="Stock" class="col-form-label">Product Stock</label>
            <input type="number" min="1" name="Product_Stock" class="form-control @error('Product_Stock') is-invalid @enderror" id="Stock" placeholder="Product Stock" value="{{ $product->Product_Stock }}">
        </div>
        <div class="form-group col-md-6">
            <label for="Weight" class="col-form-label">Product Weight</label>
            <input type="number" step="0.1" name="Product_Weight" class="form-control @error('Product_Weight') is-invalid @enderror" id="Weight" placeholder="Product Weight in kg" value="{{ $product->Product_Weight }}">
        </div>
        <div class="form-group col-md-6">
            <label for="Expired" class="col-form-label">Product Expired</label>
            <input type="date" name="Product_Expired" class="form-control" id="Expired" placeholder="Product Expired" value="{{ $product->Product_Expired }}">
        </div>
        <div class="form-group col-md-6">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" name="Product_Description" id="Description" placeholder="Write the product description here..." rows="4">{{ $product->Product_Description }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="formFile" class="col-form-label">Product Image</label>
            <input type='file' name="Product_Image" class="imageUpload form-control" placeholder="" value="{{ $product->Product_Image }}">
			@if($product->Product_Image)
            <img id="Product_Image" src="{{ $product->Product_Image }}" height="70" width="70">
            @endif
		</div>	
        <div class="col-md-12 mt-5 text-center">
            <a type="button" href="{{ url('/viewproduct') }}" class="btn btn-outline-secondary btn-lg text-center">Cancel</a> 
            <button type="submit" class="btn btn-success btn-lg text-center">Post</button>
        </div>
    </form>

@endsection