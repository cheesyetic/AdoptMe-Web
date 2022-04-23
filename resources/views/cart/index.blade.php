@extends('../layout/headeronly')

@section('title', 'Shopping Cart')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet"href="{{ asset('css/cart.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection

@section('container')

@if(count($errors) > 0)
      @foreach($errors->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
      @endforeach
@endif
@if ($message = Session::get('error'))
          <div class="alert alert-warning">
              <p>{{ $message }}</p>
          </div>
@endif
@if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
@endif
      

<section class="mt-4">
<div class="container">
<div class="cart">
<div class="table-responsive">
<table class="table">
<thead class="thead">
    <tr>
        <th scope="col"class="text-white">Product</th>
        <th scope="col"class="text-white">Price</th>
        <th scope="col"class="text-white">Quantity</th>
        <th scope="col"class="text-white">Total</th>
    </tr>
</thead>
<tbody>
@foreach( $carts->detail as $details )
    <tr>
        <td>
        <div class="main">
        <div class="d-flex">
            <img src="{{ $details->product->Product_Image }}"alt="" width="120" height="120">
        </div>
        <div class="des">
            <p>{{ $details->product->Product_Name }}</p>
        </div>
        </div>
        </td>
        <td>
        <h6>Rp. {{ $details->harga }}</h6>
        </td>
        <td>
        <div class="btn-group" role="group">
            <form action="{{ route('cartdetail.update',$details->IDCartDetail) }}" method="post">
            @method('patch')
            @csrf
            <input type="hidden" name="param" value="kurang" min="0">
            <button class="btn btn-primary btn-sm">
            -
            </button>
            </form>
            <button class="btn btn-outline-primary btn-sm" disabled="true">
            {{ $details->qty }}
            </button>
            <form action="{{ route('cartdetail.update',$details->IDCartDetail) }}" method="post">
            @method('patch')
            @csrf
            <input type="hidden" name="param" value="tambah" min="0">
            <button class="btn btn-primary btn-sm">
            +
            </button>
            </form>
        </div>
        </td>
        <td>
        <h6>Rp. {{ $details->subtotal }} </h6>
        <br>
        <div class="remove">
            <form action="{{ route('cartdetail.destroy', $details->IDCartDetail) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove</button>
            </form>
        </div>
        </td>
    </tr>
@endforeach
</tbody>
</table>
<form action="{{ route('cart.destroy', $carts->IDCart) }}" method="post">
@csrf
@method('DELETE')
<div class="float-right col-2">
    <right><button type="submit" class="btn btn-danger">Delete All</button></right>
</div>
</form>
</div>
</div>
</div>
</section>
<div class="col-lg-4 offset-lg-4">
<div class="checkout">
    <ul>
        <li class="subtotal">No. Invoice
        <span>{{ $carts->no_invoice }}</span>
        </li>
        <li class="cart-total">Total
        <span>Rp. {{ $carts->subtotal }}</span>
        </li>
    </ul>
    <a href="{{ url('/checkout') }}"class="proceed-btn">Proceed to Checkout</a>
</div>
</div>
@endsection