@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
    <style>
        .topic-img{
            object-fit: cover;
            width: 100%;
            max-height: 90vh;
            min-height: 70vh;
            border-radius: 2%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-image: url('https://www.wallpaperup.com/uploads/wallpapers/2014/08/27/430129/1091441c84e9d3da00990c6fdc42e89d-700.jpg')
        }

        .topic-card{
            margin: 10%;
        }
    </style>
@endsection


@section('content')
<div class='content'>
    <div class="container">
        <h1 style='padding: 6%'>Choose Topic</h1>
        <button type="submit"  class="btn btn-info btn-block"
            style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;">
            <i class="fa fa-question" aria-hidden="true">
                Choose a random topic
            </i>
        </button>

        <hr/>

        <div id="topic" class="carousel slide mb-4 mt-2" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#topic" data-slide-to="0" class="active"></li>
                <li data-target="#topic" data-slide-to="1"></li>
                <li data-target="#topic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active topic-img">

                    <div class="card topic-card">
                        <div class="card-header">
                            <h4 class="card-title">Nature</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                            <hr>

                            <p>Difficulty : <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i></p>
                        </div>
                        <div class='card-footer' style='padding:0; margin:0'>
                            <button type="submit" class="btn btn-primary btn-block">Choose</button>
                        </div>
                    </div>

                </div>
                <div class="carousel-item topic-img">

                    <div class="card topic-card">
                        <div class="card-header">
                            <h4 class="card-title">Nature</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                            <hr>

                            <p>Difficulty : <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i></p>
                        </div>
                        <div class='card-footer' style='padding:0; margin:0'>
                            <button type="submit" class="btn btn-primary btn-block">Choose</button>
                        </div>
                    </div>

                </div>
                <div class="carousel-item topic-img">

                    <div class="card topic-card">
                        <div class="card-header">
                            <h4 class="card-title">Nature</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                            <hr>

                            <p>Difficulty : <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i></p>
                        </div>
                        <div class='card-footer' style='padding:0; margin:0'>
                            <button type="submit" class="btn btn-primary btn-block">Choose</button>
                        </div>
                    </div>

                </div>
            </div>
            <a class="carousel-control-prev" href="#topic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#topic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</div>

<div class="icon">
    <div class="row align-items-center">
        <div class="col">
            <a href="{{route('feeds.index')}}"> <img class="iconNewsfeed" src="{{asset('image/iconNewsfeed.png')}}" alt=""></a>
        </div>
        <div class="col">
            <a href="{{route('search')}}"> <img class="iconSearch" src="{{asset('image/icon_search.png')}}" alt=""></a>
        </div>
        <div class="col">
            <div class="backgroundRound">
                <a href="{{route('room.index')}}"> <img class="icon_Room" src="{{asset('image/iconRoom.png')}}"></a>
            </div>
        </div>
        <div class="col">
            <a href="{{route('notify.index')}}"> <img class="iconNoti" src="{{asset('image/notification.png')}}" alt=""></a>
        </div>
        <div class="col">
            <a href="{{route('profile.show', Auth::user()->id)}}"> <img class="iconProfile" src="{{asset('image/icon_profile.png')}}" alt=""></a>
        </div>
    </div>
</div>

<div class="backgroundBar"></div>
</div>
@endsection
