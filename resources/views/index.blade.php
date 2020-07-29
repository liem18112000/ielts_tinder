@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesGetStarted.css')}}">
@endsection

@section('content')

 <div class="content">
    <h1>Hello!</h1>
    <img src="{{asset('image/logo.png')}}" alt="">
    <h2>IELTS TINDER</h2>
    <h6>GET CLOSER - GET HIGHER</h6>
    @guest
        <a href="{{route('signin-signup')}}" id="linkBtn"><button type="button" class="btn">GET STARTED</button></a>
    @endguest
    @auth
        <a href="{{route('feeds.index')}}" id="linkBtn"><button type="button" class="btn"> HOME</button></a>
        <a class="btn" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</div>

@endsection
