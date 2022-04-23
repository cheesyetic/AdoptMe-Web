<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/system.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="{{asset('js/fr.js')}}"></script>
    <script src="{{asset('js/JQuery3.3.1.js')}}"></script>
    <script src="{{asset('js/lightslider.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Oregano:ital@0;1&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="flex-row" id='header'>
        <div class="logo flex-row">
            <img src="{{asset('img/logo.svg')}}" alt="">
            <span class="oregano">dopt Me!</span>
        </div>
        <nav class="flex-row" id="nav">
            <a href="{{ url('/home') }}" class="poppins">HOME</a>
            <a href="{{ url('/adopt') }}" class="poppins">ADOPT</a>
            <a href="{{ url('/shop') }}" class="poppins">SHOP</a>
            <a href="{{ url('/getarticle') }}" class="poppins">ARTICLE</a>
        </nav>
        <div class="flex-row" id="box-user">
            <a href="{{ url('/cart') }}"><img src="{{asset('img/emojione-monotone_shopping-cart.svg')}}" alt="cart"></a>
            <div class="ddd">
                <a class="ddbb"><img src="{{asset('img/profile-nav.svg')}}" class="fa fa-caret-down" alt="profile"></a>
                <div class="ddd-content">
                    <a href="{{ route('editprofile') }}">Edit Profile</a>
                    <a href="{{ route('confirmpayment') }}">Payment</a>
                    <a href="{{ url('/logout') }}">Log Out</a>
                </div>
            </div>
        </div>
    </header>
    @yield('container')
    <script>
        $(document).ready(function() {
            $('#autoWidth').lightSlider({
                autoWidth:true,
                loop:true,
                onSliderLoad: function() {
                    $('#autoWidth').removeClass('cS-hidden');
                } 
            });  
        });
    </script>
    </body>
</html>