@extends('layouts.appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesRoom.css')}}">
    <style>
        .bottom-img{
            width: 40px;
            height:40px;
            border-radius:50%;
            bottom:0!important;
            object-fit: scale-down;
        }

        .bottom-btn{
            width: 60px;
            height:60px;
            border-radius:50%;
            background-color: transparent;
            padding: 5px;
            border: 2px solid transparent;
        }
        
        img{
            bottom: 0!important;
        }

        .media-control {
            position: fixed;
            height: 8vh;
            width: 100%;
            top: 89%;
            z-index: 5;
            margin-top: 10px;
        }

        .text-person-blue {
            color: #4a98ff;
        }

        .text-person-red {
            color: red;
        }

        .text-content {
            color: white;
        }
    </style>
@endsection

<script>
    function songChosen(index) {
        console.log("Song " + index + " chosen.");
    }
</script>

@section('content')
<div class="content" style='background-color:white'>
    <ul class="nav nav-tabs nav-fill" style="padding-top: 20px; margin-left: 10px;">
        <li class="nav-item">
            <a class="nav-link" href="{{route('room.index')}}" 
                style="border-bottom: 2px solid gray; color: black;">MATCHING</a>
        </li>
        <li class="nav-item" style="border-color: transparent">
            <a class="nav-link" href="#" style="border-bottom: 2px solid #4a98ff; color: #4a98ff">DUBBING</a>
        </li>
    </ul>

    <h2 style="margin-top: 20px; text-align: center; font-weight: bold;">CHOOSE YOUR SONG</h2>
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" 
        style="margin-top: 25px;">
        <div class="carousel-inner">
            <div class="carousel-item active" style="position: relative;">
                <img class="d-block w-100" src="{{asset('images/icons/Thiết kế không tên.png')}}" alt="1st song">
                <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;
                              margin-top: 10px;"
                        onClick="songChosen(0);" role="button"> 
                        CHOOSE THIS SONG</a>
            </div>
            <div class="carousel-item" style="position: relative;">
                <img class="d-block w-100" src="{{asset('images/icons/Thiết kế không tên (1).png')}}" alt="2nd song">
                <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;
                              margin-top: 10px;"
                        onClick="songChosen(1);" role="button"> 
                        CHOOSE THIS SONG</a>
            </div>
            <div class="carousel-item" style="position: relative;">
                <img class="d-block w-100" src="{{asset('images/icons/Thiết kế không tên (2).png')}}" alt="3rd song">
                <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;
                              margin-top: 10px;"
                        onClick="songChosen(2);" role="button"> 
                        CHOOSE THIS SONG</a>
            </div>
            <div class="carousel-item" style="position: relative;">
                <img class="d-block w-100" src="{{asset('images/icons/Thiết kế không tên (3).png')}}" alt="4th song">
                <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;
                              margin-top: 10px;"
                        onClick="songChosen(3);" role="button"> 
                        CHOOSE THIS SONG</a>
            </div>
            <div class="carousel-item" style="position: relative;">
                <img class="d-block w-100" src="{{asset('images/icons/Thiết kế không tên (5).png')}}" alt="5th song">
                <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;
                              margin-top: 10px;"
                        onClick="songChosen(4);" role="button"> 
                        CHOOSE THIS SONG</a>
            </div>
            <div class="carousel-item" style="position: relative;">
                <img class="d-block w-100" src="{{asset('images/icons/Thiết kế không tên (6).png')}}" alt="Third song">
                <a class="btn btn-info btn-block"
                        style="background: linear-gradient(90deg,#9a75f0,#FFA4B6); font-weight:bold; color:white;
                              margin-top: 10px;"
                        onClick="songChosen(5);" role="button"> 
                        CHOOSE THIS SONG</a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
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
            <a href="{{route('notify.index')}}"> <img class="iconSearch" src="{{asset('image/notification.png')}}" alt=""></a>
        </div>
        <div class="col">
            <a href="{{route('profile.show', Auth::user()->id)}}"> <img class="iconProfile" src="{{asset('image/icon_profile.png')}}" alt=""></a>
        </div>
    </div>
</div>

<div class="backgroundBar"></div>
</div>


@endsection