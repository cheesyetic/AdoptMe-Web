@extends('../layout/loginregist')

@section('title', 'Login')

@section('css')
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<link rel="stylesheet" href="{{asset('css/user-login.css')}}">
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
        <form action="{{ route('login') }}" method="POST" class="box-right-default flex-column" id="box-right">
        @csrf
            <div class="flex-column head-form">
                <h1 class="poppins">LOGIN</h1>
                <p class="poppins">Welcome back! We are glad to see you here.</p>
            </div>
            <div class="flex-column" id="form-group">
                <input class="poppins" type="email" name="email" id="email" placeholder="E-mail">
                <input class="poppins" type="password" name="password" id="password" placeholder="Password">
                <div class="flex-row option">
                    <div class="flex-row check-box">
                        <input type="checkbox" name="keep" id="keep">
                        <label for="keep" class="poppins">Keep me logged in</label>
                    </div>
                    <a href="" class="poppins">Forgot your password?</a>
                </div>
            </div>
            <button class="poppins" type="submit">Login</button>
            <span class="poppins">Don’t have an account? <a href="{{ url('/register') }}">Sign up</a></span>
        </form>
        <div class="box-left-default" id="box-left"></div>
    </div>
@endsection