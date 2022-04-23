@extends('../layout/headeronly')

@section('title', 'Place Order')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/order.css') }}">
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

<div class="container-fluid">
    <div class="wrapper-content">
        <h1 class="page_header">Place an Order</h1>
    </div>

    <div class="main-content">
        <div id="place_order">
            <div class="content_box">
                <div class="content_left" id="cart-place-order-personal">
                    <form class="sirclo-form shipping-form" action="{{ route('placeorder') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <label for="name">Name<span class="required"> *</span></label>
                                <input type="text" class="form-control" id="name" readonly value="{{ $carts->user->fname }} {{ $carts->user->lname }}" required>
                                @error('Name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <label for="phonenumber">Phone Number<span class="required"> *</span></label>
                                <input type="text" class="form-control" id="phonenumber" readonly value="{{ $carts->user->Phone_Number }}" required>
                                @error('Phone Number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <label for="loc_street">Address<span class="required"> *</span></label>
                                <input type="text" class="form-control" id="loc_street" readonly value="{{ $carts->user->Loc_Street }}" required>
                                @error('Address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <label for="loc_city">City<span class="required"> *</span></label>
                                <input type="text" class="form-control" id="loc_city" readonly value="{{ $carts->user->Loc_City }}" required>
                                @error('City')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <label for="loc_postcode">Postal Code<span class="required"> *</span></label>
                                <input type="text" class="form-control" id="loc_postcode" readonly value="{{ $carts->user->Loc_Postcode }}" required>
                                @error('Postal Code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="shipping">
                            <h5 class="judulShip">Shipping Method</h5>
                            <div id="form-row-shipping_value_wrapper" class="sirclo-form-row">
                                <div class="form-check-shipping_value col-md-5 mb-7" class="sirclo-form-row">
                                    <div class="sirclo-form-input radio">
                                        <input class="form-check-input" value="JNE REG" name="shipping_value" type="radio" required="" checked>
                                        <label>JNE Reg</label>
                                    </div>
                                    <div class="sirclo-form-input radio">
                                        <input class="form-check-input" value="JNE YES" name="shipping_value" type="radio" required="" checked>
                                        <label>JNE YES</label>
                                    </div>
                                    <div class="sirclo-form-input radio">
                                        <input class="form-check-input" value="SiCepat REG" name="shipping_value" type="radio" required="" checked>
                                        <label>SiCepat REG</label>
                                    </div>
                                    <div class="sirclo-form-input radio">
                                        <input class="form-check-input" value="SiCepat BEST" name="shipping_value" type="radio" required="" checked>
                                        <label>SiCepat BEST</label>
                                    </div>
                                    <div class="sirclo-form-input radio">
                                        <input class="form-check-input" value="JnT" name="shipping_value" type="radio" required="" checked>
                                        <label>J&T</label>
                                    </div>
                                    @error('Method Shipping')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="shipping">
                            <h5 class="judulPay">Payment Method</h5>
                            <div id="form-row-payment_value_wrapper" class="sirclo-form-row">
                                <div class="form-check-payment_value col-md-5 mb-7" class="sirclo-form-row">
                                    <div class="sirclo-form-input radio">
                                        <input class="form-check-input" value="transfer" name="payment_value" type="radio" required="" checked>
                                        <label>Bank Transfer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">I have read and agree to the Terms and Conditions and Privacy Policy<span class="required"> *</span></label>
                        </div>
                        <br>

                        <div class="bttn-check">
                            <center><button class="checkout" type="submit" value="PLACE ORDER">PLACE ORDER</button></center>
                        </div>
                        <br><br>      
                    </form>

                    <div class="place-order-summary right" style="margin-top: 0px;">
                                <h2 class="simple_header2">Summary Order</h2>
                                <div class="inner_summary">
                                    <div id="cart-place-order-summary-table" style="display: block;">
                                            <div class="order-summary">
                                                <table>
                                                    <tbody>
                                                        <tr class="cart-item-total-row">
                                                            <td class="number"><strong>Total Price : Rp. {{ $carts->total }}</strong></td>
                                                        </tr>
                                                        <tr class="cart-total-row">
                                                            <td class="number">Shipping and Handling ({{ $carts->user->Loc_Country }} - {{ $carts->user->Loc_City }})</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection