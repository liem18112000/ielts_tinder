@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesRoomMatching.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')
     <div class="content">
        <div class="container">
        <h3>MATCHING</h3>
        @foreach($onlineUsers as $user)
            @if($user->id != Auth::user()->id)
                <div class="noti">
                <div class="row"> 
                    <div class="col-6">
                        <div class="row"> <img style='border-radius:10%' src="{{$user->profile->profile_image}}" class="avatar-profile" alt=""></div>
                    </div>
                    <div class="col-6" style="margin-left:-15px; margin-right:-15px;">
                        <h5 style='margin-top:10px; font-size:16px; font-weight:bold;'>{{$user->name}}</h5>
                        <div class="row" style="margin-bottom:5px">
                            <img src="{{asset('image/score.png')}}" class="score" alt="">
                            <span class="detail">
                                @if(!$user->profile->band_score || $user->profile->band_score == 0.0)
                                    Not Available
                                @else
                                    {{$user->profile->band_score}}
                                @endif
                            </span>
                        </div>
                        <div class="row" style="margin-bottom:5px">
                            <img src="{{asset('image/player.png')}}" class="score" alt="">
                            <span class="detail">
                                ???
                            </span>
                        </div>
                        <div class="row">
                            <img src="{{asset('image/Age.png')}}" class="score" alt="">
                            <span class="detail">
                                @if(!$user->profile->dob)
                                    Not Available
                                @else
                                    {{$user->profile->dob}}
                                @endif
                            </span>
                        </div>  
                    </div>
                </div>
                <div class="row descrip">
                    <span>
                        {{$user->profile->intro}}
                    </span>
                </div>
                <div class="row" style="margin-bottom:10px">
                    <div class="col-6">
                        <a class="btnMore" href="" role="button">MORE</a>
                    </div>
                    <div class="col-6">
                        <a class="btnMatch" style="color:white;" href="" role="button">MATCH</a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
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
    </div>



    <div class="backgroundBar"></div>
    </div>
@endsection

@section('scripts')

@endsection

