@extends('../layout/headeronly')

@section('title', 'Shopping Cart')

@section('css')

<link rel="stylesheet"href="{{ asset('css/pay.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

@endsection

@section('container')
<section class="mt-4">
            <div class="container">
                <div class="ccc">
                    <img src="{{asset('img/Wavy_Gen-04_Single-05.jpg')}}"alt="" width="400" height="400">
                    <div class="tulisan">
                        <p>Please make your payment for your order first.<a class="shop-title" href="{{ url('/confirmpayment') }}"> PAY NOW!</a></p>
                    </div>
                </div>
            </div>
</section>
@endsection