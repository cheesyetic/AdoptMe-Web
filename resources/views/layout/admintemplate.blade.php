<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/system.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/lightslider.css">
    @yield('css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="js/fr.js"></script>
    <script src="js/JQuery3.3.1.js"></script>
    <script src="js/lightslider.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Oregano:ital@0;1&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<header class="flex-row" id='header'>
        <div class="logo flex-row">
            <img src="img/logo.svg" alt="">
            <span class="oregano">dopt Me!</span>
        </div>
        <nav class="flex-row" id="nav">
            <p class="poppins">Welcome Admin!</p>
        </nav>
        <div class="flex-row" id="box-user">
            <div class="ddd">
                <a class="ddbb"><img src="img/profile-nav.svg" class="fa fa-caret-down" alt="profile"></a>
                <div class="ddd-content">
                    <a href="{{ url('admprofile') }}">Edit Profile</a>
                    <a href="{{ route('logoutAdmin') }}">Log Out</a>
                </div>
            </div>
        </div>
    </header>
    @yield('container')
</body>
</html>