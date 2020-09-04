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
                    <div class="col-4"><span id="notifi">Notifications</span></div>
                    <div class="col-4"></div>
                    <div class="col-4"><span><a href=""> View all</span></a></div>
                </div>
                <div class="noti-1 row">
                    <div class="col-3">
                        <img src="image/avatar2.png" class="avatar" alt="">
                    </div>
                    <div class="col-9 notiMess">
                        <div class="row messNoti">
                            <span><a href="">Khả Hân</a> </span>
                            <span>appreciated your audio</span>
                        </div>
                        <div class="row timeNoti"><span>3m ago</span></div>
                    </div>
                </div>
                <div class="noti-1 row">
                    <div class="col-3">
                        <img src="{{asset('image/avatar2.png')}}" class="avatar" alt="">
                    </div>
                    <div class="col-9 notiMess">
                        <div class="row messNoti">
                            <span><a href="">Khả Hân</a> </span>
                            <span>followed your profile</span>
                        </div>
                        <div class="row timeNoti"><span>3m ago</span></div>
                    </div>
                </div>
                <div class="noti-1 row">
                    <div class="col-3">
                        <img src="{{asset('image/avatar2.png')}}" class="avatar" alt="">
                    </div>
                    <div class="col-9 notiMess">
                        <div class="row messNoti">
                            <span><a href="">Khả Hân</a> </span>
                            <span>sent you a friend request</span>
                        </div>
                        <div class="row timeNoti"><span>3m ago</span></div>
                        <div class="row">
                            <button type="button" class="btn btnFollow">Accept</button>
                            <button type="button" class="btn btnFollow ig">Ignore</button>
                        </div>
                    </div>
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
    </div>



    <div class="backgroundBar"></div>
    </div>
@endsection



@section('scripts')

@endsection
