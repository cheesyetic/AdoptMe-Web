<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="stylesheet" href="{{asset('css/system.css')}}">
    <link rel="stylesheet" href="{{asset('css/input.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin-register.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Oregano:ital@0;1&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="flex-row container vh100">
        <div class="box-left-default" id="box-left"></div>
        <form action="{{ route('pgfradmonly') }}" method="POST" class="box-right-default flex-column" id="box-right">
        @csrf
            <h1 class="poppins">ADMIN REGISTER</h1>
            <div class="flex-column" id="form-group">
                <div class="flex-row input-group">
                    <input class="poppins" type="hidden" name="role" id="role" value="a">
                    <input class="poppins" type="text" name="fname" id="fname" placeholder="First Name" required>
                    <input class="poppins" type="text" name="lname" id="lname" placeholder="Last Name" required>
                </div>
                <input class="poppins" type="email" name="email" id="email" placeholder="E-mail" required>
                <input class="poppins" type="text" name="username" id="username" placeholder="Username" required>
                <input class="poppins" type="password" name="password" id="password" placeholder="Password" required>
                <input class="poppins" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button class="poppins" type="submit">Register</button>
        </form>
    </div>
</body>
</html>