@extends('../layout/headeronly')

@section('title', 'Confirm Payment')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/payment.css') }}">
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

<div class="container">
    <div class="wrapper-content">
        <h1 class="page_header">Payment Confirmation</h1>
    </div>

    <div class="box-content">
        <div class="payment_notif">
            <p><span>Mohon diingat order ID dan email anda pada saat checkout agar konfirmasi pembayarannya berhasil</span></p>
            <p><span style="color: red;">Setelah menerima totalan, silahkan transfer dengan jumlah sesuai ke rekening BCA 123456789 (Adopt Me inc.)</span></p>
            <p><span style="color: red;">Total harga yang harus dibayar adalah Rp. {{$carts->total}}</span></p>
        </div>

        <div class="div_form">
            <form class="sirclo-form" action="{{ route('confirm') }}" method="POST" enctype="multipart/form-data" autocomplete="off" id="payment-form">
                @csrf
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="name">Sender Name<span class="required"> *</span></label>
                        <input type="text" class="form-control" id="name" readonly value="{{$carts->user->fname}} {{$carts->user->lname}}" required>
                        @error('Sender Name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="formFile" class="form-label">Transferred Receipt<span class="required"> *</span></label>
                        <input class="form-control" name="bukti_pembayaran" type="file" id="formFile">
                        @error('Image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
        </div>
        <br><br>

        <div class="bttn-check">
            <center><button type="submit" class="confirm">CONFIRM PAYMENT</button></center>
        </div>
        </form>
</div>
</div>
@endsection