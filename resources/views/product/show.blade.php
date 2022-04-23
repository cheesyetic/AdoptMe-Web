@extends('../layout/crud')

@section('title', 'Show Product')

@section('container')
    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ route('product.index') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h5 style="padding-top:4px; margin-bottom: (spacer * .25) !important;">SHOW PRODUCT DETAILS</h5>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

    <form>
        <div class="form-group row col-md-6">
            <label for="id" class="col-sm-2 col-form-label">Product ID</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="id" value="{{ $product->IDProduct  }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" value="{{ $product->Product_Name }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="price" class="col-sm-2 col-form-label">Product Price</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="price" value="{{ $product->Product_Price }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="category" class="col-sm-2 col-form-label">Product Category</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="category" value="{{ $product->Product_Category }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="stock" class="col-sm-2 col-form-label">Product Stock</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="stock" value="{{ $product->Product_Stock }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="weight" class="col-sm-2 col-form-label">Product Weight</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="weight" value="{{ $product->Product_Weight }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="expired" class="col-sm-2 col-form-label">Product Expired</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="expired" value="{{ $product->Product_Expired }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="description" readonly class="form-control" id="description" value="{{ $product->Product_Description }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="image" class="col-sm-2">Image</label>
            <div class="col-sm-10">
                <img type="image" readonly class="" id="image" src="{{ $product->Product_Image }}" width="400px">
            </div>
        </div>
    </form>

@endsection