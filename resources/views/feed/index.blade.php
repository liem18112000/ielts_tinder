@extends('layouts/appWithoutNavbar')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')

    <div class="content">
        <div class='container'>
            <div class="chamthan_menu">

            <div class="menu">
                <span><a href="{{route('feeds.index')}}" class="linkNewsfeed navlink following">Following</a></span> |
                <span><a href="{{route('feeds.moment')}}" class="linkNewsfeed navlink moments">Moments</a></span>
            </div>

            <div class="chamthan">
                     <img class="chamthanicon" src="{{asset('image/icon_chamthan.png')}}" alt=""></a>
         </div>
         
        </div>
                @foreach($feeds as $feed)
                <div class="row status-1">
                    <div class="col-2">
                        <img src="{{$feed->user->profile->online_image}}" alt="avatar" class="avatar">
                    </div>
                    <div class="col-10">
                        <div class="row username">
                            <a href="">{{$feed->user->name}}</a>
                        </div>
                        <div class="row status">
                            <p>{{$feed->content}}</p>
                        </div>
                        <div class="multimedia">
                            <iframe src="{{$feed->media}}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                        <div class="interact">
                            <i class="fas fa-headphones-alt"></i><span>{{$feed->view_count}}</span>
                        </div>
                    </div>
                </div>
                <hr>
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
