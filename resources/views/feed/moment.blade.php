@extends('layouts/appWithoutNavbar');

@section('styles')
    <link rel="stylesheet" href="{{asset('css/stylesNewsfeed-moment.css')}}">
    <script src="https://kit.fontawesome.com/1918a957af.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="content">
        <div class='container' style='min-height:90vh'>
            <div class="chamthan_menu">
            <div class="menu">
                <span><a href="{{route('feeds.index')}}" class="linkNewsfeed navlink following">Following</a></span> |
                <span><a href="{{route('feeds.moment')}}" class="linkNewsfeed navlink moments">Hot</a></span>
            </div>

            <div class="chamthan">
                     <img class="chamthanicon" src="{{asset('image/icon_chamthan.png')}}" alt=""></a>
         </div>
         
        </div>
        
            @for($i = 0; $i < 5; $i++)

            <div class="row status-1">
                <div class="col-2">
                    <img src="{{asset('image/avatar1.png')}}" alt="avatar" class="avatar">
                </div>

                <div class="chamthan">
                    <img class="chamthanicon" src="{{asset('image/icon_chamthan.png')}}" alt=""></a>
                </div>

            </div>

            @foreach($feeds as $feed)
            <div class="row status-1">
                <div class="col-2">
                    <img style='border-radius: 50%' src="{{$feed->user->profile->profile_image}}" alt="avatar" class="avatar">
                </div>
                <div class="col-10">
                    <div class="row username">
                        <a href="">{{$feed->user->name}}</a>
                    </div>
                    <div class="row status">
                        <p>{{$feed->content}}</p>
                    </div>
                </div>
            </div>
            <div class="row multimedia mt-4">

                @if($feed->media_type == "video")
                    <video width="100%" height="100%" controls>
                        <source src="../{{"storage/media/" . $feed->media}}" type="video/{{$feed->media_ext}}">
                        Your browser does not support the video tag.
                    </video>
                @elseif($feed->media_type == "audio")
                    <audio style='width:100%' controls>
                        <source src="../{{"storage/media/" . $feed->media}}" type="audio/{{$feed->media_ext}}">
                        Your browser does not support the video tag.
                    </audio>
                @else
                    <img width="100%" height="100%" src="../{{$feed->user->profile->profile_image}}" alt="media">
                @endif
            </div>
            <div class="row interact px-4 mt-4">
                <i class="fas fa-headphones-alt"></i><span> 341</span>
                <i class="far fa-comments"></i> <span>43</span>
                <i class="far fa-thumbs-up"></i> <span>612</span>
            </div>
            <hr>
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

    <div class="backgroundBar"></div>
    </div>
@endsection

@section('scripts')

@endsection
