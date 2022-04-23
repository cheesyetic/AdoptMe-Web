<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{asset('css/system.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Oregano:ital@0;1&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="flex-row" id='header'>
        <div class="logo flex-row">
            <img src="img/logo.svg" alt="">
            <span class="oregano">dopt Me!</span>
        </div>
        <nav class="flex-row" id="nav">
            <a href="{{ url('/home') }}" class="poppins">HOME</a>
            <a href="{{ url('/adopt') }}" class="poppins">ADOPT</a>
            <a href="{{ url('/shop') }}" class="poppins">SHOP</a>
            <a href="{{ url('/getarticle') }}" class="poppins">ARTICLE</a>
            <a href="#footer" class="poppins">CONTACT</a>
        </nav>
        <div class="flex-row" id="box-login">
            <a href="{{ url('/login') }}" class="poppins pasive">Sign In</a>
            <a href="{{ url('/register') }}" class="poppins active">Register</a>
        </div>
    </header>
    <div class="flex-row" id="container">
        <img src="img/topping-1.svg" alt="" id="topping-1">
        <img src="img/topping-2.svg" alt="" id="topping-2">
        <div class="flex-row" id="box-content">
            <div class="content flex-column">
                <h1>New Way To Make A Friend</h1>
                <p class="poppins">Life is better with a pet. So, adopt them, don’t buy.</p>
                <a href="/register"><button type="button" class="poppins">Learn More</button></a>
            </div>
            <div class="illust">
                <img src="img/illust/undraw_chilling_8tii.svg" alt="">
            </div>
        </div>
    </div>
    <footer class="flex-row" id="footer">
        <div class="footer-group flex-column">
            <div class="title-footer">
                <h2 class="poppins">About Us</h2>
            </div>
            <p class="poppins">We are a non-profit organization that serve adopting pets, especially cat and dog.  Our mission and passion is to help adopters find a new friend and into loving homes.</p>
        </div>
        <div class="footer-group flex-column">
            <div class="title-footer">
                <h2 class="poppins">Company Address</h2>
            </div>
            <a href="#" class="flex-row poppins"><img src="img/fluent_call-24-filled.svg" alt="">+621 323 343</a>
            <a href="#" class="flex-row poppins"><img src="img/mail.svg" alt="">hello@adoptme.com</a>
            <a href="#" class="flex-row poppins"><img src="img/fluent_location-28-filled.svg" alt="">56 Jakarta, Indonesia</a>
        </div>
        <div class="footer-group flex-column">
            <div class="title-footer">
                <h2 class="poppins">Connect with Us</h2>
            </div>
            <div class="flex-row" id="list-sosmed">
                <a href="www.twitter.com"><img src="img/twitter-circle-filled.svg " width="50" height="50" style="size:50px" alt=""></a>
                <a href="www.instagram.com"><img src="img/instagram-alt.svg" width="50" height="50" style="size:50px" alt=""></a>
                <a href="www.facebook.com"><img src="img/twotone-facebook.svg" style="size:50px" alt=""></a>
            </div>
        </div>
    </footer>
</body>
</html>
