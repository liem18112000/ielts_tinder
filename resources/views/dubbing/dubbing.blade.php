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

@section('content')
<div class="content" style='background-color:black'>
    <ul class="nav nav-tabs nav-fill" style="padding-top: 20px; margin-left: 10px;">
        <li class="nav-item">
            <a class="nav-link" href="{{route('room.index')}}" style="color: white;">MATCHING</a>
        </li>
        <li class="nav-item" style="border-color: transparent">
            <a class="nav-link" href="#" style="border-bottom: 2px solid #4a98ff; color: #4a98ff">DUBBING</a>
        </li>
    </ul>
    
    <div style="margin-top: 25px; width: 100%; height: 100%;">
        <video id="dubbingVideo" style="width: 100%;" controls>
                <source src="" type="video/mp4">
        </video>
    </div>
    
    <div style="margin-left: -10px;">
        <p>
            <span class="text-person-blue">Aurora: </span>
            <span class="text-content"> I love you more than i can say, but. </span>
        </p>
        <p>
            <span class="text-person-red">Aurora: </span>
            <span class="text-content"> No, don't say anything, everything will fine!.<br>
                No one can take us apart. </span>
        </p>
    </div>
    
    <div class="row mt-1"
    style = 
        "position: fixed;
        width: 100%;
        margin-left: 0px;
        margin-right: 0px;
        top: 78%;
        z-index: 5;" 
    >
    <div class="col-4 align-items-center">
                <a href='javascript:void(0)' style='margin: auto; text-align: center; color:white;' id='sound'>
                    <div style='margin:0; padding:0; width:100%'>
                        <div class='bottom-btn' style='margin-left:auto;'>
                            <img src='{{ asset('images/icons/mute.png')}}' id='imgSound' class='bottom-img'/>
                        </div>
                    </div>
                </a>
            </div>

            <div class='col-4'>
                <a href='#' onClick="changeVideoState()" style='margin:auto; text-align: center; color:white;'>
                    <div style='margin:0; padding:0; width:100%'>
                        <div class='bottom-btn' style='margin:auto;'>
                            <img src='{{ asset('images/icons/pauseplay.png')}}' class='bottom-img'>
                        </div>
                    </div>
                </a>
            </div>

            <div class='col-4'>
                <a href='javascript:void(0)' style='margin:auto; text-align: center; color:white;' id='video'>
                    <div style='margin:0; padding:0; width:100%'>
                        <div class='bottom-btn' style='margin-right:auto;'>
                            <img src='{{ asset('images/icons/tick.png')}}' id='imgVideo' class='bottom-img' />
                        </div>
                    </div>
                </a>
            </div>
    </div>
    
</div>

<div class="icon" style="background: gray;">
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

<div class="backgroundBar" style="background: gray;"></div>
</div>


@endsection

@section('scripts')

var muted = false;

function changeVideoState() {
    var video = document.getElementById("dubbingVideo");
    if (video.paused) {
        video.play();
    } else {
        video.pause();
    }
}

document.getElementById('sound').addEventListener("click", function () {
    if (!muted) {
        document.getElementById('sound').innerHTML =  "<div style='margin:0; padding:0; width:100%'>"+
                       "<div class='bottom-btn' style='margin-left:auto;'>" +
                           "<img src='{{ asset('images/icons/unmute.png')}}' class='bottom-img'>" +
                        "</div>" +
                    "</div>";
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Media Player is currently muted',
            showConfirmButton: false,
            timer: 1500
        });
        muted = true;
    } else {
        document.getElementById('sound').innerHTML = "<div style='margin:0; padding:0; width:100%'>"+
                       "<div class='bottom-btn' style='margin-left:auto;'>" +
                           "<img src='{{ asset('images/icons/mute.png')}}' class='bottom-img'>" +
                        "</div>" +
                    "</div>";
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            text: 'Media Player is currently unmuted',
            showConfirmButton: false,
            timer: 3000
        });
        muted = false;
    }
});

@endsection
