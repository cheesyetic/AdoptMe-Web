@extends('../layout/loginregist')

@section('title', 'Register')

@section('css')
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<link rel="stylesheet" href="{{asset('css/user-register.css')}}">
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

<div class="flex-row container ph100">
        <div class="box-left-default" id="box-left"></div>
        <form name="regist" action="{{ route('register') }}" method="POST" class="box-right-default flex-column" id="box-right" onsubmit="return validation()">
            @csrf
            <div class="flex-column head-form">
                <h1 class="poppins">START EXPLORING YOUR NEW FRIEND HERE</h1>
                <p class="poppins">Register your account here</p>
            </div>
            <div class="flex-column" id="form-group">
                <div class="flex-row input-group">
                    <input class="poppins" type="hidden" name="role" id="role" value="u">
                    <input class="poppins" type="text" name="fname" id="fname" placeholder="First Name">
                    <input class="poppins" type="text" name="lname" id="lname" placeholder="Last Name">
                </div>
                <input class="poppins" type="email" name="email" id="email" placeholder="E-mail">
                <input class="poppins" type="text" name="username" id="username" placeholder="Username">
                <input class="poppins" type="password" name="password" id="password" placeholder="Password">
                <input class="poppins" type="password" name="password_confirmation" id="confirm" placeholder="Confirm Password">
            </div>
            <button class="poppins" type="submit">Sign Up</button>
            <span class="poppins">Already have an account? <a href="{{ url('/login') }}">Log in</a></span>
        </form>
    </div>
    <script src="all.js"></script>
@endsection