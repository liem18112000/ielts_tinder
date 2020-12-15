@extends('layouts.appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class='content'>
    <div class="container">

        <br/><br/><br/>

        <video id="gum" playsinline autoplay muted ></video>
        <video id="recorded" playsinline loop width='100%'></video>

        <div class='row'>
            <button class='btn btn-primary btn-block' id="start">Start camera</button>
            <button class='btn btn-primary btn-block' id="record" disabled>Start Recording</button>
            <button class='btn btn-primary btn-block' id="play" disabled>Play</button>
            <button class='btn btn-primary btn-block' id="download" disabled>Download</button>
        </div>

        <div>
            <h4>Media Stream Constraints options</h4>
            <p>Echo cancellation: <input type="checkbox" id="echoCancellation"></p>
        </div>

        <div>
            <span id="errorMsg"></span>
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
                <a href="{{route('profile.show', Auth::user()->profile->id)}}"> <img class="iconProfile" src="{{asset('image/icon_profile.png')}}" alt=""></a>
            </div>
        </div>
    </div>

</div>

<div class="backgroundBar"></div>
</div>

<!-- include adapter for srcObject shim -->
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script src="{{ asset('js/record.js')}}" async></script>

@endsection

@section('scripts')

@endsection
