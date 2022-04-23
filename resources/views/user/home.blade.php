@extends('../layout/template')

@section('title', 'Welcome Page')

@section('css')
<link rel="stylesheet" href="{{asset('css/homeuser.css')}}">
<link rel="stylesheet" href="{{asset('css/lightslider.css')}}">
@endsection

@section('container')
    <div class="flex-row" id="container">
        <img src="{{asset('img/topping-1.svg')}}" alt="" id="topping-1">
        <img src="{{asset('img/topping-2.svg')}}" alt="" id="topping-2">
        <div class="flex-row" id="box-content">
            <div class="content flex-column">
                <h1>New Way To Make A Friend</h1>
                <p class="poppins">Life is better with a pet. So, adopt them, don’t buy.</p>
                <a href="{{ url('/adopt') }}"><button type="button" class="poppins">Start Adopt</button></a>
            </div>
            <div class="illust">
                <img src="{{asset('img/illust/undraw_chilling_8tii.svg')}}" alt="">
            </div>
        </div>
    </div>
    <section id="main">
        <h1 class="poppins showcase-heading">Article</h1>
        <ul id="autoWidth" class="cs-hidden">
        
            <li class="item-a">
                <!--showcase-box------------------->
                <div class="showcase-box">
                    <a href="{{ route('getarticle') }}"><img src="{{asset('img/alvan-nee-T-0EW-SEbsE-unsplash.jpg')}}" width="500" height="350"/></a>
                </div>
            </li>
            <!--box-2--------------------------->
            <li class="item-b">
                <!--showcase-box------------------->
                <div class="showcase-box">
                    <a href="{{ route('getarticle') }}"><img src="{{asset('img/patrick-hendry-jd0hS7Vhn_A-unsplash.jpg')}}" width="500" height="350"/></a>
                </div>
            </li>
                <!--box-3--------------------------->
            <li class="item-c">
                <!--showcase-box------------------->
                <div class="showcase-box">
                    <a href="{{ route('getarticle') }}"><img src="{{asset('img/dwi-septia-9XitN6vn6WQ-unsplash.jpg')}}" width="500" height="350"/></a>
                </div>
            </li>
                <!--box-4--------------------------->
            <li class="item-d">
                <!--showcase-box------------------->
                <div class="showcase-box">
                    <a href="{{ route('getarticle') }}"><img src="{{asset('img/jake-oates-E38KRRk1fvg-unsplash.jpg')}}" width="500" height="350"/>
                </div>
            </li>
                <!--box-5--------------------------->
            <li class="item-e">
                <!--showcase-box------------------->
                <div class="showcase-box">
                    <a href="{{ route('getarticle') }}"><img src="{{asset('img/marko-blazevic-zBvVuRJ71vU-unsplash.jpg')}}" width="500" height="350"/></a>
                </div>
            </li>
        </ul>
    </section>
    @endsection