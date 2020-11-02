@extends('layouts/appWithoutNavbar')

@section('styles')
<link rel="stylesheet" href="{{asset('css/stylesSignup-SignIn.css')}}">
@endsection

@section('content')

<div class="content">
    <img src="{{asset('image/logo.png')}}" alt="logo">
    <h2>IELTS TINDER</h2>
    <h6>GET CLOSER - GET HIGHER</h6>
    <div class="signin">
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <a href="{{route('about-yourself')}}"><button type="button" class="btn btn-lg btnLink1 btn-block">Sign Up</button></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <a href="{{route('login')}}"><button type="button" class="btn btn-lg btnLink2 btn-block" onclick="LinkSignUp()">Sign In</button></a>
            </div>
        </div>
        <div class="sign-in-width">
            <span>Sign in with </span>
            <a href="{{route('login.provider', 'google')}}"><img src="{{asset('image/logo-GG.png')}}" class="logo-signin" alt="logo-google"></a>
            <a href="{{route('login.provider', 'facebook')}}"><img src="{{asset('image/logo-FB.png')}}" class="logo-signin" alt="logo-facebook"></a>
        </div>
    </div>
</div>

@endsection
