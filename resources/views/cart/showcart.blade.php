@extends('../layout/crud')

@section('title', 'Show Cart')

@section('container')
    <nav class="navbar navbar-light" style="background-color: #FFCC92;">
        <!-- Brand -->
        <a class="btn btn-outline-secondary navbar-brand" href="{{ route('viewcart') }}">Back</a>
    </nav>

    <div class="container-fluid">
        <h5 style="padding-top:4px; margin-bottom: (spacer * .25) !important;">SHOW CART DETAILS</h5>
        <hr style="height:2px; border-width:0; color:#bfbfbf; background-color:#bfbfbf">		
    </div>

    <form>
        <div class="form-group row col-md-6">
            <label for="id" class="col-sm-2 col-form-label">ID Cart</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="id" value="{{ $cart->IDCart }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="name" class="col-sm-2 col-form-label">Buyer Name</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" value="{{ $cart->user->fname }} {{ $cart->user->lname }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="street" class="col-sm-2 col-form-label">No. Invoice</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="street" value="{{ $cart->no_invoice }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="fee" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="fee" value="{{ $cart->status_cart }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="category" class="col-sm-2 col-form-label">Total</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="category" value="{{ $cart->total }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="type" class="col-sm-2 col-form-label">Created</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="type" value="{{ $cart->created_at }}">
            </div>
        </div>
        <div class="form-group row col-md-6">
            <label for="age" class="col-sm-2 col-form-label">Updated</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="age" value="{{ $cart->updated_at }}">
            </div>
        </div>
    </form>

@endsection