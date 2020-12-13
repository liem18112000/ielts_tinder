@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesRoomMatching.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')
     <div class="content">
        <div class="container">

        <br/>
        <h1 class='text-center'>Matching Results</h1>

        @foreach($onlineUsers as $user)
            @if($user->id != Auth::user()->id)
                <div class="noti">
                    <div class="row">

                        <div class="col-6 mt-2" style='padding:0 0 0 10px; margin:0'>
                            <img style='border-radius:10%;bottom:0;object-fit:cover;margin:0;' src="{{$user->profile->profile_image}}" class="avatar-profile" alt="">
                        </div>

                        <div class="col-6">
                            <div class="row mt-2" style="margin-bottom:5px">
                                <h4 style='font-size:16px; font-weight:bold;'> {{$user->name}}</h4>
                            </div>

                            <div class="row" style="margin-bottom:5px">
                                <img src="{{asset('image/score.png')}}" class="score" style='bottom: 0' alt="">
                                <span class="detail">
                                    @if(!$user->profile->band_score || $user->profile->band_score == 0.0)
                                        Not Available
                                    @else
                                        {{$user->profile->band_score}}
                                    @endif
                                </span>
                            </div>

                            <div class="row">
                                <img src="{{asset('image/Age.png')}}" style='bottom: 0' class="score" alt="">
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

                    <hr/>

                    <div class="row mb-2">
                        <div class="col-6">
                            <a class="btn btnMore btn-block" style="color:white;"
                            href="{{ route('profile.show', $user->profile)}}" role="button">More</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btnMatch btn-block" style="color:white;"
                            href="{{ route('room.lounge', ['invite' => $user, 'token' => $token])}}" role="button">Match</a>
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

