@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesRoom.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
    <style>

        img{
            bottom: 0!important;
        }
    </style>
@endsection



@section('content')
<div class="content">
    <div class='container'>

        <br/>

        <h1 class='text-center'>Lounge Room</h1>

        <img src='{{ asset('image/iconRoom.png')}}' style='bottom:0; object-fit:fill;margin:auto'>

        <p>Your speak-mate will arrive in next few seconds. Please be patient!</p>

    </div>
</div>
@endsection

