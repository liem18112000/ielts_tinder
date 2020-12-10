@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesSignup.css')}}">
@endsection

@section('content')
<img src="{{asset('image/logo.png')}}" alt="logo">
<div class="content" style="transform: translate(0,15%);">

    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @method('POST')

            <input id="name" type="text" class="Input email @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="email" name="email" class="Input email @error('email') is-invalid @enderror" placeholder="Email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="password" class="Input password" placeholder="Password"
                name="password" required autocomplete="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="password" class="Input cor-password" placeholder="Confirm password"
                name="password_confirmation" required autocomplete="new-password">

            <div class="term">
                <input type="checkbox" id="check-box" required='required'>
                <span>I agree to the <a href="#" class="link">Term & Conditions and Privacy Policy</a></span>
            </div>
            <div class="mt-3 mx-auto" style="width: 200px;">
                <button type="submit" class="btn btn-lg btnLink">Sign me up</button>
            </div>
        </form>
    </div>
</div>
@endsection
