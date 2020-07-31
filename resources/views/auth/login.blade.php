@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesSignin.css')}}">
@endsection

@section('content')

<div class="content">
    <div class="container">
        <form method="POST" action="{{route('login') }}">
            @csrf
            <input type="text" class="Input phone-number" name='email'
                value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="password" class="Input password" name='password'
                required autocomplete="current-password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <@if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <div class="mt-3 mx-auto" style="width: 200px;">
                <button type="submit" class="btn btn-lg btnLink btn-block">Sign in</button>
            <div>
        </form>
    </div>
</div>

@endsection
