@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesSignup.css')}}">
@endsection

@section('content')
<img src="{{asset('image/logo.png')}}" alt="logo">
<div class="content">
    
    <div class="container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @method('POST')
        <input id="name" type="text" class="Input email"
            name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Fullname" autofocus>
        <input type="email" name="email" class="Input email" placeholder="Email"
            name="email" value="{{ old('email') }}">
        <input type="password" class="Input password" placeholder="Password"
            name="password" required autocomplete="new-password">
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
