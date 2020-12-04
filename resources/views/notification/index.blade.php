@extends('layouts/appWithoutNavbar')



@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNotifications.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection



@section('content')
     <div class="content">
        <div class="container">

            <div class="row">
                <img src="{{asset('image/mess.png')}}" class="mess" alt="">
            </div>
            <h3 style='margin-top: 10px'>Notifications</h3>

            <div class="noti">
                <div class="row">
                    <div class="col-4 text-center"><span id="notifi">Notifications</span></div>
                    <div class="col-4"></div>
                    <div class="col-4 text-center"><span><a href="#"> View all</span></a></div>
                </div>
            </div>

            <div class="noti" style="height: 60vh; overflow-y:scroll">
                @foreach ($notifications as $notification)
                    <div class="noti-1 row">
                        <div class="col-4 col-lg-2">
                            <img src="{{asset('image/iconRoom.png')}}" style="width:100%; bottom:0" alt="">
                        </div>
                        <div class="col-5 col-lg-7  notiMess text-center">
                            <div class="row messNoti">
                                <span><a href="">System</a> </span>
                                <span>{{str_replace("App\Notifications\\", '', $notification->type)}}</span>
                            </div>
                            <div class="row timeNoti"><span>{{$notification->created_at->toDateTimeString()}}</span></div>
                        </div>
                        <div class="col-3" style="padding:0 5px 0 0; margin: 0;">
                            <a class="btn btn-outline-dark btn-block" href="#">View</a>
                        </div>
                    </div>
                @endforeach
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
    </div>



    <div class="backgroundBar"></div>
    </div>
@endsection



@section('scripts')

@endsection
