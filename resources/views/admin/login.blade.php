<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{asset('css/system.css')}}">
    <link rel="stylesheet" href="{{asset('css/input.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-login.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Oregano:ital@0;1&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="flex-row container vh100">
        <form action="{{ route('adptmadm') }}" method="POST" class="box-right-default flex-column" id="box-right">
        @csrf
            <h1 class="poppins">ADMIN LOGIN</h1>
            <div class="flex-column" id="form-group">
                <input class="poppins" type="email" name="email" id="email" placeholder="E-mail" required>
                <input class="poppins" type="password" name="password" id="password" placeholder="Password" required>
                <div class="flex-row option">
                    <div class="flex-row check-box">
                        <input type="checkbox" name="keep" id="keep">
                        <label for="keep" class="poppins">Keep me logged in</label>
                    </div>
                    <a href="" class="poppins">Forgot your password?</a>
                </div>
            </div>
            <button class="poppins" type="submit">Login</button>
        </form>
        <div class="box-left-default" id="box-left"></div>
    </div>
</body>
</html>